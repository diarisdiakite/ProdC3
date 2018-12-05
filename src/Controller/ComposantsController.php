<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Composants Controller
 *
 * @property \App\Model\Table\ComposantsTable $Composants
 *
 * @method \App\Model\Entity\Composant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ComposantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $composants = $this->paginate($this->Composants);

        $this->set(compact('composants'));
    }

    /**
     * View method
     *
     * @param string|null $id Composant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $composant = $this->Composants->get($id, [
            'contain' => ['ExpectedResults', 'Inserts']
        ]);

        $this->set('composant', $composant);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $composant = $this->Composants->newEntity();
        if ($this->request->is('post')) {
            $composant = $this->Composants->patchEntity($composant, $this->request->data);
            if ($this->Composants->save($composant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Composant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Composant'));
            }
        }
        $this->set(compact('composant'));
        $this->set('_serialize', ['composant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Composant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $composant = $this->Composants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $composant = $this->Composants->patchEntity($composant, $this->request->data);
            if ($this->Composants->save($composant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Composant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Composant'));
            }
        }
        $this->set(compact('composant'));
        $this->set('_serialize', ['composant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Composant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $composant = $this->Composants->get($id);
        if ($this->Composants->delete($composant)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Composant'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Composant'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
