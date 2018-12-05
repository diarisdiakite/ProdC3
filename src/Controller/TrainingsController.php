<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Trainings Controller
 *
 * @property \App\Model\Table\TrainingsTable $Trainings
 *
 * @method \App\Model\Entity\Training[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TrainingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ProjectActions', 'Sectors', 'Leashes', 'JobEmployments', 'Types', 'DateYears']
        ];
        $trainings = $this->paginate($this->Trainings);

        $this->set(compact('trainings'));
    }

    /**
     * View method
     *
     * @param string|null $id Training id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $training = $this->Trainings->get($id, [
            'contain' => ['ProjectActions', 'Sectors', 'Leashes', 'JobEmployments', 'Types', 'DateYears', 'Ministries', 'Departments', 'Structures']
        ]);

        $this->set('training', $training);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $training = $this->Trainings->newEntity();
        if ($this->request->is('post')) {
            $training = $this->Trainings->patchEntity($training, $this->request->data);
            if ($this->Trainings->save($training)) {
                $this->Flash->success(__('The {0} has been saved.', 'Training'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Training'));
            }
        }
        $projectActions = $this->Trainings->ProjectActions->find('list', ['limit' => 200]);
        $sectors = $this->Trainings->Sectors->find('list', ['limit' => 200]);
        $leashes = $this->Trainings->Leashes->find('list', ['limit' => 200]);
        $jobEmployments = $this->Trainings->JobEmployments->find('list', ['limit' => 200]);
        $types = $this->Trainings->Types->find('list', ['limit' => 200]);
        $dateYears = $this->Trainings->DateYears->find('list', ['limit' => 200]);
        $ministries = $this->Trainings->Ministries->find('list', ['limit' => 200]);
        $departments = $this->Trainings->Departments->find('list', ['limit' => 200]);
        $structures = $this->Trainings->Structures->find('list', ['limit' => 200]);
        $this->set(compact('training', 'projectActions', 'sectors', 'leashes', 'jobEmployments', 'types', 'dateYears', 'ministries', 'departments', 'structures'));
        $this->set('_serialize', ['training']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Training id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $training = $this->Trainings->get($id, [
            'contain' => ['Ministries', 'Departments', 'Structures']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $training = $this->Trainings->patchEntity($training, $this->request->data);
            if ($this->Trainings->save($training)) {
                $this->Flash->success(__('The {0} has been saved.', 'Training'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Training'));
            }
        }
        $projectActions = $this->Trainings->ProjectActions->find('list', ['limit' => 200]);
        $sectors = $this->Trainings->Sectors->find('list', ['limit' => 200]);
        $leashes = $this->Trainings->Leashes->find('list', ['limit' => 200]);
        $jobEmployments = $this->Trainings->JobEmployments->find('list', ['limit' => 200]);
        $types = $this->Trainings->Types->find('list', ['limit' => 200]);
        $dateYears = $this->Trainings->DateYears->find('list', ['limit' => 200]);
        $ministries = $this->Trainings->Ministries->find('list', ['limit' => 200]);
        $departments = $this->Trainings->Departments->find('list', ['limit' => 200]);
        $structures = $this->Trainings->Structures->find('list', ['limit' => 200]);
        $this->set(compact('training', 'projectActions', 'sectors', 'leashes', 'jobEmployments', 'types', 'dateYears', 'ministries', 'departments', 'structures'));
        $this->set('_serialize', ['training']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Training id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $training = $this->Trainings->get($id);
        if ($this->Trainings->delete($training)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Training'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Training'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
