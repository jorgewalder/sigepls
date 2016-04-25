<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;

class AppController extends Controller
{


    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth');
        $this->loadModel('Settings');
        // configurações
        $this->Auth->config( 'authorize', ['Controller']);
        $this->Auth->config('authError', "Você não tem permissão para acessar este local.");
        $this->Auth->config('authError', "Você não tem permissão para acessar este local.");
        $this->Auth->config('loginAction', "/");
        $this->Auth->config('oginRedirect', "/dashboard");
        $this->Auth->config('logoutRedirect', "");
        $this->Auth->config('authenticate', [
            'Form' => [
                'userModel' => 'Users',
            ]
        ]);

    }

    public function beforeFilter(Event $event) {

        /* settings */
        if (!empty($this->Settings->table())) {
            $this->Settings->load();
            $settings = Configure::read("Conf");
            $this->settings = Configure::read("Conf");
            $this->set(compact('settings'));
        }

        //default active menu
        $this->set("active","dashboard");

    }

    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function isAuthorized($user)
    {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        // Default deny
        return false;
    }
}
