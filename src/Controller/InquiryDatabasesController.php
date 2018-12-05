<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InquiryDatabases Controller
 *
 * @property \App\Model\Table\InquiryDatabasesTable $InquiryDatabases
 *
 * @method \App\Model\Entity\InquiryDatabase[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InquiryDatabasesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $inquiryDatabases = $this->paginate($this->InquiryDatabases);

        $this->set(compact('inquiryDatabases'));
    }

    /**
     * View method
     *
     * @param string|null $id Inquiry Database id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inquiryDatabase = $this->InquiryDatabases->get($id, [
            'contain' => ['Departments', 'Structures']
        ]);

        $this->set('inquiryDatabase', $inquiryDatabase);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inquiryDatabase = $this->InquiryDatabases->newEntity();
        if ($this->request->is('post')) {
            $inquiryDatabase = $this->InquiryDatabases->patchEntity($inquiryDatabase, $this->request->data);
            if ($this->InquiryDatabases->save($inquiryDatabase)) {
                $this->Flash->success(__('The {0} has been saved.', 'Inquiry Database'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Inquiry Database'));
            }
        }
        $departments = $this->InquiryDatabases->Departments->find('list', ['limit' => 200]);
        $structures = $this->InquiryDatabases->Structures->find('list', ['limit' => 200]);
        $this->set(compact('inquiryDatabase', 'departments', 'structures'));
        $this->set('_serialize', ['inquiryDatabase']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inquiry Database id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inquiryDatabase = $this->InquiryDatabases->get($id, [
            'contain' => ['Departments', 'Structures']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inquiryDatabase = $this->InquiryDatabases->patchEntity($inquiryDatabase, $this->request->data);
            if ($this->InquiryDatabases->save($inquiryDatabase)) {
                $this->Flash->success(__('The {0} has been saved.', 'Inquiry Database'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Inquiry Database'));
            }
        }
        $departments = $this->InquiryDatabases->Departments->find('list', ['limit' => 200]);
        $structures = $this->InquiryDatabases->Structures->find('list', ['limit' => 200]);
        $this->set(compact('inquiryDatabase', 'departments', 'structures'));
        $this->set('_serialize', ['inquiryDatabase']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inquiry Database id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inquiryDatabase = $this->InquiryDatabases->get($id);
        if ($this->InquiryDatabases->delete($inquiryDatabase)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Inquiry Database'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Inquiry Database'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
