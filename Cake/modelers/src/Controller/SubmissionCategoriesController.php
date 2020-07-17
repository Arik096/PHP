<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SubmissionCategories Controller
 *
 * @property \App\Model\Table\SubmissionCategoriesTable $SubmissionCategories
 * @method \App\Model\Entity\SubmissionCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubmissionCategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentSubmissionCategories', 'ModelTypes', 'Statuses'],
        ];
        $submissionCategories = $this->paginate($this->SubmissionCategories);

        $this->set(compact('submissionCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Submission Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $submissionCategory = $this->SubmissionCategories->get($id, [
            'contain' => ['ParentSubmissionCategories', 'ModelTypes', 'Statuses', 'ChildSubmissionCategories', 'Submissions'],
        ]);

        $this->set(compact('submissionCategory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $submissionCategory = $this->SubmissionCategories->newEmptyEntity();
        if ($this->request->is('post')) {
            $submissionCategory = $this->SubmissionCategories->patchEntity($submissionCategory, $this->request->getData());
            if ($this->SubmissionCategories->save($submissionCategory)) {
                $this->Flash->success(__('The submission category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The submission category could not be saved. Please, try again.'));
        }
        $parentSubmissionCategories = $this->SubmissionCategories->ParentSubmissionCategories->find('list', ['limit' => 200]);
        $modelTypes = $this->SubmissionCategories->ModelTypes->find('list', ['limit' => 200]);
        $statuses = $this->SubmissionCategories->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('submissionCategory', 'parentSubmissionCategories', 'modelTypes', 'statuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Submission Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $submissionCategory = $this->SubmissionCategories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $submissionCategory = $this->SubmissionCategories->patchEntity($submissionCategory, $this->request->getData());
            if ($this->SubmissionCategories->save($submissionCategory)) {
                $this->Flash->success(__('The submission category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The submission category could not be saved. Please, try again.'));
        }
        $parentSubmissionCategories = $this->SubmissionCategories->ParentSubmissionCategories->find('list', ['limit' => 200]);
        $modelTypes = $this->SubmissionCategories->ModelTypes->find('list', ['limit' => 200]);
        $statuses = $this->SubmissionCategories->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('submissionCategory', 'parentSubmissionCategories', 'modelTypes', 'statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Submission Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $submissionCategory = $this->SubmissionCategories->get($id);
        if ($this->SubmissionCategories->delete($submissionCategory)) {
            $this->Flash->success(__('The submission category has been deleted.'));
        } else {
            $this->Flash->error(__('The submission category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
