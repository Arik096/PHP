<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Scales Controller
 *
 * @property \App\Model\Table\ScalesTable $Scales
 * @method \App\Model\Entity\Scale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ScalesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ModelTypes'],
        ];
        $scales = $this->paginate($this->Scales);

        $this->set(compact('scales'));
    }

    /**
     * View method
     *
     * @param string|null $id Scale id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $scale = $this->Scales->get($id, [
            'contain' => ['ModelTypes', 'Submissions'],
        ]);

        $this->set(compact('scale'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $scale = $this->Scales->newEmptyEntity();
        if ($this->request->is('post')) {
            $scale = $this->Scales->patchEntity($scale, $this->request->getData());
            if ($this->Scales->save($scale)) {
                $this->Flash->success(__('The scale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scale could not be saved. Please, try again.'));
        }
        $modelTypes = $this->Scales->ModelTypes->find('list', ['limit' => 200]);
        $this->set(compact('scale', 'modelTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Scale id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $scale = $this->Scales->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $scale = $this->Scales->patchEntity($scale, $this->request->getData());
            if ($this->Scales->save($scale)) {
                $this->Flash->success(__('The scale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scale could not be saved. Please, try again.'));
        }
        $modelTypes = $this->Scales->ModelTypes->find('list', ['limit' => 200]);
        $this->set(compact('scale', 'modelTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Scale id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $scale = $this->Scales->get($id);
        if ($this->Scales->delete($scale)) {
            $this->Flash->success(__('The scale has been deleted.'));
        } else {
            $this->Flash->error(__('The scale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
