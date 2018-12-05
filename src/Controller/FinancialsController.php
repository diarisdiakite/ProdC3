<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Financials Controller
 *
 * @property \App\Model\Table\FinancialsTable $Financials
 *
 * @method \App\Model\Entity\Financial[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FinancialsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Technicals', 'FinancesResponsibles']
        ];
        $financials = $this->paginate($this->Financials);

        $this->set(compact('financials'));
    }

    /**
     * View method
     *
     * @param string|null $id Financial id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $financial = $this->Financials->get($id, [
            'contain' => ['Technicals', 'FinancesResponsibles']
        ]);

        $this->set('financial', $financial);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $financial = $this->Financials->newEntity();
        if ($this->request->is('post')) {
            $financial = $this->Financials->patchEntity($financial, $this->request->data);
            if ($this->Financials->save($financial)) {
                $this->Flash->success(__('The {0} has been saved.', 'Financial'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Financial'));
            }
        }
        $technicals = $this->Financials->Technicals->find('list', ['limit' => 200]);
        $financesResponsibles = $this->Financials->FinancesResponsibles->find('list', ['limit' => 200]);
        $this->set(compact('financial', 'technicals', 'financesResponsibles'));
        $this->set('_serialize', ['financial']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Financial id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $financial = $this->Financials->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $financial = $this->Financials->patchEntity($financial, $this->request->data);
            if ($this->Financials->save($financial)) {
                $this->Flash->success(__('The {0} has been saved.', 'Financial'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Financial'));
            }
        }
        $technicals = $this->Financials->Technicals->find('list', ['limit' => 200]);
        $financesResponsibles = $this->Financials->FinancesResponsibles->find('list', ['limit' => 200]);
        $this->set(compact('financial', 'technicals', 'financesResponsibles'));
        $this->set('_serialize', ['financial']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Financial id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $financial = $this->Financials->get($id);
        if ($this->Financials->delete($financial)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Financial'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Financial'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
