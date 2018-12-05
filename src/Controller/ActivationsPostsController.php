<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ActivationsPosts Controller
 *
 * @property \App\Model\Table\ActivationsPostsTable $ActivationsPosts
 *
 * @method \App\Model\Entity\ActivationsPost[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActivationsPostsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Activations', 'Posts']
        ];
        $activationsPosts = $this->paginate($this->ActivationsPosts);

        $this->set(compact('activationsPosts'));
    }

    /**
     * View method
     *
     * @param string|null $id Activations Post id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $activationsPost = $this->ActivationsPosts->get($id, [
            'contain' => ['Activations', 'Posts']
        ]);

        $this->set('activationsPost', $activationsPost);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $activationsPost = $this->ActivationsPosts->newEntity();
        if ($this->request->is('post')) {
            $activationsPost = $this->ActivationsPosts->patchEntity($activationsPost, $this->request->data);
            if ($this->ActivationsPosts->save($activationsPost)) {
                $this->Flash->success(__('The {0} has been saved.', 'Activations Post'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Activations Post'));
            }
        }
        $activations = $this->ActivationsPosts->Activations->find('list', ['limit' => 200]);
        $posts = $this->ActivationsPosts->Posts->find('list', ['limit' => 200]);
        $this->set(compact('activationsPost', 'activations', 'posts'));
        $this->set('_serialize', ['activationsPost']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Activations Post id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $activationsPost = $this->ActivationsPosts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $activationsPost = $this->ActivationsPosts->patchEntity($activationsPost, $this->request->data);
            if ($this->ActivationsPosts->save($activationsPost)) {
                $this->Flash->success(__('The {0} has been saved.', 'Activations Post'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Activations Post'));
            }
        }
        $activations = $this->ActivationsPosts->Activations->find('list', ['limit' => 200]);
        $posts = $this->ActivationsPosts->Posts->find('list', ['limit' => 200]);
        $this->set(compact('activationsPost', 'activations', 'posts'));
        $this->set('_serialize', ['activationsPost']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Activations Post id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $activationsPost = $this->ActivationsPosts->get($id);
        if ($this->ActivationsPosts->delete($activationsPost)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Activations Post'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Activations Post'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
