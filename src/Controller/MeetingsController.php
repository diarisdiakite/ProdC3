<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Meetings Controller
 *
 * @property \App\Model\Table\MeetingsTable $Meetings
 *
 * @method \App\Model\Entity\Meeting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MeetingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Programmations']
        ];
        $meetings = $this->paginate($this->Meetings);

        $this->set(compact('meetings'));
    }

    /**
     * View method
     *
     * @param string|null $id Meeting id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $meeting = $this->Meetings->get($id, [
            'contain' => ['Programmations', 'Departments', 'Experts', 'Ministries', 'MeetingSubjects']
        ]);

        $this->set('meeting', $meeting);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $meeting = $this->Meetings->newEntity();
        if ($this->request->is('post')) {
            $meeting = $this->Meetings->patchEntity($meeting, $this->request->data);
            if ($this->Meetings->save($meeting)) {
                $this->Flash->success(__('The {0} has been saved.', 'Meeting'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Meeting'));
            }
        }
        $programmations = $this->Meetings->Programmations->find('list', ['limit' => 200]);
        $departments = $this->Meetings->Departments->find('list', ['limit' => 200]);
        $experts = $this->Meetings->Experts->find('list', ['limit' => 200]);
        $ministries = $this->Meetings->Ministries->find('list', ['limit' => 200]);
        $this->set(compact('meeting', 'programmations', 'departments', 'experts', 'ministries'));
        $this->set('_serialize', ['meeting']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Meeting id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $meeting = $this->Meetings->get($id, [
            'contain' => ['Departments', 'Experts', 'Ministries']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $meeting = $this->Meetings->patchEntity($meeting, $this->request->data);
            if ($this->Meetings->save($meeting)) {
                $this->Flash->success(__('The {0} has been saved.', 'Meeting'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Meeting'));
            }
        }
        $programmations = $this->Meetings->Programmations->find('list', ['limit' => 200]);
        $departments = $this->Meetings->Departments->find('list', ['limit' => 200]);
        $experts = $this->Meetings->Experts->find('list', ['limit' => 200]);
        $ministries = $this->Meetings->Ministries->find('list', ['limit' => 200]);
        $this->set(compact('meeting', 'programmations', 'departments', 'experts', 'ministries'));
        $this->set('_serialize', ['meeting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Meeting id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $meeting = $this->Meetings->get($id);
        if ($this->Meetings->delete($meeting)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Meeting'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Meeting'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
