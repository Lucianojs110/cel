<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Remolque Controller
 *
 * @property \App\Model\Table\RemolqueTable $Remolque
 *
 * @method \App\Model\Entity\Remolque[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RemolqueController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $remolque = $this->paginate($this->Remolque);

        $this->set(compact('remolque'));
    }


    public function getremolque()
    {
        if ($this->request->is('ajax')) {
            
            $this->autoRender = false;
            $terms=  TableRegistry::getTableLocator()->get('Remolque')
            ->find('all')
        
            ->where(['Remolque.remolque LIKE' => trim($this->request->query['term']) . '%']);
           
            echo json_encode($terms);     
    }
   }
    
    /**
     * View method
     *
     * @param string|null $id Remolque id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $remolque = $this->Remolque->get($id, [
            'contain' => [],
        ]);

        $this->set('remolque', $remolque);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $remolque = $this->Remolque->newEntity();
        if ($this->request->is('post')) {
            $remolque = $this->Remolque->patchEntity($remolque, $this->request->getData());
            if ($this->Remolque->save($remolque)) {
                $this->Flash->success(__('El registro se guardó correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se puedo guardar, intente nuevamente.'));
        }
        $this->set(compact('remolque'));
    }

    public function addrem()
    {
        if($this->request->is('ajax'))
        {    
            
          
                           
            $Remolque= TableRegistry::getTableLocator()->get('Remolque');
            $remolque = $Remolque->newEntity();
            $remolque->remolque = $this->request->data['remolque'];
            $remolque->placaremolque = $this->request->data['placaremolque'];
         
           
           
            $Remolque->save($remolque);

            
        }
        
        $this->autoRender = false;

    }

    /**
     * Edit method
     *
     * @param string|null $id Remolque id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $remolque = $this->Remolque->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $remolque = $this->Remolque->patchEntity($remolque, $this->request->getData());
            if ($this->Remolque->save($remolque)) {
                $this->Flash->success(__('El registro se guardó correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo editar.'));
        }
        $this->set(compact('remolque'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Remolque id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $remolque = $this->Remolque->get($id);
        if ($this->Remolque->delete($remolque)) {
            $this->Flash->success(__('Se ha eliminado el registro.'));
        } else {
            $this->Flash->error(__('No se ha podido elimar el registro.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
