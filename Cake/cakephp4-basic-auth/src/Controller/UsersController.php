<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Component\RequestHandlerComponent;
use Cake\ORM\TableRegistry;
use Cake\Auth;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login', 'add', 'index', 'edit', 'view', 'delete']);
    }

    public function login()
    {
        $res = array();
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
                $res['status'] = 0;
                $res['message'] = 'You are logged in.';
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $res['status'] = 0;
            $res['message'] = 'Invalid username or password.';
        }
        $this->set(compact('res'));
        $this->set('_serialize', ['res']);
    }

    // in src/Controller/UsersController.php
    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   
        $res = array();
        $this->request->allowMethod(['get', 'post']);
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                $res['status'] = 1;
				$res['msg'] = 'User data saved successfully';
                // return $this->redirect(['action' => 'index']);
            }else{
                $res['status'] = 0;
                $res['msg'] = 'The user could not be saved. Please, try again.';
            }
            // $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('res'));
        $this->set('_serialize', ['res']);

    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $res = array();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $res['status'] = 1;
				$res['msg'] = 'User updated successfully';
            }else{
                $res['status'] = 0;
                $res['msg'] = 'The user could not be saved. Please, try again.';
            }
        }
        $this->set(compact('res'));
        $this->set('_serialize', ['res']);

    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $res = array();
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $res['status'] = 1;
            $res['msg'] = 'The user has been deleted.';
        } else {
            $res['status'] = 0;
            $res['msg'] = 'The user could not be deleted. Please, try again.';
        }

        $this->set(compact('res'));
        $this->set('_serialize', ['res']);
    }
}
