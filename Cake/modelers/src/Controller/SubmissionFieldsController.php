<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SubmissionFields Controller
 *
 * @property \App\Model\Table\SubmissionFieldsTable $SubmissionFields
 * @method \App\Model\Entity\SubmissionField[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubmissionFieldsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ModelTypes', 'Statuses'],
        ];
        $submissionFields = $this->paginate($this->SubmissionFields);

        $this->set(compact('submissionFields'));
    }

    /**
     * View method
     *
     * @param string|null $id Submission Field id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $submissionField = $this->SubmissionFields->get($id, [
            'contain' => ['ModelTypes', 'Statuses', 'SubmissionFieldValues'],
        ]);

        $this->set(compact('submissionField'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $submissionField = $this->SubmissionFields->newEmptyEntity();
        if ($this->request->is('post')) {
            $submissionField = $this->SubmissionFields->patchEntity($submissionField, $this->request->getData());
            if ($this->SubmissionFields->save($submissionField)) {
                $this->Flash->success(__('The submission field has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The submission field could not be saved. Please, try again.'));
        }
        $modelTypes = $this->SubmissionFields->ModelTypes->find('list', ['limit' => 200]);
        $statuses = $this->SubmissionFields->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('submissionField', 'modelTypes', 'statuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Submission Field id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $submissionField = $this->SubmissionFields->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $submissionField = $this->SubmissionFields->patchEntity($submissionField, $this->request->getData());
            if ($this->SubmissionFields->save($submissionField)) {
                $this->Flash->success(__('The submission field has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The submission field could not be saved. Please, try again.'));
        }
        $modelTypes = $this->SubmissionFields->ModelTypes->find('list', ['limit' => 200]);
        $statuses = $this->SubmissionFields->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('submissionField', 'modelTypes', 'statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Submission Field id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $submissionField = $this->SubmissionFields->get($id);
        if ($this->SubmissionFields->delete($submissionField)) {
            $this->Flash->success(__('The submission field has been deleted.'));
        } else {
            $this->Flash->error(__('The submission field could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
