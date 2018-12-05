<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Programmations Controller
 *
 * @property \App\Model\Table\ProgrammationsTable $Programmations
 *
 * @method \App\Model\Entity\Programmation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProgrammationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Experts']
        ];
        $programmations = $this->paginate($this->Programmations);

        $this->set(compact('programmations'));
    }

    /**
     * View method
     *
     * @param string|null $id Programmation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $programmation = $this->Programmations->get($id, [
            'contain' => ['Experts', 'Meetings']
        ]);

        $this->set('programmation', $programmation);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $programmation = $this->Programmations->newEntity();
        if ($this->request->is('post')) {
            $programmation = $this->Programmations->patchEntity($programmation, $this->request->data);
            if ($this->Programmations->save($programmation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Programmation'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Programmation'));
            }
        }
        $experts = $this->Programmations->Experts->find('list', ['limit' => 200]);
        $this->set(compact('programmation', 'experts'));
        $this->set('_serialize', ['programmation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Programmation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $programmation = $this->Programmations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $programmation = $this->Programmations->patchEntity($programmation, $this->request->data);
            if ($this->Programmations->save($programmation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Programmation'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Programmation'));
            }
        }
        $experts = $this->Programmations->Experts->find('list', ['limit' => 200]);
        $this->set(compact('programmation', 'experts'));
        $this->set('_serialize', ['programmation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Programmation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $programmation = $this->Programmations->get($id);
        if ($this->Programmations->delete($programmation)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Programmation'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Programmation'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
