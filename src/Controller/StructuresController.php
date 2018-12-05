<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Structures Controller
 *
 * @property \App\Model\Table\StructuresTable $Structures
 *
 * @method \App\Model\Entity\Structure[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StructuresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'FocalPoints', 'Ministries', 'Departments']
        ];
        $structures = $this->paginate($this->Structures);

        $this->set(compact('structures'));
    }

    /**
     * View method
     *
     * @param string|null $id Structure id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $structure = $this->Structures->get($id, [
            'contain' => ['Users', 'FocalPoints', 'Ministries', 'Departments', 'Activations', 'InquiryDatabases', 'Trainings', 'Inserts', 'Technicals']
        ]);

        $this->set('structure', $structure);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $structure = $this->Structures->newEntity();
        if ($this->request->is('post')) {
            $structure = $this->Structures->patchEntity($structure, $this->request->data);
            if ($this->Structures->save($structure)) {
                $this->Flash->success(__('The {0} has been saved.', 'Structure'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Structure'));
            }
        }
        $users = $this->Structures->Users->find('list', ['limit' => 200]);
        $focalPoints = $this->Structures->FocalPoints->find('list', ['limit' => 200]);
        $ministries = $this->Structures->Ministries->find('list', ['limit' => 200]);
        $departments = $this->Structures->Departments->find('list', ['limit' => 200]);
        $activations = $this->Structures->Activations->find('list', ['limit' => 200]);
        $inquiryDatabases = $this->Structures->InquiryDatabases->find('list', ['limit' => 200]);
        $trainings = $this->Structures->Trainings->find('list', ['limit' => 200]);
        $this->set(compact('structure', 'users', 'focalPoints', 'ministries', 'departments', 'activations', 'inquiryDatabases', 'trainings'));
        $this->set('_serialize', ['structure']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Structure id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $structure = $this->Structures->get($id, [
            'contain' => ['Activations', 'InquiryDatabases', 'Trainings']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $structure = $this->Structures->patchEntity($structure, $this->request->data);
            if ($this->Structures->save($structure)) {
                $this->Flash->success(__('The {0} has been saved.', 'Structure'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Structure'));
            }
        }
        $users = $this->Structures->Users->find('list', ['limit' => 200]);
        $focalPoints = $this->Structures->FocalPoints->find('list', ['limit' => 200]);
        $ministries = $this->Structures->Ministries->find('list', ['limit' => 200]);
        $departments = $this->Structures->Departments->find('list', ['limit' => 200]);
        $activations = $this->Structures->Activations->find('list', ['limit' => 200]);
        $inquiryDatabases = $this->Structures->InquiryDatabases->find('list', ['limit' => 200]);
        $trainings = $this->Structures->Trainings->find('list', ['limit' => 200]);
        $this->set(compact('structure', 'users', 'focalPoints', 'ministries', 'departments', 'activations', 'inquiryDatabases', 'trainings'));
        $this->set('_serialize', ['structure']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Structure id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $structure = $this->Structures->get($id);
        if ($this->Structures->delete($structure)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Structure'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Structure'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
