<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Experts Controller
 *
 * @property \App\Model\Table\ExpertsTable $Experts
 *
 * @method \App\Model\Entity\Expert[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExpertsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Teams']
        ];
        $experts = $this->paginate($this->Experts);

        $this->set(compact('experts'));
    }

    /**
     * View method
     *
     * @param string|null $id Expert id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $expert = $this->Experts->get($id, [
            'contain' => ['Users', 'Teams', 'Assignements', 'Meetings', 'Assistants', 'FocalPoints', 'Ministries', 'Programmations']
        ]);

        $this->set('expert', $expert);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $expert = $this->Experts->newEntity();
        if ($this->request->is('post')) {
            $expert = $this->Experts->patchEntity($expert, $this->request->data);
            if ($this->Experts->save($expert)) {
                $this->Flash->success(__('The {0} has been saved.', 'Expert'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Expert'));
            }
        }
        $users = $this->Experts->Users->find('list', ['limit' => 200]);
        $teams = $this->Experts->Teams->find('list', ['limit' => 200]);
        $assignements = $this->Experts->Assignements->find('list', ['limit' => 200]);
        $meetings = $this->Experts->Meetings->find('list', ['limit' => 200]);
        $this->set(compact('expert', 'users', 'teams', 'assignements', 'meetings'));
        $this->set('_serialize', ['expert']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Expert id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $expert = $this->Experts->get($id, [
            'contain' => ['Assignements', 'Meetings']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $expert = $this->Experts->patchEntity($expert, $this->request->data);
            if ($this->Experts->save($expert)) {
                $this->Flash->success(__('The {0} has been saved.', 'Expert'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Expert'));
            }
        }
        $users = $this->Experts->Users->find('list', ['limit' => 200]);
        $teams = $this->Experts->Teams->find('list', ['limit' => 200]);
        $assignements = $this->Experts->Assignements->find('list', ['limit' => 200]);
        $meetings = $this->Experts->Meetings->find('list', ['limit' => 200]);
        $this->set(compact('expert', 'users', 'teams', 'assignements', 'meetings'));
        $this->set('_serialize', ['expert']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Expert id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $expert = $this->Experts->get($id);
        if ($this->Experts->delete($expert)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Expert'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Expert'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
