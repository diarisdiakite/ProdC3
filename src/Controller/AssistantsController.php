<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Assistants Controller
 *
 * @property \App\Model\Table\AssistantsTable $Assistants
 *
 * @method \App\Model\Entity\Assistant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AssistantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Experts', 'Users']
        ];
        $assistants = $this->paginate($this->Assistants);

        $this->set(compact('assistants'));
    }

    /**
     * View method
     *
     * @param string|null $id Assistant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $assistant = $this->Assistants->get($id, [
            'contain' => ['Experts', 'Users']
        ]);

        $this->set('assistant', $assistant);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $assistant = $this->Assistants->newEntity();
        if ($this->request->is('post')) {
            $assistant = $this->Assistants->patchEntity($assistant, $this->request->data);
            if ($this->Assistants->save($assistant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Assistant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Assistant'));
            }
        }
        $experts = $this->Assistants->Experts->find('list', ['limit' => 200]);
        $users = $this->Assistants->Users->find('list', ['limit' => 200]);
        $this->set(compact('assistant', 'experts', 'users'));
        $this->set('_serialize', ['assistant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Assistant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $assistant = $this->Assistants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assistant = $this->Assistants->patchEntity($assistant, $this->request->data);
            if ($this->Assistants->save($assistant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Assistant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Assistant'));
            }
        }
        $experts = $this->Assistants->Experts->find('list', ['limit' => 200]);
        $users = $this->Assistants->Users->find('list', ['limit' => 200]);
        $this->set(compact('assistant', 'experts', 'users'));
        $this->set('_serialize', ['assistant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Assistant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $assistant = $this->Assistants->get($id);
        if ($this->Assistants->delete($assistant)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Assistant'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Assistant'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
