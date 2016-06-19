<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\I18n\Date;
use Cake\I18n\Time;
use Cake\Utility\Hash;

class IndicatorsController extends AppController
{
    public $months = [
            'Janeiro' => 1, 'Fevereiro' => 2, 'Março' => 3, 'Abril' => 4,
            'Maio' => 5, 'Junho' => 6,'Julho' => 7,'Agosto' => 8,
            'Setembro' => 9, 'Outubro' => 10,'Novembro' => 11,'Dezembro' => 12
        ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Walder');
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        //default active menu
        $this->set("active","indicators");

    }

    public function isAuthorized($user)
    {
        if (in_array($this->request->action, ['register','relatories','ajaxGetReport'])) {
            return true;
        }

        return parent::isAuthorized($user);
    }

    public function register()
    {
        $settings = Configure::read("Conf");
        $this->loadModel('Categories');
        $zone = $this->request->session()->read('Auth.User.zone_id');

        //checa se for admin somente indicators estratégicos
        if($this->request->session()->read('Auth.User.role') == 'admin'){
            $conditions = ['Indicators.type' => 'estrategico'];
        }
        else{
            $conditions = ['Indicators.type' => 'operacional'];
        }

        $categories = $this->Categories->find()->contain([
            'Indicators' => function($q) use ($conditions){return $q->where($conditions);},
            'Indicators.Zones' => function($q){ return $q->where(['Zones.id'=>$this->request->session()->read('Auth.User.zone_id')]); },
            'Indicators.CurrentMonth'
        ]);

        $this->set('categories', $categories);
        $this->set('zone', $zone);
        $this->set('_serialize', ['categories','zone']);
        $this->set("active","register");
    }

    public function relatories()
    {



    }
    // AJAX
    public function ajaxGetReport(){
        $this->viewBuilder()->layout('ajax');
        $this->autoRender = false;

        if($this->request->is('get')){
            $this->loadModel('Categories');

            //echo json_encode($this->request->query);

            $date = [
                'de' => $this->Walder->simplifyDate($this->request->query['de']),
                'ate' => $this->Walder->simplifyDate($this->request->query['ate'])
            ];

            //detectar zones enviados ou padrão do usuário
            $zones = [];
            if($this->request->query('zones') == "GERAL"){
                $monthsConditions = ['and' => [['moment >= ' => $date['de'],'moment <= ' => $date['ate']],]];
                $zonesConditions = ['1'=> 1];
            }else{
                array_push($zones,$this->request->session()->read('Auth.User.zone_id'));
                $monthsConditions = ['zone_id IN' => $zones,'and' => [['moment >= ' => $date['de'],'moment <= ' => $date['ate']],]];
                $zonesConditions = ['Zones.id IN'=> $zones];
            }

            //checa se for admin somente indicators estratégicos
            if($this->request->session()->read('Auth.User.role') == 'admin'){
                $roleConditions = ['Indicators.type' => 'estrategico'];
            }
            else{
                $roleConditions = ['Indicators.type' => 'operacional'];
            }



            $r = $this->Categories->find()->contain([
                'Indicators' => function($q) use ($roleConditions){ return $q->where($roleConditions); },
                'Indicators.Zones' => function($q) use ($zones,$zonesConditions){ return $q->where($zonesConditions); },
                'Indicators.Months' => function($q) use ($monthsConditions,$zones,$date){
                    return $q
                    ->select([
                        'indicator_id',
                        'zone_id',
                        'qtd' => $q->func()->count('indicator_value'),
                        'soma' => $q->func()->sum('indicator_value')
                    ])
                    ->where($monthsConditions)
                    ->group(['zone_id','indicator_id'])
                    ->order(['zone_id' => 'ASC']);
                    ;
                },
                'Indicators.Zones.Months' => function($q) use ($monthsConditions,$zones,$date){
                    return $q
                    ->select([
                        'indicator_id',
                        'zone_id',
                        'qtd' => $q->func()->count('indicator_value'),
                        'soma' => $q->func()->sum('indicator_value')
                    ])
                    ->where($monthsConditions)
                    ->group(['zone_id','indicator_id'])
                    ->order(['zone_id' => 'ASC']);
                    ;
                },
                'Indicators.Zones.Obs' => function($q) use ($monthsConditions){
                    return $q
                    ->where($monthsConditions)
                    ->order(['zone_id' => 'ASC']);
                    ;
                },
            ])->toArray();

            if($this->request->query('zones') == "GERAL"){

                foreach($r as $category){
                    //echo json_encode($category);
                    foreach($category['indicators'] as $indicator){
                        //echo json_encode($indicator);
                        foreach($indicator['zones'] as $zone){

                            if(!empty($zone['months'])){
                                foreach($zone['months'] as $month){
                                    if($month['indicator_id'] == $zone['_joinData']['indicator_id']){
                                        $zone['ra'] = $month;
                                        break;
                                    }
                                }
                            }
                            if(!isset($zone['ra'])){
                                $zone['ra'] = null;
                            }
                        }
                    }
                }
            }
            echo json_encode($r);
        }
        else
            echo 'ajax page';

    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories']
        ];
        $indicators = $this->paginate($this->Indicators);

        $this->set(compact('indicators'));
        $this->set('_serialize', ['indicators']);
        $this->set("active","set_indicators");
    }

    public function add()
    {
        $indicator = $this->Indicators->newEntity();
        if ($this->request->is('post')) {
            $indicator = $this->Indicators->patchEntity($indicator, $this->request->data,['associated'=>'Zones']);
            if ($this->Indicators->save($indicator)) {
                $this->Flash->success(__('Indicador cadastrado!.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('454 - Erro ao cadastrar indicador.'));
            }
        }
        $this->set(compact('indicator'));
        $this->set('_serialize', ['indicator']);

        $this->loadModel('Zones');

        $mainZones = $this->Zones->find()->matching('Users', function ($q) {
            return $q->where(['Users.role' => 'admin']);
        })->first();

        $this->set('zones',$this->Zones->find()->order(['Zones.id' => 'ASC'])->toArray());
        $categories = $this->Indicators->Categories->find('list', ['limit' => 2000]);
        $this->set(compact('categories','mainZones'));
    }


    public function edit($id = null)
    {
        $indicator = $this->Indicators->get($id, [
            'contain' => ['Zones' => ['sort' => ['Zones.id' => 'ASC']],'Zones.Users' => function($q){return $q->where(['Users.role' => 'admin']);}]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $indicator = $this->Indicators->patchEntity($indicator, $this->request->data);
            if ($this->Indicators->save($indicator)) {
                $this->Flash->success(__('Indicador atualizado!'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('455 - Erro ao atualizar indicador.'));
            }
        }
        $this->set(compact('indicator'));
        $this->set('_serialize', ['indicator']);

        $this->loadModel('Zones');
        $this->set('zones',$this->Zones->find()->order(['Zones.id' => 'ASC'])->toArray());
        $categories = $this->Indicators->Categories->find('list', ['limit' => 2000]);
        $this->set(compact('categories'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $indicator = $this->Indicators->get($id);
        if ($this->Indicators->delete($indicator)) {
            $this->Flash->success(__('Indicador excluído!'));
        } else {
            $this->Flash->error(__('456 - Erro ao excluir indicador.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
