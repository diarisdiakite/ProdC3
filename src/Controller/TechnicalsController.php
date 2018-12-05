<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Technicals Controller
 *
 * @property \App\Model\Table\TechnicalsTable $Technicals
 *
 * @method \App\Model\Entity\Technical[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TechnicalsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Structures', 'ProjectActions']
        ];
        $technicals = $this->paginate($this->Technicals);

        $this->set(compact('technicals'));
    }

    /**
     * View method
     *
     * @param string|null $id Technical id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $technical = $this->Technicals->get($id, [
            'contain' => ['Users', 'Structures', 'ProjectActions', 'Financials']
        ]);

        $this->set('technical', $technical);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $technical = $this->Technicals->newEntity();
        if ($this->request->is('post')) {
            $technical = $this->Technicals->patchEntity($technical, $this->request->data);
            if ($this->Technicals->save($technical)) {
                $this->Flash->success(__('The {0} has been saved.', 'Technical'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Technical'));
            }
        }
        $users = $this->Technicals->Users->find('list', ['limit' => 200]);
        $structures = $this->Technicals->Structures->find('list', ['limit' => 200]);
        $projectActions = $this->Technicals->ProjectActions->find('list', ['limit' => 200]);
        $this->set(compact('technical', 'users', 'structures', 'projectActions'));
        $this->set('_serialize', ['technical']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Technical id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $technical = $this->Technicals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $technical = $this->Technicals->patchEntity($technical, $this->request->data);
            if ($this->Technicals->save($technical)) {
                $this->Flash->success(__('The {0} has been saved.', 'Technical'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Technical'));
            }
        }
        $users = $this->Technicals->Users->find('list', ['limit' => 200]);
        $structures = $this->Technicals->Structures->find('list', ['limit' => 200]);
        $projectActions = $this->Technicals->ProjectActions->find('list', ['limit' => 200]);
        $this->set(compact('technical', 'users', 'structures', 'projectActions'));
        $this->set('_serialize', ['technical']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Technical id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $technical = $this->Technicals->get($id);
        if ($this->Technicals->delete($technical)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Technical'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Technical'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
