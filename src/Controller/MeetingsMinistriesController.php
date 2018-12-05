<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MeetingsMinistries Controller
 *
 * @property \App\Model\Table\MeetingsMinistriesTable $MeetingsMinistries
 *
 * @method \App\Model\Entity\MeetingsMinistry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MeetingsMinistriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Meetings', 'Ministries']
        ];
        $meetingsMinistries = $this->paginate($this->MeetingsMinistries);

        $this->set(compact('meetingsMinistries'));
    }

    /**
     * View method
     *
     * @param string|null $id Meetings Ministry id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $meetingsMinistry = $this->MeetingsMinistries->get($id, [
            'contain' => ['Meetings', 'Ministries']
        ]);

        $this->set('meetingsMinistry', $meetingsMinistry);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $meetingsMinistry = $this->MeetingsMinistries->newEntity();
        if ($this->request->is('post')) {
            $meetingsMinistry = $this->MeetingsMinistries->patchEntity($meetingsMinistry, $this->request->data);
            if ($this->MeetingsMinistries->save($meetingsMinistry)) {
                $this->Flash->success(__('The {0} has been saved.', 'Meetings Ministry'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Meetings Ministry'));
            }
        }
        $meetings = $this->MeetingsMinistries->Meetings->find('list', ['limit' => 200]);
        $ministries = $this->MeetingsMinistries->Ministries->find('list', ['limit' => 200]);
        $this->set(compact('meetingsMinistry', 'meetings', 'ministries'));
        $this->set('_serialize', ['meetingsMinistry']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Meetings Ministry id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $meetingsMinistry = $this->MeetingsMinistries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $meetingsMinistry = $this->MeetingsMinistries->patchEntity($meetingsMinistry, $this->request->data);
            if ($this->MeetingsMinistries->save($meetingsMinistry)) {
                $this->Flash->success(__('The {0} has been saved.', 'Meetings Ministry'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Meetings Ministry'));
            }
        }
        $meetings = $this->MeetingsMinistries->Meetings->find('list', ['limit' => 200]);
        $ministries = $this->MeetingsMinistries->Ministries->find('list', ['limit' => 200]);
        $this->set(compact('meetingsMinistry', 'meetings', 'ministries'));
        $this->set('_serialize', ['meetingsMinistry']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Meetings Ministry id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $meetingsMinistry = $this->MeetingsMinistries->get($id);
        if ($this->MeetingsMinistries->delete($meetingsMinistry)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Meetings Ministry'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Meetings Ministry'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
