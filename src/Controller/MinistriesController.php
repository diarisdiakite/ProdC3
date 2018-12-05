<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ministries Controller
 *
 * @property \App\Model\Table\MinistriesTable $Ministries
 *
 * @method \App\Model\Entity\Ministry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MinistriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Decrets', 'Teams', 'Experts']
        ];
        $ministries = $this->paginate($this->Ministries);

        $this->set(compact('ministries'));
    }

    /**
     * View method
     *
     * @param string|null $id Ministry id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ministry = $this->Ministries->get($id, [
            'contain' => ['Users', 'Decrets', 'Teams', 'Experts', 'Trainings', 'Meetings', 'Departments', 'FocalPoints', 'Inserts', 'Planifications', 'Structures']
        ]);

        $this->set('ministry', $ministry);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ministry = $this->Ministries->newEntity();
        if ($this->request->is('post')) {
            $ministry = $this->Ministries->patchEntity($ministry, $this->request->data);
            if ($this->Ministries->save($ministry)) {
                $this->Flash->success(__('The {0} has been saved.', 'Ministry'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Ministry'));
            }
        }
        $users = $this->Ministries->Users->find('list', ['limit' => 200]);
        $decrets = $this->Ministries->Decrets->find('list', ['limit' => 200]);
        $teams = $this->Ministries->Teams->find('list', ['limit' => 200]);
        $experts = $this->Ministries->Experts->find('list', ['limit' => 200]);
        $trainings = $this->Ministries->Trainings->find('list', ['limit' => 200]);
        $meetings = $this->Ministries->Meetings->find('list', ['limit' => 200]);
        $this->set(compact('ministry', 'users', 'decrets', 'teams', 'experts', 'trainings', 'meetings'));
        $this->set('_serialize', ['ministry']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ministry id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ministry = $this->Ministries->get($id, [
            'contain' => ['Trainings', 'Meetings']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ministry = $this->Ministries->patchEntity($ministry, $this->request->data);
            if ($this->Ministries->save($ministry)) {
                $this->Flash->success(__('The {0} has been saved.', 'Ministry'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Ministry'));
            }
        }
        $users = $this->Ministries->Users->find('list', ['limit' => 200]);
        $decrets = $this->Ministries->Decrets->find('list', ['limit' => 200]);
        $teams = $this->Ministries->Teams->find('list', ['limit' => 200]);
        $experts = $this->Ministries->Experts->find('list', ['limit' => 200]);
        $trainings = $this->Ministries->Trainings->find('list', ['limit' => 200]);
        $meetings = $this->Ministries->Meetings->find('list', ['limit' => 200]);
        $this->set(compact('ministry', 'users', 'decrets', 'teams', 'experts', 'trainings', 'meetings'));
        $this->set('_serialize', ['ministry']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ministry id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ministry = $this->Ministries->get($id);
        if ($this->Ministries->delete($ministry)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Ministry'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Ministry'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function trainings()
    {
        // La clé 'pass' est fournie par CakePHP et contient tous les segments
        // d'URL de la "request" (instance de \Cake\Network\Request)
        $trainings = $this->request->getParam('pass');
        // On utilise l'objet "Ministries" (une instance de
        // \App\Model\Table\MinistriesTable) pour récupérer les ministries avec
        // ces trainings
        $ministries = $this->Ministries->find('choice', [
        'trainings' => $trainings
        ]);
        // Passe les variables au template de vue (view).
        $this->set([
        'ministries' => $ministries,
        'trainings' => $trainings
        ]);
    }

}
