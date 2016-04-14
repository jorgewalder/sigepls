<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Months Controller
 *
 * @property \App\Model\Table\MonthsTable $Months
 */
class MonthsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Indicators', 'Zones']
        ];
        $months = $this->paginate($this->Months);

        $this->set(compact('months'));
        $this->set('_serialize', ['months']);
    }

    /**
     * View method
     *
     * @param string|null $id Month id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $month = $this->Months->get($id, [
            'contain' => ['Indicators', 'Zones']
        ]);

        $this->set('month', $month);
        $this->set('_serialize', ['month']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
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

    /**
     * Edit method
     *
     * @param string|null $id Month id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
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

    /**
     * Delete method
     *
     * @param string|null $id Month id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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
}
