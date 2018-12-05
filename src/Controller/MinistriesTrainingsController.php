<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MinistriesTrainings Controller
 *
 * @property \App\Model\Table\MinistriesTrainingsTable $MinistriesTrainings
 *
 * @method \App\Model\Entity\MinistriesTraining[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MinistriesTrainingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ministries', 'Trainings']
        ];
        $ministriesTrainings = $this->paginate($this->MinistriesTrainings);

        $this->set(compact('ministriesTrainings'));
    }

    /**
     * View method
     *
     * @param string|null $id Ministries Training id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ministriesTraining = $this->MinistriesTrainings->get($id, [
            'contain' => ['Ministries', 'Trainings']
        ]);

        $this->set('ministriesTraining', $ministriesTraining);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ministriesTraining = $this->MinistriesTrainings->newEntity();
        if ($this->request->is('post')) {
            $ministriesTraining = $this->MinistriesTrainings->patchEntity($ministriesTraining, $this->request->data);
            if ($this->MinistriesTrainings->save($ministriesTraining)) {
                $this->Flash->success(__('The {0} has been saved.', 'Ministries Training'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Ministries Training'));
            }
        }
        $ministries = $this->MinistriesTrainings->Ministries->find('list', ['limit' => 200]);
        $trainings = $this->MinistriesTrainings->Trainings->find('list', ['limit' => 200]);
        $this->set(compact('ministriesTraining', 'ministries', 'trainings'));
        $this->set('_serialize', ['ministriesTraining']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ministries Training id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ministriesTraining = $this->MinistriesTrainings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ministriesTraining = $this->MinistriesTrainings->patchEntity($ministriesTraining, $this->request->data);
            if ($this->MinistriesTrainings->save($ministriesTraining)) {
                $this->Flash->success(__('The {0} has been saved.', 'Ministries Training'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Ministries Training'));
            }
        }
        $ministries = $this->MinistriesTrainings->Ministries->find('list', ['limit' => 200]);
        $trainings = $this->MinistriesTrainings->Trainings->find('list', ['limit' => 200]);
        $this->set(compact('ministriesTraining', 'ministries', 'trainings'));
        $this->set('_serialize', ['ministriesTraining']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ministries Training id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ministriesTraining = $this->MinistriesTrainings->get($id);
        if ($this->MinistriesTrainings->delete($ministriesTraining)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Ministries Training'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Ministries Training'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
