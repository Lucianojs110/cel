<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Remitente Controller
 *
 * @property \App\Model\Table\RemitenteTable $Remitente
 *
 * @method \App\Model\Entity\Remitente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RemitenteController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $remitente = $this->paginate($this->Remitente);

        $this->set(compact('remitente'));
    }


    public function getremitentes()
    {
        if ($this->request->is('ajax')) {
            
            $this->autoRender = false;
            $terms=  TableRegistry::getTableLocator()->get('Remitente')
            ->find('all')
        
            ->where(['Remitente.remitente LIKE' => trim($this->request->query['term']) . '%']);
           
            echo json_encode($terms);     
    }
   }
    /**
     * View method
     *
     * @param string|null $id Remitente id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $remitente = $this->Remitente->get($id, [
            'contain' => [],
        ]);

        $this->set('remitente', $remitente);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $remitente = $this->Remitente->newEntity();
        if ($this->request->is('post')) {
            $remitente = $this->Remitente->patchEntity($remitente, $this->request->getData());
            if ($this->Remitente->save($remitente)) {
                $this->Flash->success(__('El remitente se guardo correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El remitente no se guardo, intente nuevamente.'));
        }
        $this->set(compact('remitente'));
    }

    public function addrem()
    {
        if($this->request->is('ajax'))
        {    
            
          
                           
            $Remitente = TableRegistry::getTableLocator()->get('remitente');
            $remitente1 = $Remitente->newEntity();
            $remitente1->remitente = $this->request->data['remitente'];
            $remitente1->rfc = $this->request->data['rfc'];
            $remitente1->origen = $this->request->data['origen'];
            $remitente1->domicilio = $this->request->data['domicilio'];
            $remitente1->recogida = $this->request->data['recogida'];
           
            $Remitente->save($remitente1);

            
        }
        
        $this->autoRender = false;

    }

    /**
     * Edit method
     *
     * @param string|null $id Remitente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $remitente = $this->Remitente->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $remitente = $this->Remitente->patchEntity($remitente, $this->request->getData());
            if ($this->Remitente->save($remitente)) {
                $this->Flash->success(__('El remitente se actualizó.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El remitente no pudo ser actualizado.'));
        }
        $this->set(compact('remitente'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Remitente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $remitente = $this->Remitente->get($id);
        if ($this->Remitente->delete($remitente)) {
            $this->Flash->success(__('Se elimino correctamente.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
