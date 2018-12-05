<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DepartmentsInquiryDatabases Controller
 *
 * @property \App\Model\Table\DepartmentsInquiryDatabasesTable $DepartmentsInquiryDatabases
 *
 * @method \App\Model\Entity\DepartmentsInquiryDatabase[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DepartmentsInquiryDatabasesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Departments', 'InquiryDatabases']
        ];
        $departmentsInquiryDatabases = $this->paginate($this->DepartmentsInquiryDatabases);

        $this->set(compact('departmentsInquiryDatabases'));
    }

    /**
     * View method
     *
     * @param string|null $id Departments Inquiry Database id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $departmentsInquiryDatabase = $this->DepartmentsInquiryDatabases->get($id, [
            'contain' => ['Departments', 'InquiryDatabases']
        ]);

        $this->set('departmentsInquiryDatabase', $departmentsInquiryDatabase);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $departmentsInquiryDatabase = $this->DepartmentsInquiryDatabases->newEntity();
        if ($this->request->is('post')) {
            $departmentsInquiryDatabase = $this->DepartmentsInquiryDatabases->patchEntity($departmentsInquiryDatabase, $this->request->data);
            if ($this->DepartmentsInquiryDatabases->save($departmentsInquiryDatabase)) {
                $this->Flash->success(__('The {0} has been saved.', 'Departments Inquiry Database'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Departments Inquiry Database'));
            }
        }
        $departments = $this->DepartmentsInquiryDatabases->Departments->find('list', ['limit' => 200]);
        $inquiryDatabases = $this->DepartmentsInquiryDatabases->InquiryDatabases->find('list', ['limit' => 200]);
        $this->set(compact('departmentsInquiryDatabase', 'departments', 'inquiryDatabases'));
        $this->set('_serialize', ['departmentsInquiryDatabase']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Departments Inquiry Database id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $departmentsInquiryDatabase = $this->DepartmentsInquiryDatabases->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $departmentsInquiryDatabase = $this->DepartmentsInquiryDatabases->patchEntity($departmentsInquiryDatabase, $this->request->data);
            if ($this->DepartmentsInquiryDatabases->save($departmentsInquiryDatabase)) {
                $this->Flash->success(__('The {0} has been saved.', 'Departments Inquiry Database'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Departments Inquiry Database'));
            }
        }
        $departments = $this->DepartmentsInquiryDatabases->Departments->find('list', ['limit' => 200]);
        $inquiryDatabases = $this->DepartmentsInquiryDatabases->InquiryDatabases->find('list', ['limit' => 200]);
        $this->set(compact('departmentsInquiryDatabase', 'departments', 'inquiryDatabases'));
        $this->set('_serialize', ['departmentsInquiryDatabase']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Departments Inquiry Database id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $departmentsInquiryDatabase = $this->DepartmentsInquiryDatabases->get($id);
        if ($this->DepartmentsInquiryDatabases->delete($departmentsInquiryDatabase)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Departments Inquiry Database'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Departments Inquiry Database'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
