<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * JobEmployments Controller
 *
 * @property \App\Model\Table\JobEmploymentsTable $JobEmployments
 *
 * @method \App\Model\Entity\JobEmployment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JobEmploymentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Leashes']
        ];
        $jobEmployments = $this->paginate($this->JobEmployments);

        $this->set(compact('jobEmployments'));
    }

    /**
     * View method
     *
     * @param string|null $id Job Employment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jobEmployment = $this->JobEmployments->get($id, [
            'contain' => ['Leashes', 'Trainings']
        ]);

        $this->set('jobEmployment', $jobEmployment);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jobEmployment = $this->JobEmployments->newEntity();
        if ($this->request->is('post')) {
            $jobEmployment = $this->JobEmployments->patchEntity($jobEmployment, $this->request->data);
            if ($this->JobEmployments->save($jobEmployment)) {
                $this->Flash->success(__('The {0} has been saved.', 'Job Employment'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Job Employment'));
            }
        }
        $leashes = $this->JobEmployments->Leashes->find('list', ['limit' => 200]);
        $this->set(compact('jobEmployment', 'leashes'));
        $this->set('_serialize', ['jobEmployment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Job Employment id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jobEmployment = $this->JobEmployments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobEmployment = $this->JobEmployments->patchEntity($jobEmployment, $this->request->data);
            if ($this->JobEmployments->save($jobEmployment)) {
                $this->Flash->success(__('The {0} has been saved.', 'Job Employment'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Job Employment'));
            }
        }
        $leashes = $this->JobEmployments->Leashes->find('list', ['limit' => 200]);
        $this->set(compact('jobEmployment', 'leashes'));
        $this->set('_serialize', ['jobEmployment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Job Employment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jobEmployment = $this->JobEmployments->get($id);
        if ($this->JobEmployments->delete($jobEmployment)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Job Employment'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Job Employment'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
