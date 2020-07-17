<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;

class AppController extends Controller {

    public function initialize(): void {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email', 
                        'password' => 'password'
                    ]
                ]
            ],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'storage' => 'Session'
        ]);
 
        //$this->loadComponent('FormProtection');
    }

    public function beforeFilter(EventInterface $event) {
        parent::beforeFilter($event);

        $this->Auth->allow(['login']);
        /*
        // Do not allow access to these public actions when already logged in
        $allowed = array('Users' => array('login', 'add'));
        foreach($allowed as $controller => $actions) {
            if($this->name === $controller && in_array($this->request->action, $actions)) {
                $this->Common->flashMessage('The page you tried to access is not relevant if you are already logged in. Redirected to main page.', 'info');
                return $this->redirect($this->Auth->loginRedirect);
            }
        }
        */
    }
}
