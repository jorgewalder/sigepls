<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{


    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth');
    }

    public function beforeFilter(Event $event) {

        // configurações
        $this->Auth->loginAction = '/';
        $this->Auth->loginRedirect = '/dashboard';
        $this->Auth->logoutRedirect = '/';
        $this->Auth->authError = 'Você não tem permissão para acessar este local.';
        $this->Auth->authenticate = [
            'Form' => [
                'userModel' => 'User',
            ]
        ];

    }

    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
