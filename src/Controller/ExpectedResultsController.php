<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExpectedResults Controller
 *
 * @property \App\Model\Table\ExpectedResultsTable $ExpectedResults
 *
 * @method \App\Model\Entity\ExpectedResult[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExpectedResultsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Composants']
        ];
        $expectedResults = $this->paginate($this->ExpectedResults);

        $this->set(compact('expectedResults'));
    }

    /**
     * View method
     *
     * @param string|null $id Expected Result id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $expectedResult = $this->ExpectedResults->get($id, [
            'contain' => ['Users', 'Composants', 'Inserts', 'ProjectActions']
        ]);

        $this->set('expectedResult', $expectedResult);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $expectedResult = $this->ExpectedResults->newEntity();
        if ($this->request->is('post')) {
            $expectedResult = $this->ExpectedResults->patchEntity($expectedResult, $this->request->data);
            if ($this->ExpectedResults->save($expectedResult)) {
                $this->Flash->success(__('The {0} has been saved.', 'Expected Result'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Expected Result'));
            }
        }
        $users = $this->ExpectedResults->Users->find('list', ['limit' => 200]);
        $composants = $this->ExpectedResults->Composants->find('list', ['limit' => 200]);
        $this->set(compact('expectedResult', 'users', 'composants'));
        $this->set('_serialize', ['expectedResult']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Expected Result id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $expectedResult = $this->ExpectedResults->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $expectedResult = $this->ExpectedResults->patchEntity($expectedResult, $this->request->data);
            if ($this->ExpectedResults->save($expectedResult)) {
                $this->Flash->success(__('The {0} has been saved.', 'Expected Result'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Expected Result'));
            }
        }
        $users = $this->ExpectedResults->Users->find('list', ['limit' => 200]);
        $composants = $this->ExpectedResults->Composants->find('list', ['limit' => 200]);
        $this->set(compact('expectedResult', 'users', 'composants'));
        $this->set('_serialize', ['expectedResult']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Expected Result id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $expectedResult = $this->ExpectedResults->get($id);
        if ($this->ExpectedResults->delete($expectedResult)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Expected Result'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Expected Result'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
