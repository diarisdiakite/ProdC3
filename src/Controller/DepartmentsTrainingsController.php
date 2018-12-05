<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DepartmentsTrainings Controller
 *
 * @property \App\Model\Table\DepartmentsTrainingsTable $DepartmentsTrainings
 *
 * @method \App\Model\Entity\DepartmentsTraining[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DepartmentsTrainingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Departments', 'Trainings']
        ];
        $departmentsTrainings = $this->paginate($this->DepartmentsTrainings);

        $this->set(compact('departmentsTrainings'));
    }

    /**
     * View method
     *
     * @param string|null $id Departments Training id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $departmentsTraining = $this->DepartmentsTrainings->get($id, [
            'contain' => ['Departments', 'Trainings']
        ]);

        $this->set('departmentsTraining', $departmentsTraining);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $departmentsTraining = $this->DepartmentsTrainings->newEntity();
        if ($this->request->is('post')) {
            $departmentsTraining = $this->DepartmentsTrainings->patchEntity($departmentsTraining, $this->request->data);
            if ($this->DepartmentsTrainings->save($departmentsTraining)) {
                $this->Flash->success(__('The {0} has been saved.', 'Departments Training'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Departments Training'));
            }
        }
        $departments = $this->DepartmentsTrainings->Departments->find('list', ['limit' => 200]);
        $trainings = $this->DepartmentsTrainings->Trainings->find('list', ['limit' => 200]);
        $this->set(compact('departmentsTraining', 'departments', 'trainings'));
        $this->set('_serialize', ['departmentsTraining']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Departments Training id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $departmentsTraining = $this->DepartmentsTrainings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $departmentsTraining = $this->DepartmentsTrainings->patchEntity($departmentsTraining, $this->request->data);
            if ($this->DepartmentsTrainings->save($departmentsTraining)) {
                $this->Flash->success(__('The {0} has been saved.', 'Departments Training'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Departments Training'));
            }
        }
        $departments = $this->DepartmentsTrainings->Departments->find('list', ['limit' => 200]);
        $trainings = $this->DepartmentsTrainings->Trainings->find('list', ['limit' => 200]);
        $this->set(compact('departmentsTraining', 'departments', 'trainings'));
        $this->set('_serialize', ['departmentsTraining']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Departments Training id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $departmentsTraining = $this->DepartmentsTrainings->get($id);
        if ($this->DepartmentsTrainings->delete($departmentsTraining)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Departments Training'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Departments Training'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
