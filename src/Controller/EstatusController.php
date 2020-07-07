<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Estatus Controller
 *
 * @property \App\Model\Table\EstatusTable $Estatus
 *
 * @method \App\Model\Entity\Estatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EstatusController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
      


        $estatus = TableRegistry::getTableLocator()->get('Estatus')->find()->select(['id','name'])
        ->where(['id !=' => 1]);
        $this->set('estatus', $estatus);
    }

    /**
     * View method
     *
     * @param string|null $id Estatus id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estatus = $this->Estatus->get($id, [
            'contain' => ['Colocacion'],
        ]);

        $this->set('estatus', $estatus);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estatus = $this->Estatus->newEntity();
        if ($this->request->is('post')) {
            $estatus = $this->Estatus->patchEntity($estatus, $this->request->getData());
            if ($this->Estatus->save($estatus)) {
                $this->Flash->success(__('El registro se guardó correctamente..'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El registro no se guardó, intente nuevamente.'));
        }
        $this->set(compact('estatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Estatus id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estatus = $this->Estatus->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estatus = $this->Estatus->patchEntity($estatus, $this->request->getData());
            if ($this->Estatus->save($estatus)) {
                $this->Flash->success(__('El registro se actualizó correctamente..'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El registro no se actualizó, intente nuevamente..'));
        }
        $this->set(compact('estatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Estatus id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estatus = $this->Estatus->get($id);
        if ($this->Estatus->delete($estatus)) {
            $this->Flash->success(__('The estatus has been deleted.'));
        } else {
            $this->Flash->error(__('El registro no se eliminó, intente nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
