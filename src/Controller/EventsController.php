<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class EventsController extends AppController
{

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        //default active menu
        $this->set("active","event");
    }

    public function isAuthorized($user)
    {
        if (in_array($this->request->action, ['index'])) {
            return true;
        }
        return parent::isAuthorized($user);
    }

    public function index()
    {
        //tentar achar um evento que seja vinculado ao local atual do usuário
        $event = $this->Events->find()->where(['Events.zone_id'=>$this->request->session()->read('Auth.User.zone_id')])->first();
        //pode encontrar ou não
        if($event){
            //ok
        }else{
            $event = $this->Events->newEntity();
        }

        if ($this->request->is(['patch', 'post', 'put'])) {

            $event['zone_id'] = $this->request->session()->read('Auth.User.zone_id');
            $event = $this->Events->patchEntity($event, $this->request->data);
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }

        $zone = $this->Events->Zones->find()->where(['Zones.id'=>$this->request->session()->read('Auth.User.zone_id')])->first();
        $this->set(compact('event','zone'));
        $this->set('_serialize', ['event']);
    }

    public function view($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => ['Zones']
        ]);

        $this->set('event', $event);
        $this->set('_serialize', ['event']);
    }

    public function add()
    {
        $event = $this->Events->newEntity();
        if ($this->request->is('post')) {
            $event = $this->Events->patchEntity($event, $this->request->data);
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }
        $zones = $this->Events->Zones->find('list', ['limit' => 200]);
        $this->set(compact('event', 'zones'));
        $this->set('_serialize', ['event']);
    }

    public function edit($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity($event, $this->request->data);
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }
        $zones = $this->Events->Zones->find('list', ['limit' => 200]);
        $this->set(compact('event', 'zones'));
        $this->set('_serialize', ['event']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id);
        if ($this->Events->delete($event)) {
            $this->Flash->success(__('The event has been deleted.'));
        } else {
            $this->Flash->error(__('The event could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
