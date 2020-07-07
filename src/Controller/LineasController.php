<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Lineas Controller
 *
 * @property \App\Model\Table\LineasTable $Lineas
 *
 * @method \App\Model\Entity\Linea[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LineasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
      

        $lineas = TableRegistry::getTableLocator()->get('lineas')->find()->select(['id','name', 'linea_ab'])
        ->where(['id !=' => 1]);
        $this->set('lineas', $lineas);
    }

    /**
     * View method
     *
     * @param string|null $id Linea id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $linea = $this->Lineas->get($id, [
            'contain' => ['Colocacion'],
        ]);

        $this->set('linea', $linea);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $linea = $this->Lineas->newEntity();
        if ($this->request->is('post')) {
            $linea = $this->Lineas->patchEntity($linea, $this->request->getData());
            if ($this->Lineas->save($linea)) {
                $this->Flash->success(__('El registro se guardó correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar la linea.'));
        }
        $this->set(compact('linea'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Linea id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $linea = $this->Lineas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $linea = $this->Lineas->patchEntity($linea, $this->request->getData());
            if ($this->Lineas->save($linea)) {
                $this->Flash->success(__('El registro se actualizó correctamente'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El registro no se guardó, intente nuevamente'));
        }
        $this->set(compact('linea'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Linea id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $linea = $this->Lineas->get($id);
        if ($this->Lineas->delete($linea)) {
            $this->Flash->success(__('El registro se eliminó correctamente.'));
        } else {
            $this->Flash->error(__('El registro no se elimino, intente nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
