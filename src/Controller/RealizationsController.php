<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Realizations Controller
 *
 * @property \App\Model\Table\RealizationsTable $Realizations
 *
 * @method \App\Model\Entity\Realization[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RealizationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Departments', 'Inserts']
        ];
        $realizations = $this->paginate($this->Realizations);

        $this->set(compact('realizations'));
    }

    /**
     * View method
     *
     * @param string|null $id Realization id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $realization = $this->Realizations->get($id, [
            'contain' => ['Users', 'Departments', 'Inserts']
        ]);

        $this->set('realization', $realization);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $realization = $this->Realizations->newEntity();
        if ($this->request->is('post')) {
            $realization = $this->Realizations->patchEntity($realization, $this->request->data);
            if ($this->Realizations->save($realization)) {
                $this->Flash->success(__('The {0} has been saved.', 'Realization'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Realization'));
            }
        }
        $users = $this->Realizations->Users->find('list', ['limit' => 200]);
        $departments = $this->Realizations->Departments->find('list', ['limit' => 200]);
        $inserts = $this->Realizations->Inserts->find('list', ['limit' => 200]);
        $this->set(compact('realization', 'users', 'departments', 'inserts'));
        $this->set('_serialize', ['realization']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Realization id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $realization = $this->Realizations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $realization = $this->Realizations->patchEntity($realization, $this->request->data);
            if ($this->Realizations->save($realization)) {
                $this->Flash->success(__('The {0} has been saved.', 'Realization'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Realization'));
            }
        }
        $users = $this->Realizations->Users->find('list', ['limit' => 200]);
        $departments = $this->Realizations->Departments->find('list', ['limit' => 200]);
        $inserts = $this->Realizations->Inserts->find('list', ['limit' => 200]);
        $this->set(compact('realization', 'users', 'departments', 'inserts'));
        $this->set('_serialize', ['realization']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Realization id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $realization = $this->Realizations->get($id);
        if ($this->Realizations->delete($realization)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Realization'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Realization'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
