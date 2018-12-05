<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DepartmentsProjectActions Controller
 *
 * @property \App\Model\Table\DepartmentsProjectActionsTable $DepartmentsProjectActions
 *
 * @method \App\Model\Entity\DepartmentsProjectAction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DepartmentsProjectActionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Departments', 'ProjectActions']
        ];
        $departmentsProjectActions = $this->paginate($this->DepartmentsProjectActions);

        $this->set(compact('departmentsProjectActions'));
    }

    /**
     * View method
     *
     * @param string|null $id Departments Project Action id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $departmentsProjectAction = $this->DepartmentsProjectActions->get($id, [
            'contain' => ['Departments', 'ProjectActions']
        ]);

        $this->set('departmentsProjectAction', $departmentsProjectAction);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $departmentsProjectAction = $this->DepartmentsProjectActions->newEntity();
        if ($this->request->is('post')) {
            $departmentsProjectAction = $this->DepartmentsProjectActions->patchEntity($departmentsProjectAction, $this->request->data);
            if ($this->DepartmentsProjectActions->save($departmentsProjectAction)) {
                $this->Flash->success(__('The {0} has been saved.', 'Departments Project Action'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Departments Project Action'));
            }
        }
        $departments = $this->DepartmentsProjectActions->Departments->find('list', ['limit' => 200]);
        $projectActions = $this->DepartmentsProjectActions->ProjectActions->find('list', ['limit' => 200]);
        $this->set(compact('departmentsProjectAction', 'departments', 'projectActions'));
        $this->set('_serialize', ['departmentsProjectAction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Departments Project Action id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $departmentsProjectAction = $this->DepartmentsProjectActions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $departmentsProjectAction = $this->DepartmentsProjectActions->patchEntity($departmentsProjectAction, $this->request->data);
            if ($this->DepartmentsProjectActions->save($departmentsProjectAction)) {
                $this->Flash->success(__('The {0} has been saved.', 'Departments Project Action'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Departments Project Action'));
            }
        }
        $departments = $this->DepartmentsProjectActions->Departments->find('list', ['limit' => 200]);
        $projectActions = $this->DepartmentsProjectActions->ProjectActions->find('list', ['limit' => 200]);
        $this->set(compact('departmentsProjectAction', 'departments', 'projectActions'));
        $this->set('_serialize', ['departmentsProjectAction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Departments Project Action id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $departmentsProjectAction = $this->DepartmentsProjectActions->get($id);
        if ($this->DepartmentsProjectActions->delete($departmentsProjectAction)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Departments Project Action'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Departments Project Action'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
