<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

class ModelTypesController extends AppController {
    
    public function index() {
        $this->paginate = [
            'contain' => ['Statuses'],
        ];
        $modelTypes = $this->paginate($this->ModelTypes);

        $this->set(compact('modelTypes'));
    }

    public function view($id = null) {
        $modelType = $this->ModelTypes->get($id, [
            'contain' => ['Statuses', 'SubmissionCategories', 'SubmissionFields', 'Submissions'],
        ]);

        $this->set(compact('modelType'));
    }

    public function add() {
        $modelType = $this->ModelTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $modelType = $this->ModelTypes->patchEntity($modelType, $this->request->getData());
            if ($this->ModelTypes->save($modelType)) {
                $this->Flash->success(__('The model type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The model type could not be saved. Please, try again.'));
        }
        $statuses = $this->ModelTypes->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('modelType', 'statuses'));
    }

    public function edit($id = null) {
        $modelType = $this->ModelTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modelType = $this->ModelTypes->patchEntity($modelType, $this->request->getData());
            if ($this->ModelTypes->save($modelType)) {
                $this->Flash->success(__('The model type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The model type could not be saved. Please, try again.'));
        }
        $statuses = $this->ModelTypes->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('modelType', 'statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Model Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $modelType = $this->ModelTypes->get($id);
        if ($this->ModelTypes->delete($modelType)) {
            $this->Flash->success(__('The model type has been deleted.'));
        } else {
            $this->Flash->error(__('The model type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(EventInterface $event) {
        parent::beforeFilter($event);

        $this->Auth->allow(['index']);
    }
}
