<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['logout']);
    }

    public function isAuthorized($user)
    {
        if (in_array($this->request->action, ['dashboard'])) {
            return true;
        }

        return parent::isAuthorized($user);
    }

    public function index() {

        $this->paginate['contain'] = ['Zones'];

        $this->set('users', $this->paginate($this->Users));
        $this->set("active","dashboard");
    }

    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
               $this->Flash->success(__('Usuário cadastrado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao cadastrar usuário, tente novamente mais tarde.'));
            }
        }
        $zones = $this->Users->Zones->find('list', ['limit' => 2000]);
        $this->set(compact('user','zones'));
        $this->set("active","users");
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Usuário foi excluído.'));
        } else {
            $this->Flash->error(__('Erro ao excluir usuário.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function dashboard() {
        $this->set("active","dashboard");
    }

    public function login() {

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success(__('Bem vindo :)'));
                return $this->redirect('/dashboard');
            }
            $this->Flash->error(__('Usuário ou senha incorretos, tente novamente'));
        }
        $this->viewBuilder()->layout(false);
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
}
