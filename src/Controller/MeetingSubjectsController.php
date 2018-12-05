<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MeetingSubjects Controller
 *
 * @property \App\Model\Table\MeetingSubjectsTable $MeetingSubjects
 *
 * @method \App\Model\Entity\MeetingSubject[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MeetingSubjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Meetings']
        ];
        $meetingSubjects = $this->paginate($this->MeetingSubjects);

        $this->set(compact('meetingSubjects'));
    }

    /**
     * View method
     *
     * @param string|null $id Meeting Subject id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $meetingSubject = $this->MeetingSubjects->get($id, [
            'contain' => ['Meetings']
        ]);

        $this->set('meetingSubject', $meetingSubject);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $meetingSubject = $this->MeetingSubjects->newEntity();
        if ($this->request->is('post')) {
            $meetingSubject = $this->MeetingSubjects->patchEntity($meetingSubject, $this->request->data);
            if ($this->MeetingSubjects->save($meetingSubject)) {
                $this->Flash->success(__('The {0} has been saved.', 'Meeting Subject'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Meeting Subject'));
            }
        }
        $meetings = $this->MeetingSubjects->Meetings->find('list', ['limit' => 200]);
        $this->set(compact('meetingSubject', 'meetings'));
        $this->set('_serialize', ['meetingSubject']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Meeting Subject id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $meetingSubject = $this->MeetingSubjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $meetingSubject = $this->MeetingSubjects->patchEntity($meetingSubject, $this->request->data);
            if ($this->MeetingSubjects->save($meetingSubject)) {
                $this->Flash->success(__('The {0} has been saved.', 'Meeting Subject'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Meeting Subject'));
            }
        }
        $meetings = $this->MeetingSubjects->Meetings->find('list', ['limit' => 200]);
        $this->set(compact('meetingSubject', 'meetings'));
        $this->set('_serialize', ['meetingSubject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Meeting Subject id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $meetingSubject = $this->MeetingSubjects->get($id);
        if ($this->MeetingSubjects->delete($meetingSubject)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Meeting Subject'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Meeting Subject'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
