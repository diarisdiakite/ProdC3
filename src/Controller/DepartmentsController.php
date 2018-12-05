<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Departments Controller
 *
 * @property \App\Model\Table\DepartmentsTable $Departments
 *
 * @method \App\Model\Entity\Department[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DepartmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ministries']
        ];
        $departments = $this->paginate($this->Departments);

        $this->set(compact('departments'));
    }

    /**
     * View method
     *
     * @param string|null $id Department id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $department = $this->Departments->get($id, [
            'contain' => ['Ministries', 'InquiryDatabases', 'Meetings', 'ProjectActions', 'Trainings', 'Planifications', 'Realizations', 'Structures']
        ]);

        $this->set('department', $department);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $department = $this->Departments->newEntity();
        if ($this->request->is('post')) {
            $department = $this->Departments->patchEntity($department, $this->request->data);
            if ($this->Departments->save($department)) {
                $this->Flash->success(__('The {0} has been saved.', 'Department'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Department'));
            }
        }
        $ministries = $this->Departments->Ministries->find('list', ['limit' => 200]);
        $inquiryDatabases = $this->Departments->InquiryDatabases->find('list', ['limit' => 200]);
        $meetings = $this->Departments->Meetings->find('list', ['limit' => 200]);
        $projectActions = $this->Departments->ProjectActions->find('list', ['limit' => 200]);
        $trainings = $this->Departments->Trainings->find('list', ['limit' => 200]);
        $this->set(compact('department', 'ministries', 'inquiryDatabases', 'meetings', 'projectActions', 'trainings'));
        $this->set('_serialize', ['department']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Department id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $department = $this->Departments->get($id, [
            'contain' => ['InquiryDatabases', 'Meetings', 'ProjectActions', 'Trainings']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $department = $this->Departments->patchEntity($department, $this->request->data);
            if ($this->Departments->save($department)) {
                $this->Flash->success(__('The {0} has been saved.', 'Department'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Department'));
            }
        }
        $ministries = $this->Departments->Ministries->find('list', ['limit' => 200]);
        $inquiryDatabases = $this->Departments->InquiryDatabases->find('list', ['limit' => 200]);
        $meetings = $this->Departments->Meetings->find('list', ['limit' => 200]);
        $projectActions = $this->Departments->ProjectActions->find('list', ['limit' => 200]);
        $trainings = $this->Departments->Trainings->find('list', ['limit' => 200]);
        $this->set(compact('department', 'ministries', 'inquiryDatabases', 'meetings', 'projectActions', 'trainings'));
        $this->set('_serialize', ['department']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Department id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $department = $this->Departments->get($id);
        if ($this->Departments->delete($department)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Department'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Department'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
