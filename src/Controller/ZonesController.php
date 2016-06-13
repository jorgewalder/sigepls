<?php
namespace App\Controller;

use App\Controller\AppController;

class ZonesController extends AppController
{

    public function index()
    {
        $zones = $this->paginate($this->Zones);

        $this->set(compact('zones'));
        $this->set('_serialize', ['zones']);
    }

    public function add()
    {
        $zone = $this->Zones->newEntity();
        if ($this->request->is('post')) {
            $zone = $this->Zones->patchEntity($zone, $this->request->data);
            if ($this->Zones->save($zone)) {
                $this->Flash->success(__('Local criado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao criar local. Tente novamente.'));
            }
        }
        $this->set(compact('zone'));
        $this->set('_serialize', ['zone']);
    }

    public function edit($id = null)
    {
        $zone = $this->Zones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $zone = $this->Zones->patchEntity($zone, $this->request->data);
            if ($this->Zones->save($zone)) {
                $this->Flash->success(__('Local atualizado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao atualizar local, tente novamente mais tarde..'));
            }
        }
        $this->set(compact('zone'));
        $this->set('_serialize', ['zone']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $zone = $this->Zones->get($id);
        if ($this->Zones->delete($zone)) {
            $this->Flash->success(__('Local excluído.'));
        } else {
            $this->Flash->error(__('Erro ao excluir local, tente novamente mais tarde.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
