<?php
namespace App\Controller;

use App\Controller\AppController;

class CategoriesController extends AppController
{
    public function index()
    {
        $categories = $this->paginate($this->Categories);

        $this->set(compact('categories'));
        $this->set('_serialize', ['categories']);
    }

    public function add()
    {
        $category = $this->Categories->newEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->data);
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('Categoria Cadastrada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('454 - Erro ao cadastrar categoria.'));
            }
        }
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }

    public function edit($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->data);
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('Categoria atualizada.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('455 - Erro ao atualizar categoria.'));
            }
        }
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('Categoria excluída.'));
        } else {
            $this->Flash->error(__('456 - Erro ao excluir categoria.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
