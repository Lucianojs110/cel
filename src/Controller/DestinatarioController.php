<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Destinatario Controller
 *
 *
 * @method \App\Model\Entity\Destinatario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DestinatarioController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $destinatario = $this->paginate($this->Destinatario);

        $this->set(compact('destinatario'));
    }

    /**
     * View method
     *
     * @param string|null $id Destinatario id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $destinatario = $this->Destinatario->get($id, [
            'contain' => [],
        ]);

        $this->set('destinatario', $destinatario);
    }


    public function getdestinatarios()
    {
        if ($this->request->is('ajax')) {
            
            $this->autoRender = false;
            $terms=  TableRegistry::getTableLocator()->get('Destinatario')
            ->find('all')
        
            ->where(['Destinatario.destinatario LIKE' => trim($this->request->query['term']) . '%']);
           
            echo json_encode($terms);     
    }
   }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $destinatario = $this->Destinatario->newEntity();
        if ($this->request->is('post')) {
            $destinatario = $this->Destinatario->patchEntity($destinatario, $this->request->getData());
            if ($this->Destinatario->save($destinatario)) {
                $this->Flash->success(__('El destinatario se guardo correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El destinatario no se guardo, intente nuevamente.'));
        }
        $this->set(compact('destinatario'));
    }


    public function adddes()
    {
        if($this->request->is('ajax'))
        {    
            
          
                           
            $Destinatario= TableRegistry::getTableLocator()->get('destinatario');
            $destinatario = $Destinatario->newEntity();
            $destinatario->destinatario = $this->request->data['destinatario'];
            $destinatario->destino = $this->request->data['destino'];
            $destinatario->rfc = $this->request->data['rfc'];
            $destinatario->domicilio = $this->request->data['domicilio'];
            $destinatario->entrega = $this->request->data['entrega'];
           
            $Destinatario->save($destinatario);

            
        }
        
        $this->autoRender = false;

    }
    /**
     * Edit method
     *
     * @param string|null $id Destinatario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $destinatario = $this->Destinatario->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $destinatario = $this->Destinatario->patchEntity($destinatario, $this->request->getData());
            if ($this->Destinatario->save($destinatario)) {
                $this->Flash->success(__('El destinatario se guardo correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El destinatario no se guardo, intente nuevamente.'));
        }
        $this->set(compact('destinatario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Destinatario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $destinatario = $this->Destinatario->get($id);
        if ($this->Destinatario->delete($destinatario)) {
            $this->Flash->success(__('Se elimino correctamente'));
        } else {
            $this->Flash->error(__('No se elimino. intente nuevamente'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
