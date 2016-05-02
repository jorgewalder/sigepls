<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;

class IndicatorsController extends AppController
{
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        //default active menu
        $this->set("active","indicators");

    }

    public function isAuthorized($user)
    {
        if (in_array($this->request->action, ['register','relatories'])) {
            return true;
        }

        return parent::isAuthorized($user);
    }

    public function register()
    {
        $settings = Configure::read("Conf");

        $this->loadModel('Categories');
        $categories = $this->Categories->find()->contain(['Indicators','Indicators.CurrentMonth']);

        $this->set('categories', $categories);
        $this->set('_serialize', ['categories']);
        $this->set("active","register");
    }

    public function relatories()
    {
        
    }

    public function index()
    {
        $indicators = $this->paginate($this->Indicators);

        $this->set(compact('indicators'));
        $this->set('_serialize', ['indicators']);
        $this->set("active","set_indicators");
    }

    public function add()
    {
        $indicator = $this->Indicators->newEntity();
        if ($this->request->is('post')) {
            $indicator = $this->Indicators->patchEntity($indicator, $this->request->data);
            if ($this->Indicators->save($indicator)) {
                $this->Flash->success(__('Indicador cadastrado!.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('454 - Erro ao cadastrar indicador.'));
            }
        }
        $this->set(compact('indicator'));
        $this->set('_serialize', ['indicator']);
    }


    public function edit($id = null)
    {
        $indicator = $this->Indicators->get($id, [
            'contain' => []
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
