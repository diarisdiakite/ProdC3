<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Decrets Controller
 *
 * @property \App\Model\Table\DecretsTable $Decrets
 *
 * @method \App\Model\Entity\Decret[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DecretsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $decrets = $this->paginate($this->Decrets);

        $this->set(compact('decrets'));
    }

    /**
     * View method
     *
     * @param string|null $id Decret id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $decret = $this->Decrets->get($id, [
            'contain' => ['Ministries']
        ]);

        $this->set('decret', $decret);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $decret = $this->Decrets->newEntity();
        if ($this->request->is('post')) {
            $decret = $this->Decrets->patchEntity($decret, $this->request->data);
            if ($this->Decrets->save($decret)) {
                $this->Flash->success(__('The {0} has been saved.', 'Decret'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Decret'));
            }
        }
        $this->set(compact('decret'));
        $this->set('_serialize', ['decret']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Decret id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $decret = $this->Decrets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $decret = $this->Decrets->patchEntity($decret, $this->request->data);
            if ($this->Decrets->save($decret)) {
                $this->Flash->success(__('The {0} has been saved.', 'Decret'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Decret'));
            }
        }
        $this->set(compact('decret'));
        $this->set('_serialize', ['decret']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Decret id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $decret = $this->Decrets->get($id);
        if ($this->Decrets->delete($decret)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Decret'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Decret'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
