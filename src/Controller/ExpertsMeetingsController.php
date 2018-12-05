<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExpertsMeetings Controller
 *
 * @property \App\Model\Table\ExpertsMeetingsTable $ExpertsMeetings
 *
 * @method \App\Model\Entity\ExpertsMeeting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExpertsMeetingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Experts', 'Meetings']
        ];
        $expertsMeetings = $this->paginate($this->ExpertsMeetings);

        $this->set(compact('expertsMeetings'));
    }

    /**
     * View method
     *
     * @param string|null $id Experts Meeting id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $expertsMeeting = $this->ExpertsMeetings->get($id, [
            'contain' => ['Experts', 'Meetings']
        ]);

        $this->set('expertsMeeting', $expertsMeeting);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $expertsMeeting = $this->ExpertsMeetings->newEntity();
        if ($this->request->is('post')) {
            $expertsMeeting = $this->ExpertsMeetings->patchEntity($expertsMeeting, $this->request->data);
            if ($this->ExpertsMeetings->save($expertsMeeting)) {
                $this->Flash->success(__('The {0} has been saved.', 'Experts Meeting'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Experts Meeting'));
            }
        }
        $experts = $this->ExpertsMeetings->Experts->find('list', ['limit' => 200]);
        $meetings = $this->ExpertsMeetings->Meetings->find('list', ['limit' => 200]);
        $this->set(compact('expertsMeeting', 'experts', 'meetings'));
        $this->set('_serialize', ['expertsMeeting']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Experts Meeting id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $expertsMeeting = $this->ExpertsMeetings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $expertsMeeting = $this->ExpertsMeetings->patchEntity($expertsMeeting, $this->request->data);
            if ($this->ExpertsMeetings->save($expertsMeeting)) {
                $this->Flash->success(__('The {0} has been saved.', 'Experts Meeting'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Experts Meeting'));
            }
        }
        $experts = $this->ExpertsMeetings->Experts->find('list', ['limit' => 200]);
        $meetings = $this->ExpertsMeetings->Meetings->find('list', ['limit' => 200]);
        $this->set(compact('expertsMeeting', 'experts', 'meetings'));
        $this->set('_serialize', ['expertsMeeting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Experts Meeting id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $expertsMeeting = $this->ExpertsMeetings->get($id);
        if ($this->ExpertsMeetings->delete($expertsMeeting)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Experts Meeting'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Experts Meeting'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
