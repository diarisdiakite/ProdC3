<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StructuresTrainings Controller
 *
 * @property \App\Model\Table\StructuresTrainingsTable $StructuresTrainings
 *
 * @method \App\Model\Entity\StructuresTraining[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StructuresTrainingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Structures', 'Trainings']
        ];
        $structuresTrainings = $this->paginate($this->StructuresTrainings);

        $this->set(compact('structuresTrainings'));
    }

    /**
     * View method
     *
     * @param string|null $id Structures Training id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $structuresTraining = $this->StructuresTrainings->get($id, [
            'contain' => ['Structures', 'Trainings']
        ]);

        $this->set('structuresTraining', $structuresTraining);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $structuresTraining = $this->StructuresTrainings->newEntity();
        if ($this->request->is('post')) {
            $structuresTraining = $this->StructuresTrainings->patchEntity($structuresTraining, $this->request->data);
            if ($this->StructuresTrainings->save($structuresTraining)) {
                $this->Flash->success(__('The {0} has been saved.', 'Structures Training'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Structures Training'));
            }
        }
        $structures = $this->StructuresTrainings->Structures->find('list', ['limit' => 200]);
        $trainings = $this->StructuresTrainings->Trainings->find('list', ['limit' => 200]);
        $this->set(compact('structuresTraining', 'structures', 'trainings'));
        $this->set('_serialize', ['structuresTraining']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Structures Training id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $structuresTraining = $this->StructuresTrainings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $structuresTraining = $this->StructuresTrainings->patchEntity($structuresTraining, $this->request->data);
            if ($this->StructuresTrainings->save($structuresTraining)) {
                $this->Flash->success(__('The {0} has been saved.', 'Structures Training'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Structures Training'));
            }
        }
        $structures = $this->StructuresTrainings->Structures->find('list', ['limit' => 200]);
        $trainings = $this->StructuresTrainings->Trainings->find('list', ['limit' => 200]);
        $this->set(compact('structuresTraining', 'structures', 'trainings'));
        $this->set('_serialize', ['structuresTraining']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Structures Training id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $structuresTraining = $this->StructuresTrainings->get($id);
        if ($this->StructuresTrainings->delete($structuresTraining)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Structures Training'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Structures Training'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
