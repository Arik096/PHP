<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SubmissionFieldValues Controller
 *
 * @property \App\Model\Table\SubmissionFieldValuesTable $SubmissionFieldValues
 * @method \App\Model\Entity\SubmissionFieldValue[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubmissionFieldValuesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Submissions', 'SubmissionFields'],
        ];
        $submissionFieldValues = $this->paginate($this->SubmissionFieldValues);

        $this->set(compact('submissionFieldValues'));
    }

    /**
     * View method
     *
     * @param string|null $id Submission Field Value id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $submissionFieldValue = $this->SubmissionFieldValues->get($id, [
            'contain' => ['Submissions', 'SubmissionFields'],
        ]);

        $this->set(compact('submissionFieldValue'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $submissionFieldValue = $this->SubmissionFieldValues->newEmptyEntity();
        if ($this->request->is('post')) {
            $submissionFieldValue = $this->SubmissionFieldValues->patchEntity($submissionFieldValue, $this->request->getData());
            if ($this->SubmissionFieldValues->save($submissionFieldValue)) {
                $this->Flash->success(__('The submission field value has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The submission field value could not be saved. Please, try again.'));
        }
        $submissions = $this->SubmissionFieldValues->Submissions->find('list', ['limit' => 200]);
        $submissionFields = $this->SubmissionFieldValues->SubmissionFields->find('list', ['limit' => 200]);
        $this->set(compact('submissionFieldValue', 'submissions', 'submissionFields'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Submission Field Value id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $submissionFieldValue = $this->SubmissionFieldValues->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $submissionFieldValue = $this->SubmissionFieldValues->patchEntity($submissionFieldValue, $this->request->getData());
            if ($this->SubmissionFieldValues->save($submissionFieldValue)) {
                $this->Flash->success(__('The submission field value has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The submission field value could not be saved. Please, try again.'));
        }
        $submissions = $this->SubmissionFieldValues->Submissions->find('list', ['limit' => 200]);
        $submissionFields = $this->SubmissionFieldValues->SubmissionFields->find('list', ['limit' => 200]);
        $this->set(compact('submissionFieldValue', 'submissions', 'submissionFields'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Submission Field Value id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $submissionFieldValue = $this->SubmissionFieldValues->get($id);
        if ($this->SubmissionFieldValues->delete($submissionFieldValue)) {
            $this->Flash->success(__('The submission field value has been deleted.'));
        } else {
            $this->Flash->error(__('The submission field value could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
