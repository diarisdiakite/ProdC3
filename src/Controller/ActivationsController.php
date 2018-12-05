<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Activations Controller
 *
 * @property \App\Model\Table\ActivationsTable $Activations
 *
 * @method \App\Model\Entity\Activation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActivationsController extends AppController
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
        $activations = $this->paginate($this->Activations);

        $this->set(compact('activations'));
    }

    /**
     * View method
     *
     * @param string|null $id Activation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $activation = $this->Activations->get($id, [
            'contain' => ['Users', 'Inserts', 'Posts', 'Structures']
        ]);

        $this->set('activation', $activation);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $activation = $this->Activations->newEntity();
        if ($this->request->is('post')) {
            $activation = $this->Activations->patchEntity($activation, $this->request->data);
            if ($this->Activations->save($activation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Activation'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Activation'));
            }
        }
        $users = $this->Activations->Users->find('list', ['limit' => 200]);
        $inserts = $this->Activations->Inserts->find('list', ['limit' => 200]);
        $posts = $this->Activations->Posts->find('list', ['limit' => 200]);
        $structures = $this->Activations->Structures->find('list', ['limit' => 200]);
        $this->set(compact('activation', 'users', 'inserts', 'posts', 'structures'));
        $this->set('_serialize', ['activation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Activation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $activation = $this->Activations->get($id, [
            'contain' => ['Inserts', 'Posts', 'Structures']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $activation = $this->Activations->patchEntity($activation, $this->request->data);
            if ($this->Activations->save($activation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Activation'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Activation'));
            }
        }
        $users = $this->Activations->Users->find('list', ['limit' => 200]);
        $inserts = $this->Activations->Inserts->find('list', ['limit' => 200]);
        $posts = $this->Activations->Posts->find('list', ['limit' => 200]);
        $structures = $this->Activations->Structures->find('list', ['limit' => 200]);
        $this->set(compact('activation', 'users', 'inserts', 'posts', 'structures'));
        $this->set('_serialize', ['activation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Activation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $activation = $this->Activations->get($id);
        if ($this->Activations->delete($activation)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Activation'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Activation'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
