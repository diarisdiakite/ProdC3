<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Planifications Controller
 *
 * @property \App\Model\Table\PlanificationsTable $Planifications
 *
 * @method \App\Model\Entity\Planification[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlanificationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Ministries', 'Departments']
        ];
        $planifications = $this->paginate($this->Planifications);

        $this->set(compact('planifications'));
    }

    /**
     * View method
     *
     * @param string|null $id Planification id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $planification = $this->Planifications->get($id, [
            'contain' => ['Users', 'Ministries', 'Departments', 'Inserts']
        ]);

        $this->set('planification', $planification);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $planification = $this->Planifications->newEntity();
        if ($this->request->is('post')) {
            $planification = $this->Planifications->patchEntity($planification, $this->request->data);
            if ($this->Planifications->save($planification)) {
                $this->Flash->success(__('The {0} has been saved.', 'Planification'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Planification'));
            }
        }
        $users = $this->Planifications->Users->find('list', ['limit' => 200]);
        $ministries = $this->Planifications->Ministries->find('list', ['limit' => 200]);
        $departments = $this->Planifications->Departments->find('list', ['limit' => 200]);
        $this->set(compact('planification', 'users', 'ministries', 'departments'));
        $this->set('_serialize', ['planification']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Planification id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $planification = $this->Planifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $planification = $this->Planifications->patchEntity($planification, $this->request->data);
            if ($this->Planifications->save($planification)) {
                $this->Flash->success(__('The {0} has been saved.', 'Planification'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Planification'));
            }
        }
        $users = $this->Planifications->Users->find('list', ['limit' => 200]);
        $ministries = $this->Planifications->Ministries->find('list', ['limit' => 200]);
        $departments = $this->Planifications->Departments->find('list', ['limit' => 200]);
        $this->set(compact('planification', 'users', 'ministries', 'departments'));
        $this->set('_serialize', ['planification']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Planification id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $planification = $this->Planifications->get($id);
        if ($this->Planifications->delete($planification)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Planification'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Planification'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
