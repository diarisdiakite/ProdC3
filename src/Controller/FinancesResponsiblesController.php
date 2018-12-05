<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FinancesResponsibles Controller
 *
 * @property \App\Model\Table\FinancesResponsiblesTable $FinancesResponsibles
 *
 * @method \App\Model\Entity\FinancesResponsible[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FinancesResponsiblesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['FocalPoints', 'Users']
        ];
        $financesResponsibles = $this->paginate($this->FinancesResponsibles);

        $this->set(compact('financesResponsibles'));
    }

    /**
     * View method
     *
     * @param string|null $id Finances Responsible id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $financesResponsible = $this->FinancesResponsibles->get($id, [
            'contain' => ['FocalPoints', 'Users', 'Financials']
        ]);

        $this->set('financesResponsible', $financesResponsible);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $financesResponsible = $this->FinancesResponsibles->newEntity();
        if ($this->request->is('post')) {
            $financesResponsible = $this->FinancesResponsibles->patchEntity($financesResponsible, $this->request->data);
            if ($this->FinancesResponsibles->save($financesResponsible)) {
                $this->Flash->success(__('The {0} has been saved.', 'Finances Responsible'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Finances Responsible'));
            }
        }
        $focalPoints = $this->FinancesResponsibles->FocalPoints->find('list', ['limit' => 200]);
        $users = $this->FinancesResponsibles->Users->find('list', ['limit' => 200]);
        $this->set(compact('financesResponsible', 'focalPoints', 'users'));
        $this->set('_serialize', ['financesResponsible']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Finances Responsible id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $financesResponsible = $this->FinancesResponsibles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $financesResponsible = $this->FinancesResponsibles->patchEntity($financesResponsible, $this->request->data);
            if ($this->FinancesResponsibles->save($financesResponsible)) {
                $this->Flash->success(__('The {0} has been saved.', 'Finances Responsible'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Finances Responsible'));
            }
        }
        $focalPoints = $this->FinancesResponsibles->FocalPoints->find('list', ['limit' => 200]);
        $users = $this->FinancesResponsibles->Users->find('list', ['limit' => 200]);
        $this->set(compact('financesResponsible', 'focalPoints', 'users'));
        $this->set('_serialize', ['financesResponsible']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Finances Responsible id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $financesResponsible = $this->FinancesResponsibles->get($id);
        if ($this->FinancesResponsibles->delete($financesResponsible)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Finances Responsible'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Finances Responsible'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
