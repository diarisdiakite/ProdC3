<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InquiryDatabasesStructures Controller
 *
 * @property \App\Model\Table\InquiryDatabasesStructuresTable $InquiryDatabasesStructures
 *
 * @method \App\Model\Entity\InquiryDatabasesStructure[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InquiryDatabasesStructuresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['InquiryDatabases', 'Structures']
        ];
        $inquiryDatabasesStructures = $this->paginate($this->InquiryDatabasesStructures);

        $this->set(compact('inquiryDatabasesStructures'));
    }

    /**
     * View method
     *
     * @param string|null $id Inquiry Databases Structure id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inquiryDatabasesStructure = $this->InquiryDatabasesStructures->get($id, [
            'contain' => ['InquiryDatabases', 'Structures']
        ]);

        $this->set('inquiryDatabasesStructure', $inquiryDatabasesStructure);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inquiryDatabasesStructure = $this->InquiryDatabasesStructures->newEntity();
        if ($this->request->is('post')) {
            $inquiryDatabasesStructure = $this->InquiryDatabasesStructures->patchEntity($inquiryDatabasesStructure, $this->request->data);
            if ($this->InquiryDatabasesStructures->save($inquiryDatabasesStructure)) {
                $this->Flash->success(__('The {0} has been saved.', 'Inquiry Databases Structure'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Inquiry Databases Structure'));
            }
        }
        $inquiryDatabases = $this->InquiryDatabasesStructures->InquiryDatabases->find('list', ['limit' => 200]);
        $structures = $this->InquiryDatabasesStructures->Structures->find('list', ['limit' => 200]);
        $this->set(compact('inquiryDatabasesStructure', 'inquiryDatabases', 'structures'));
        $this->set('_serialize', ['inquiryDatabasesStructure']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inquiry Databases Structure id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inquiryDatabasesStructure = $this->InquiryDatabasesStructures->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inquiryDatabasesStructure = $this->InquiryDatabasesStructures->patchEntity($inquiryDatabasesStructure, $this->request->data);
            if ($this->InquiryDatabasesStructures->save($inquiryDatabasesStructure)) {
                $this->Flash->success(__('The {0} has been saved.', 'Inquiry Databases Structure'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Inquiry Databases Structure'));
            }
        }
        $inquiryDatabases = $this->InquiryDatabasesStructures->InquiryDatabases->find('list', ['limit' => 200]);
        $structures = $this->InquiryDatabasesStructures->Structures->find('list', ['limit' => 200]);
        $this->set(compact('inquiryDatabasesStructure', 'inquiryDatabases', 'structures'));
        $this->set('_serialize', ['inquiryDatabasesStructure']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inquiry Databases Structure id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inquiryDatabasesStructure = $this->InquiryDatabasesStructures->get($id);
        if ($this->InquiryDatabasesStructures->delete($inquiryDatabasesStructure)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Inquiry Databases Structure'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Inquiry Databases Structure'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
