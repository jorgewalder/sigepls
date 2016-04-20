<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;

class MonthsController extends AppController
{

    public function index()
    {
        $this->paginate = [
            'contain' => ['Indicators', 'Zones']
        ];
        $months = $this->paginate($this->Months);

        $this->set(compact('months'));
        $this->set('_serialize', ['months']);
    }

    public function view($id = null)
    {
        $month = $this->Months->get($id, [
            'contain' => ['Indicators', 'Zones']
        ]);

        $this->set('month', $month);
        $this->set('_serialize', ['month']);
    }

    public function add()
    {
        $month = $this->Months->newEntity();
        if ($this->request->is('post')) {
            $month = $this->Months->patchEntity($month, $this->request->data);
            if ($this->Months->save($month)) {
                $this->Flash->success(__('The month has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The month could not be saved. Please, try again.'));
            }
        }
        $indicators = $this->Months->Indicators->find('list', ['limit' => 200]);
        $zones = $this->Months->Zones->find('list', ['limit' => 200]);
        $this->set(compact('month', 'indicators', 'zones'));
        $this->set('_serialize', ['month']);
    }

    public function edit($id = null)
    {
        $month = $this->Months->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $month = $this->Months->patchEntity($month, $this->request->data);
            if ($this->Months->save($month)) {
                $this->Flash->success(__('The month has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The month could not be saved. Please, try again.'));
            }
        }
        $indicators = $this->Months->Indicators->find('list', ['limit' => 200]);
        $zones = $this->Months->Zones->find('list', ['limit' => 200]);
        $this->set(compact('month', 'indicators', 'zones'));
        $this->set('_serialize', ['month']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $month = $this->Months->get($id);
        if ($this->Months->delete($month)) {
            $this->Flash->success(__('The month has been deleted.'));
        } else {
            $this->Flash->error(__('The month could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    // AJAX
    public function ajaxAdd(){
        $this->viewBuilder()->layout('ajax');
        $this->autoRender = false;

        if($this->request->is('post')){
            $settings = Configure::read("Conf");

            $month = $this->Months->newEntity();
        
            $month = $this->Months->patchEntity($month, $this->request->data);
            $month->year = $settings['year'];
            $month->month = $settings['month'];
            if($res = $this->Months->save($month)){
                echo json_encode($res);
            }
            else{
                echo json_encode($res);
            }     
        }
        else
            echo 'ajax page';
        
    } 

    public function ajaxEdit(){
        $this->viewBuilder()->layout('ajax');
        $this->autoRender = false;

        if($this->request->is(['patch', 'post', 'put'])){    

            $month = $this->Months->get($this->request->data['id']);  
            $month = $this->Months->patchEntity($month, $this->request->data);
            if($res = $this->Months->save($month)){
                echo json_encode($res);
            }
            else{
                echo json_encode($res);
            }
        }
        else
            echo 'ajax page';
        
    } 


}
