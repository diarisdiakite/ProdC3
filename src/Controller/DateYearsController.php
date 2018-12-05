<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DateYears Controller
 *
 * @property \App\Model\Table\DateYearsTable $DateYears
 *
 * @method \App\Model\Entity\DateYear[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DateYearsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $dateYears = $this->paginate($this->DateYears);

        $this->set(compact('dateYears'));
    }

    /**
     * View method
     *
     * @param string|null $id Date Year id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dateYear = $this->DateYears->get($id, [
            'contain' => ['Inserts', 'Trainings']
        ]);

        $this->set('dateYear', $dateYear);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dateYear = $this->DateYears->newEntity();
        if ($this->request->is('post')) {
            $dateYear = $this->DateYears->patchEntity($dateYear, $this->request->data);
            if ($this->DateYears->save($dateYear)) {
                $this->Flash->success(__('The {0} has been saved.', 'Date Year'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Date Year'));
            }
        }
        $this->set(compact('dateYear'));
        $this->set('_serialize', ['dateYear']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Date Year id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dateYear = $this->DateYears->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dateYear = $this->DateYears->patchEntity($dateYear, $this->request->data);
            if ($this->DateYears->save($dateYear)) {
                $this->Flash->success(__('The {0} has been saved.', 'Date Year'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Date Year'));
            }
        }
        $this->set(compact('dateYear'));
        $this->set('_serialize', ['dateYear']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Date Year id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dateYear = $this->DateYears->get($id);
        if ($this->DateYears->delete($dateYear)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Date Year'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Date Year'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
