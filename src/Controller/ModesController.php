<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Modes Controller
 *
 * @property \App\Model\Table\ModesTable $Modes
 *
 * @method \App\Model\Entity\Mode[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ModesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Types']
        ];
        $modes = $this->paginate($this->Modes);

        $this->set(compact('modes'));
    }

    /**
     * View method
     *
     * @param string|null $id Mode id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mode = $this->Modes->get($id, [
            'contain' => ['Types']
        ]);

        $this->set('mode', $mode);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mode = $this->Modes->newEntity();
        if ($this->request->is('post')) {
            $mode = $this->Modes->patchEntity($mode, $this->request->data);
            if ($this->Modes->save($mode)) {
                $this->Flash->success(__('The {0} has been saved.', 'Mode'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Mode'));
            }
        }
        $types = $this->Modes->Types->find('list', ['limit' => 200]);
        $this->set(compact('mode', 'types'));
        $this->set('_serialize', ['mode']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mode id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mode = $this->Modes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mode = $this->Modes->patchEntity($mode, $this->request->data);
            if ($this->Modes->save($mode)) {
                $this->Flash->success(__('The {0} has been saved.', 'Mode'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Mode'));
            }
        }
        $types = $this->Modes->Types->find('list', ['limit' => 200]);
        $this->set(compact('mode', 'types'));
        $this->set('_serialize', ['mode']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mode id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mode = $this->Modes->get($id);
        if ($this->Modes->delete($mode)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Mode'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Mode'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
