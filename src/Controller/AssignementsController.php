<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Assignements Controller
 *
 * @property \App\Model\Table\AssignementsTable $Assignements
 *
 * @method \App\Model\Entity\Assignement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AssignementsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Groups', 'Users', 'Posts']
        ];
        $assignements = $this->paginate($this->Assignements);

        $this->set(compact('assignements'));
    }

    /**
     * View method
     *
     * @param string|null $id Assignement id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $assignement = $this->Assignements->get($id, [
            'contain' => ['Groups', 'Users', 'Posts', 'Experts', 'Operations']
        ]);

        $this->set('assignement', $assignement);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $assignement = $this->Assignements->newEntity();
        if ($this->request->is('post')) {
            $assignement = $this->Assignements->patchEntity($assignement, $this->request->data);
            if ($this->Assignements->save($assignement)) {
                $this->Flash->success(__('The {0} has been saved.', 'Assignement'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Assignement'));
            }
        }
        $groups = $this->Assignements->Groups->find('list', ['limit' => 200]);
        $users = $this->Assignements->Users->find('list', ['limit' => 200]);
        $posts = $this->Assignements->Posts->find('list', ['limit' => 200]);
        $experts = $this->Assignements->Experts->find('list', ['limit' => 200]);
        $this->set(compact('assignement', 'groups', 'users', 'posts', 'experts'));
        $this->set('_serialize', ['assignement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Assignement id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $assignement = $this->Assignements->get($id, [
            'contain' => ['Experts']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assignement = $this->Assignements->patchEntity($assignement, $this->request->data);
            if ($this->Assignements->save($assignement)) {
                $this->Flash->success(__('The {0} has been saved.', 'Assignement'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Assignement'));
            }
        }
        $groups = $this->Assignements->Groups->find('list', ['limit' => 200]);
        $users = $this->Assignements->Users->find('list', ['limit' => 200]);
        $posts = $this->Assignements->Posts->find('list', ['limit' => 200]);
        $experts = $this->Assignements->Experts->find('list', ['limit' => 200]);
        $this->set(compact('assignement', 'groups', 'users', 'posts', 'experts'));
        $this->set('_serialize', ['assignement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Assignement id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $assignement = $this->Assignements->get($id);
        if ($this->Assignements->delete($assignement)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Assignement'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Assignement'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
