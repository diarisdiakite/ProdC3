<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Leashes Controller
 *
 * @property \App\Model\Table\LeashesTable $Leashes
 *
 * @method \App\Model\Entity\Leash[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LeashesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Sectors']
        ];
        $leashes = $this->paginate($this->Leashes);

        $this->set(compact('leashes'));
    }

    /**
     * View method
     *
     * @param string|null $id Leash id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $leash = $this->Leashes->get($id, [
            'contain' => ['Users', 'Sectors', 'JobEmployments', 'Trainings']
        ]);

        $this->set('leash', $leash);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $leash = $this->Leashes->newEntity();
        if ($this->request->is('post')) {
            $leash = $this->Leashes->patchEntity($leash, $this->request->data);
            if ($this->Leashes->save($leash)) {
                $this->Flash->success(__('The {0} has been saved.', 'Leash'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Leash'));
            }
        }
        $users = $this->Leashes->Users->find('list', ['limit' => 200]);
        $sectors = $this->Leashes->Sectors->find('list', ['limit' => 200]);
        $this->set(compact('leash', 'users', 'sectors'));
        $this->set('_serialize', ['leash']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Leash id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $leash = $this->Leashes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $leash = $this->Leashes->patchEntity($leash, $this->request->data);
            if ($this->Leashes->save($leash)) {
                $this->Flash->success(__('The {0} has been saved.', 'Leash'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Leash'));
            }
        }
        $users = $this->Leashes->Users->find('list', ['limit' => 200]);
        $sectors = $this->Leashes->Sectors->find('list', ['limit' => 200]);
        $this->set(compact('leash', 'users', 'sectors'));
        $this->set('_serialize', ['leash']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Leash id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $leash = $this->Leashes->get($id);
        if ($this->Leashes->delete($leash)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Leash'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Leash'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
