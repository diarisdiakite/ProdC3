<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Secretaries Controller
 *
 * @property \App\Model\Table\SecretariesTable $Secretaries
 *
 * @method \App\Model\Entity\Secretary[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SecretariesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $secretaries = $this->paginate($this->Secretaries);

        $this->set(compact('secretaries'));
    }

    /**
     * View method
     *
     * @param string|null $id Secretary id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $secretary = $this->Secretaries->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('secretary', $secretary);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $secretary = $this->Secretaries->newEntity();
        if ($this->request->is('post')) {
            $secretary = $this->Secretaries->patchEntity($secretary, $this->request->data);
            if ($this->Secretaries->save($secretary)) {
                $this->Flash->success(__('The {0} has been saved.', 'Secretary'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Secretary'));
            }
        }
        $users = $this->Secretaries->Users->find('list', ['limit' => 200]);
        $this->set(compact('secretary', 'users'));
        $this->set('_serialize', ['secretary']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Secretary id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $secretary = $this->Secretaries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $secretary = $this->Secretaries->patchEntity($secretary, $this->request->data);
            if ($this->Secretaries->save($secretary)) {
                $this->Flash->success(__('The {0} has been saved.', 'Secretary'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Secretary'));
            }
        }
        $users = $this->Secretaries->Users->find('list', ['limit' => 200]);
        $this->set(compact('secretary', 'users'));
        $this->set('_serialize', ['secretary']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Secretary id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $secretary = $this->Secretaries->get($id);
        if ($this->Secretaries->delete($secretary)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Secretary'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Secretary'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
