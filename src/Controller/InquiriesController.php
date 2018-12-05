<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inquiries Controller
 *
 * @property \App\Model\Table\InquiriesTable $Inquiries
 *
 * @method \App\Model\Entity\Inquiry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InquiriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Databases', 'Administrators']
        ];
        $inquiries = $this->paginate($this->Inquiries);

        $this->set(compact('inquiries'));
    }

    /**
     * View method
     *
     * @param string|null $id Inquiry id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inquiry = $this->Inquiries->get($id, [
            'contain' => ['Databases', 'Administrators']
        ]);

        $this->set('inquiry', $inquiry);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inquiry = $this->Inquiries->newEntity();
        if ($this->request->is('post')) {
            $inquiry = $this->Inquiries->patchEntity($inquiry, $this->request->data);
            if ($this->Inquiries->save($inquiry)) {
                $this->Flash->success(__('The {0} has been saved.', 'Inquiry'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Inquiry'));
            }
        }
        $databases = $this->Inquiries->Databases->find('list', ['limit' => 200]);
        $administrators = $this->Inquiries->Administrators->find('list', ['limit' => 200]);
        $this->set(compact('inquiry', 'databases', 'administrators'));
        $this->set('_serialize', ['inquiry']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inquiry id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inquiry = $this->Inquiries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inquiry = $this->Inquiries->patchEntity($inquiry, $this->request->data);
            if ($this->Inquiries->save($inquiry)) {
                $this->Flash->success(__('The {0} has been saved.', 'Inquiry'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Inquiry'));
            }
        }
        $databases = $this->Inquiries->Databases->find('list', ['limit' => 200]);
        $administrators = $this->Inquiries->Administrators->find('list', ['limit' => 200]);
        $this->set(compact('inquiry', 'databases', 'administrators'));
        $this->set('_serialize', ['inquiry']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inquiry id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inquiry = $this->Inquiries->get($id);
        if ($this->Inquiries->delete($inquiry)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Inquiry'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Inquiry'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
