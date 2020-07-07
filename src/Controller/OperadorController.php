<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Operador Controller
 *
 *
 * @method \App\Model\Entity\Operador[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OperadorController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $operador = $this->paginate($this->Operador);

        $this->set(compact('operador'));
    }

    public function getoperador()
    {
        if ($this->request->is('ajax')) {
            
            $this->autoRender = false;
            $terms=  TableRegistry::getTableLocator()->get('Operador')
            ->find('all')
        
            ->where(['Operador.operador LIKE' => trim($this->request->query['term']) . '%']);
           
            echo json_encode($terms);     
    }
   }
    
    
    /**
     * View method
     *
     * @param string|null $id Operador id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $operador = $this->Operador->get($id, [
            'contain' => [],
        ]);

        $this->set('operador', $operador);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $operador = $this->Operador->newEntity();
        if ($this->request->is('post')) {
            $operador = $this->Operador->patchEntity($operador, $this->request->getData());
            if ($this->Operador->save($operador)) {
                $this->Flash->success(__('El operador se guardó correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se puedo guardar.'));
        }
        $this->set(compact('operador'));
    }


    public function addop()
    {
        if($this->request->is('ajax'))
        {    
            
          
                           
            $Operador= TableRegistry::getTableLocator()->get('Operador');
            $operador = $Operador->newEntity();
            $operador->operador = $this->request->data['operador'];
            $operador->unidad = $this->request->data['unidad'];
            $operador->placatractor = $this->request->data['placatractor'];
            $operador->permisionario = $this->request->data['permisionario'];
           
           
            $Operador->save($operador);

            
        }
        
        $this->autoRender = false;

    }
    /**
     * Edit method
     *
     * @param string|null $id Operador id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $operador = $this->Operador->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $operador = $this->Operador->patchEntity($operador, $this->request->getData());
            if ($this->Operador->save($operador)) {
                $this->Flash->success(__('Se edito correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('no se puedo editar'));
        }
        $this->set(compact('operador'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Operador id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $operador = $this->Operador->get($id);
        if ($this->Operador->delete($operador)) {
            $this->Flash->success(__('Se borro el registro correctamente.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
