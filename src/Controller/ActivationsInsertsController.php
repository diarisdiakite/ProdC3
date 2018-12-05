<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ActivationsInserts Controller
 *
 * @property \App\Model\Table\ActivationsInsertsTable $ActivationsInserts
 *
 * @method \App\Model\Entity\ActivationsInsert[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActivationsInsertsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Activations', 'Inserts']
        ];
        $activationsInserts = $this->paginate($this->ActivationsInserts);

        $this->set(compact('activationsInserts'));
    }

    /**
     * View method
     *
     * @param string|null $id Activations Insert id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $activationsInsert = $this->ActivationsInserts->get($id, [
            'contain' => ['Activations', 'Inserts']
        ]);

        $this->set('activationsInsert', $activationsInsert);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $activationsInsert = $this->ActivationsInserts->newEntity();
        if ($this->request->is('post')) {
            $activationsInsert = $this->ActivationsInserts->patchEntity($activationsInsert, $this->request->data);
            if ($this->ActivationsInserts->save($activationsInsert)) {
                $this->Flash->success(__('The {0} has been saved.', 'Activations Insert'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Activations Insert'));
            }
        }
        $activations = $this->ActivationsInserts->Activations->find('list', ['limit' => 200]);
        $inserts = $this->ActivationsInserts->Inserts->find('list', ['limit' => 200]);
        $this->set(compact('activationsInsert', 'activations', 'inserts'));
        $this->set('_serialize', ['activationsInsert']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Activations Insert id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $activationsInsert = $this->ActivationsInserts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $activationsInsert = $this->ActivationsInserts->patchEntity($activationsInsert, $this->request->data);
            if ($this->ActivationsInserts->save($activationsInsert)) {
                $this->Flash->success(__('The {0} has been saved.', 'Activations Insert'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Activations Insert'));
            }
        }
        $activations = $this->ActivationsInserts->Activations->find('list', ['limit' => 200]);
        $inserts = $this->ActivationsInserts->Inserts->find('list', ['limit' => 200]);
        $this->set(compact('activationsInsert', 'activations', 'inserts'));
        $this->set('_serialize', ['activationsInsert']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Activations Insert id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $activationsInsert = $this->ActivationsInserts->get($id);
        if ($this->ActivationsInserts->delete($activationsInsert)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Activations Insert'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Activations Insert'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
