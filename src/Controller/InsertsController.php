<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inserts Controller
 *
 * @property \App\Model\Table\InsertsTable $Inserts
 *
 * @method \App\Model\Entity\Insert[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InsertsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Structures', 'Planifications', 'Ministries', 'Composants', 'ExpectedResults', 'ProjectActions', 'Types', 'DateYears']
        ];
        $inserts = $this->paginate($this->Inserts);

        $this->set(compact('inserts'));
    }

    /**
     * View method
     *
     * @param string|null $id Insert id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $insert = $this->Inserts->get($id, [
            'contain' => ['Users', 'Structures', 'Planifications', 'Ministries', 'Composants', 'ExpectedResults', 'ProjectActions', 'Types', 'DateYears', 'Activations', 'Realizations']
        ]);

        $this->set('insert', $insert);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $insert = $this->Inserts->newEntity();
        if ($this->request->is('post')) {
            $insert = $this->Inserts->patchEntity($insert, $this->request->data);
            if ($this->Inserts->save($insert)) {
                $this->Flash->success(__('The {0} has been saved.', 'Insert'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Insert'));
            }
        }
        $users = $this->Inserts->Users->find('list', ['limit' => 200]);
        $structures = $this->Inserts->Structures->find('list', ['limit' => 200]);
        $planifications = $this->Inserts->Planifications->find('list', ['limit' => 200]);
        $ministries = $this->Inserts->Ministries->find('list', ['limit' => 200]);
        $composants = $this->Inserts->Composants->find('list', ['limit' => 200]);
        $expectedResults = $this->Inserts->ExpectedResults->find('list', ['limit' => 200]);
        $projectActions = $this->Inserts->ProjectActions->find('list', ['limit' => 200]);
        $types = $this->Inserts->Types->find('list', ['limit' => 200]);
        $dateYears = $this->Inserts->DateYears->find('list', ['limit' => 200]);
        $activations = $this->Inserts->Activations->find('list', ['limit' => 200]);
        $this->set(compact('insert', 'users', 'structures', 'planifications', 'ministries', 'composants', 'expectedResults', 'projectActions', 'types', 'dateYears', 'activations'));
        $this->set('_serialize', ['insert']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Insert id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $insert = $this->Inserts->get($id, [
            'contain' => ['Activations']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $insert = $this->Inserts->patchEntity($insert, $this->request->data);
            if ($this->Inserts->save($insert)) {
                $this->Flash->success(__('The {0} has been saved.', 'Insert'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Insert'));
            }
        }
        $users = $this->Inserts->Users->find('list', ['limit' => 200]);
        $structures = $this->Inserts->Structures->find('list', ['limit' => 200]);
        $planifications = $this->Inserts->Planifications->find('list', ['limit' => 200]);
        $ministries = $this->Inserts->Ministries->find('list', ['limit' => 200]);
        $composants = $this->Inserts->Composants->find('list', ['limit' => 200]);
        $expectedResults = $this->Inserts->ExpectedResults->find('list', ['limit' => 200]);
        $projectActions = $this->Inserts->ProjectActions->find('list', ['limit' => 200]);
        $types = $this->Inserts->Types->find('list', ['limit' => 200]);
        $dateYears = $this->Inserts->DateYears->find('list', ['limit' => 200]);
        $activations = $this->Inserts->Activations->find('list', ['limit' => 200]);
        $this->set(compact('insert', 'users', 'structures', 'planifications', 'ministries', 'composants', 'expectedResults', 'projectActions', 'types', 'dateYears', 'activations'));
        $this->set('_serialize', ['insert']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Insert id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $insert = $this->Inserts->get($id);
        if ($this->Inserts->delete($insert)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Insert'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Insert'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
