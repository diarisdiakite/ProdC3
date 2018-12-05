<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AssignementsExperts Controller
 *
 * @property \App\Model\Table\AssignementsExpertsTable $AssignementsExperts
 *
 * @method \App\Model\Entity\AssignementsExpert[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AssignementsExpertsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Assignements', 'Experts']
        ];
        $assignementsExperts = $this->paginate($this->AssignementsExperts);

        $this->set(compact('assignementsExperts'));
    }

    /**
     * View method
     *
     * @param string|null $id Assignements Expert id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $assignementsExpert = $this->AssignementsExperts->get($id, [
            'contain' => ['Assignements', 'Experts']
        ]);

        $this->set('assignementsExpert', $assignementsExpert);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $assignementsExpert = $this->AssignementsExperts->newEntity();
        if ($this->request->is('post')) {
            $assignementsExpert = $this->AssignementsExperts->patchEntity($assignementsExpert, $this->request->data);
            if ($this->AssignementsExperts->save($assignementsExpert)) {
                $this->Flash->success(__('The {0} has been saved.', 'Assignements Expert'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Assignements Expert'));
            }
        }
        $assignements = $this->AssignementsExperts->Assignements->find('list', ['limit' => 200]);
        $experts = $this->AssignementsExperts->Experts->find('list', ['limit' => 200]);
        $this->set(compact('assignementsExpert', 'assignements', 'experts'));
        $this->set('_serialize', ['assignementsExpert']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Assignements Expert id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $assignementsExpert = $this->AssignementsExperts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assignementsExpert = $this->AssignementsExperts->patchEntity($assignementsExpert, $this->request->data);
            if ($this->AssignementsExperts->save($assignementsExpert)) {
                $this->Flash->success(__('The {0} has been saved.', 'Assignements Expert'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Assignements Expert'));
            }
        }
        $assignements = $this->AssignementsExperts->Assignements->find('list', ['limit' => 200]);
        $experts = $this->AssignementsExperts->Experts->find('list', ['limit' => 200]);
        $this->set(compact('assignementsExpert', 'assignements', 'experts'));
        $this->set('_serialize', ['assignementsExpert']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Assignements Expert id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $assignementsExpert = $this->AssignementsExperts->get($id);
        if ($this->AssignementsExperts->delete($assignementsExpert)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Assignements Expert'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Assignements Expert'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
