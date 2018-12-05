<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DepartmentsMeetings Controller
 *
 * @property \App\Model\Table\DepartmentsMeetingsTable $DepartmentsMeetings
 *
 * @method \App\Model\Entity\DepartmentsMeeting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DepartmentsMeetingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Departments', 'Meetings']
        ];
        $departmentsMeetings = $this->paginate($this->DepartmentsMeetings);

        $this->set(compact('departmentsMeetings'));
    }

    /**
     * View method
     *
     * @param string|null $id Departments Meeting id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $departmentsMeeting = $this->DepartmentsMeetings->get($id, [
            'contain' => ['Departments', 'Meetings']
        ]);

        $this->set('departmentsMeeting', $departmentsMeeting);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $departmentsMeeting = $this->DepartmentsMeetings->newEntity();
        if ($this->request->is('post')) {
            $departmentsMeeting = $this->DepartmentsMeetings->patchEntity($departmentsMeeting, $this->request->data);
            if ($this->DepartmentsMeetings->save($departmentsMeeting)) {
                $this->Flash->success(__('The {0} has been saved.', 'Departments Meeting'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Departments Meeting'));
            }
        }
        $departments = $this->DepartmentsMeetings->Departments->find('list', ['limit' => 200]);
        $meetings = $this->DepartmentsMeetings->Meetings->find('list', ['limit' => 200]);
        $this->set(compact('departmentsMeeting', 'departments', 'meetings'));
        $this->set('_serialize', ['departmentsMeeting']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Departments Meeting id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $departmentsMeeting = $this->DepartmentsMeetings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $departmentsMeeting = $this->DepartmentsMeetings->patchEntity($departmentsMeeting, $this->request->data);
            if ($this->DepartmentsMeetings->save($departmentsMeeting)) {
                $this->Flash->success(__('The {0} has been saved.', 'Departments Meeting'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Departments Meeting'));
            }
        }
        $departments = $this->DepartmentsMeetings->Departments->find('list', ['limit' => 200]);
        $meetings = $this->DepartmentsMeetings->Meetings->find('list', ['limit' => 200]);
        $this->set(compact('departmentsMeeting', 'departments', 'meetings'));
        $this->set('_serialize', ['departmentsMeeting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Departments Meeting id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $departmentsMeeting = $this->DepartmentsMeetings->get($id);
        if ($this->DepartmentsMeetings->delete($departmentsMeeting)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Departments Meeting'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Departments Meeting'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
