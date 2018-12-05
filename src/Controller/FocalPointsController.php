<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FocalPoints Controller
 *
 * @property \App\Model\Table\FocalPointsTable $FocalPoints
 *
 * @method \App\Model\Entity\FocalPoint[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FocalPointsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Experts', 'Ministries']
        ];
        $focalPoints = $this->paginate($this->FocalPoints);

        $this->set(compact('focalPoints'));
    }

    /**
     * View method
     *
     * @param string|null $id Focal Point id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $focalPoint = $this->FocalPoints->get($id, [
            'contain' => ['Users', 'Experts', 'Ministries', 'FinancesResponsibles', 'Structures']
        ]);

        $this->set('focalPoint', $focalPoint);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $focalPoint = $this->FocalPoints->newEntity();
        if ($this->request->is('post')) {
            $focalPoint = $this->FocalPoints->patchEntity($focalPoint, $this->request->data);
            if ($this->FocalPoints->save($focalPoint)) {
                $this->Flash->success(__('The {0} has been saved.', 'Focal Point'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Focal Point'));
            }
        }
        $users = $this->FocalPoints->Users->find('list', ['limit' => 200]);
        $experts = $this->FocalPoints->Experts->find('list', ['limit' => 200]);
        $ministries = $this->FocalPoints->Ministries->find('list', ['limit' => 200]);
        $this->set(compact('focalPoint', 'users', 'experts', 'ministries'));
        $this->set('_serialize', ['focalPoint']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Focal Point id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $focalPoint = $this->FocalPoints->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $focalPoint = $this->FocalPoints->patchEntity($focalPoint, $this->request->data);
            if ($this->FocalPoints->save($focalPoint)) {
                $this->Flash->success(__('The {0} has been saved.', 'Focal Point'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Focal Point'));
            }
        }
        $users = $this->FocalPoints->Users->find('list', ['limit' => 200]);
        $experts = $this->FocalPoints->Experts->find('list', ['limit' => 200]);
        $ministries = $this->FocalPoints->Ministries->find('list', ['limit' => 200]);
        $this->set(compact('focalPoint', 'users', 'experts', 'ministries'));
        $this->set('_serialize', ['focalPoint']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Focal Point id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $focalPoint = $this->FocalPoints->get($id);
        if ($this->FocalPoints->delete($focalPoint)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Focal Point'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Focal Point'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
