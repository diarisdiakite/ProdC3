<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProjectActions Controller
 *
 * @property \App\Model\Table\ProjectActionsTable $ProjectActions
 *
 * @method \App\Model\Entity\ProjectAction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectActionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Types', 'ExpectedResults']
        ];
        $projectActions = $this->paginate($this->ProjectActions);

        $this->set(compact('projectActions'));
    }

    /**
     * View method
     *
     * @param string|null $id Project Action id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectAction = $this->ProjectActions->get($id, [
            'contain' => ['Users', 'Types', 'ExpectedResults', 'Departments', 'Inserts', 'Technicals', 'Trainings']
        ]);

        $this->set('projectAction', $projectAction);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectAction = $this->ProjectActions->newEntity();
        if ($this->request->is('post')) {
            $projectAction = $this->ProjectActions->patchEntity($projectAction, $this->request->data);
            if ($this->ProjectActions->save($projectAction)) {
                $this->Flash->success(__('The {0} has been saved.', 'Project Action'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Project Action'));
            }
        }
        $users = $this->ProjectActions->Users->find('list', ['limit' => 200]);
        $types = $this->ProjectActions->Types->find('list', ['limit' => 200]);
        $expectedResults = $this->ProjectActions->ExpectedResults->find('list', ['limit' => 200]);
        $departments = $this->ProjectActions->Departments->find('list', ['limit' => 200]);
        $this->set(compact('projectAction', 'users', 'types', 'expectedResults', 'departments'));
        $this->set('_serialize', ['projectAction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Project Action id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectAction = $this->ProjectActions->get($id, [
            'contain' => ['Departments']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectAction = $this->ProjectActions->patchEntity($projectAction, $this->request->data);
            if ($this->ProjectActions->save($projectAction)) {
                $this->Flash->success(__('The {0} has been saved.', 'Project Action'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Project Action'));
            }
        }
        $users = $this->ProjectActions->Users->find('list', ['limit' => 200]);
        $types = $this->ProjectActions->Types->find('list', ['limit' => 200]);
        $expectedResults = $this->ProjectActions->ExpectedResults->find('list', ['limit' => 200]);
        $departments = $this->ProjectActions->Departments->find('list', ['limit' => 200]);
        $this->set(compact('projectAction', 'users', 'types', 'expectedResults', 'departments'));
        $this->set('_serialize', ['projectAction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Project Action id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectAction = $this->ProjectActions->get($id);
        if ($this->ProjectActions->delete($projectAction)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Project Action'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Project Action'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
