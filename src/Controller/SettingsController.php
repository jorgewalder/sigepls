<?php
namespace App\Controller;

use App\Controller\AppController;

class SettingsController extends AppController
{
    public function index() {
        if ($this->request->is('post')) {
            
            $setting = $this->Settings->newEntity();
            $settings = $this->Settings->patchEntities($setting, $this->request->data);
            
            foreach ($settings as $setting) {
                $this->Settings->save($setting);
            }
            $this->Flash->success(__('Configurações atualizadas :)'));
        }

        /* meses e anos */
        $meses = [
            'Janeiro'=>'Janeiro',
            'Fevereiro'=>'Fevereiro',
            'Março'=>'Março',
            'Abril'=>'Abril',
            'Maio'=>'Maio',
            'Junho'=>'Junho',
            'Julho'=>'Julho',
            'Agosto'=>'Agosto',
            'Setembro'=>'Setembro',
            'Outubro'=>'Outubro',
            'Novembro'=>'Novembro',
            'Dezembro'=>'Dezembro'
        ];
        $anos = [
            '2016'=>'2016',
            '2017'=>'2017',
            '2018'=>'2018',
            '2019'=>'2019',
            '2020'=>'2020'
        ];
        $this->set(compact('meses','anos'));

        $settings = $this->Settings->getSettings();
        $this->set(compact('settings'));
        $this->set("active","configuracoes");
    }
}
