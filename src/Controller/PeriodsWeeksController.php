<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PeriodsWeeks Controller
 *
 * @property \App\Model\Table\PeriodsWeeksTable $PeriodsWeeks
 *
 * @method \App\Model\Entity\PeriodsWeek[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PeriodsWeeksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Periods', 'Weeks']
        ];
        $periodsWeeks = $this->paginate($this->PeriodsWeeks);

        $this->set(compact('periodsWeeks'));
    }

    /**
     * View method
     *
     * @param string|null $id Periods Week id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $periodsWeek = $this->PeriodsWeeks->get($id, [
            'contain' => ['Periods', 'Weeks']
        ]);

        $this->set('periodsWeek', $periodsWeek);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $periodsWeek = $this->PeriodsWeeks->newEntity();
        if ($this->request->is('post')) {
            $periodsWeek = $this->PeriodsWeeks->patchEntity($periodsWeek, $this->request->data);
            if ($this->PeriodsWeeks->save($periodsWeek)) {
                $this->Flash->success(__('The {0} has been saved.', 'Periods Week'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Periods Week'));
            }
        }
        $periods = $this->PeriodsWeeks->Periods->find('list', ['limit' => 200]);
        $weeks = $this->PeriodsWeeks->Weeks->find('list', ['limit' => 200]);
        $this->set(compact('periodsWeek', 'periods', 'weeks'));
        $this->set('_serialize', ['periodsWeek']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Periods Week id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $periodsWeek = $this->PeriodsWeeks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $periodsWeek = $this->PeriodsWeeks->patchEntity($periodsWeek, $this->request->data);
            if ($this->PeriodsWeeks->save($periodsWeek)) {
                $this->Flash->success(__('The {0} has been saved.', 'Periods Week'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Periods Week'));
            }
        }
        $periods = $this->PeriodsWeeks->Periods->find('list', ['limit' => 200]);
        $weeks = $this->PeriodsWeeks->Weeks->find('list', ['limit' => 200]);
        $this->set(compact('periodsWeek', 'periods', 'weeks'));
        $this->set('_serialize', ['periodsWeek']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Periods Week id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $periodsWeek = $this->PeriodsWeeks->get($id);
        if ($this->PeriodsWeeks->delete($periodsWeek)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Periods Week'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Periods Week'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
