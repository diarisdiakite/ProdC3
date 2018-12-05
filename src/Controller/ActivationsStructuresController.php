<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ActivationsStructures Controller
 *
 * @property \App\Model\Table\ActivationsStructuresTable $ActivationsStructures
 *
 * @method \App\Model\Entity\ActivationsStructure[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActivationsStructuresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Activations', 'Structures']
        ];
        $activationsStructures = $this->paginate($this->ActivationsStructures);

        $this->set(compact('activationsStructures'));
    }

    /**
     * View method
     *
     * @param string|null $id Activations Structure id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $activationsStructure = $this->ActivationsStructures->get($id, [
            'contain' => ['Activations', 'Structures']
        ]);

        $this->set('activationsStructure', $activationsStructure);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $activationsStructure = $this->ActivationsStructures->newEntity();
        if ($this->request->is('post')) {
            $activationsStructure = $this->ActivationsStructures->patchEntity($activationsStructure, $this->request->data);
            if ($this->ActivationsStructures->save($activationsStructure)) {
                $this->Flash->success(__('The {0} has been saved.', 'Activations Structure'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Activations Structure'));
            }
        }
        $activations = $this->ActivationsStructures->Activations->find('list', ['limit' => 200]);
        $structures = $this->ActivationsStructures->Structures->find('list', ['limit' => 200]);
        $this->set(compact('activationsStructure', 'activations', 'structures'));
        $this->set('_serialize', ['activationsStructure']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Activations Structure id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $activationsStructure = $this->ActivationsStructures->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $activationsStructure = $this->ActivationsStructures->patchEntity($activationsStructure, $this->request->data);
            if ($this->ActivationsStructures->save($activationsStructure)) {
                $this->Flash->success(__('The {0} has been saved.', 'Activations Structure'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Activations Structure'));
            }
        }
        $activations = $this->ActivationsStructures->Activations->find('list', ['limit' => 200]);
        $structures = $this->ActivationsStructures->Structures->find('list', ['limit' => 200]);
        $this->set(compact('activationsStructure', 'activations', 'structures'));
        $this->set('_serialize', ['activationsStructure']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Activations Structure id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $activationsStructure = $this->ActivationsStructures->get($id);
        if ($this->ActivationsStructures->delete($activationsStructure)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Activations Structure'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Activations Structure'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
