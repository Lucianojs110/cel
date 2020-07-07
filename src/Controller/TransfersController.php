<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Transfers Controller
 *
 * @property \App\Model\Table\TransfersTable $Transfers
 *
 * @method \App\Model\Entity\Transfer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransfersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $transfers = TableRegistry::getTableLocator()->get('Transfers')->find()->select(['id','name', 'name_ab'])
        ->where(['id !=' => 1]);
        $this->set('transfers', $transfers);
    }

    /**
     * View method
     *
     * @param string|null $id Transfer id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transfer = $this->Transfers->get($id, [
            'contain' => ['Colocacion'],
        ]);

        $this->set('transfer', $transfer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transfer = $this->Transfers->newEntity();
        if ($this->request->is('post')) {
            $transfer = $this->Transfers->patchEntity($transfer, $this->request->getData());
            if ($this->Transfers->save($transfer)) {
                $this->Flash->success(__('El registro se guardó correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El registro no se guardó, intente nuevamente.'));
        }
        $this->set(compact('transfer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transfer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transfer = $this->Transfers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transfer = $this->Transfers->patchEntity($transfer, $this->request->getData());
            if ($this->Transfers->save($transfer)) {
                $this->Flash->success(__('El registro se actualizó correctamente..'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El registro no se guardó, intente nuevamente.'));
        }
        $this->set(compact('transfer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transfer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transfer = $this->Transfers->get($id);
        if ($this->Transfers->delete($transfer)) {
            $this->Flash->success(__('El registro se eliminó correctamente.'));
        } else {
            $this->Flash->error(__('El registro no se elimino, intente nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
