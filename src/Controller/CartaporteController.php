<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\ORM\TableRegistry;
/**
 * Cartaporte Controller
 *
 *
 * @method \App\Model\Entity\Cartaporte[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartaporteController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    
   
        
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    public function index()
    {
        $cartaporte = $this->paginate($this->Cartaporte);

        $this->set(compact('cartaporte'));
    }

    /**
     * View method
     *
     * @param string|null $id Cartaporte id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cartaporte = $this->Cartaporte->get($id);
        $this->viewBuilder()->setOptions([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Carta porte_LD' . $id . '.pdf'
            ]
        ]);
        $this->set('cartaporte', $cartaporte);

        
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $remitente = TableRegistry::getTableLocator()->get('Remitente')->find('all');
        $this->set('remitente', $remitente); 

        $cartaporte = $this->Cartaporte->newEntity();
        if ($this->request->is('post')) {
            
            $fecha = date("y-m-d", strtotime($this->request->getData('fechaExp')) );
            
            $Cartaporte = TableRegistry::getTableLocator()->get('Cartaporte');
            $cartaporte = $Cartaporte->newEntity();
            $cartaporte->fechaExp =  $fecha;
            $cartaporte->lugarExp = $this->request->getData('lugarExp');
            $cartaporte->origen = $this->request->getData('origen');
            $cartaporte->remitente = $this->request->getData('remitente');
            $cartaporte->rfcrem = $this->request->getData('rfcrem');
            $cartaporte->domiciliorem = $this->request->getData('domiciliorem');
            $cartaporte->lugarrecogida = $this->request->getData('lugarrecogida');
            $cartaporte->destino = $this->request->getData('destino');
            $cartaporte->destinatario = $this->request->getData('destinatario');
            $cartaporte->rfcdes = $this->request->getData('rfcdes');
            $cartaporte->patiodestino = $this->request->getData('patiodestino');
            $cartaporte->lugarEntrega = $this->request->getData('lugarEntrega');
            $cartaporte->valorUnitario = $this->request->getData('valorUnitario');
            $cartaporte->valorDeclarado = $this->request->getData('valorDeclarado');
            $cartaporte->pesoDeclarado = $this->request->getData('pesoDeclarado');
            $cartaporte->cantidad = $this->request->getData('cantidad');
            $cartaporte->contenido = $this->request->getData('contenido');
            $cartaporte->totalFlete = $this->request->getData('totalFlete');
            $cartaporte->seguro = $this->request->getData('seguro');
            $cartaporte->otros = $this->request->getData('otros');
            $cartaporte->importe = $this->request->getData('importe');
            $cartaporte->iva = $this->request->getData('iva');
            $cartaporte->retIva = $this->request->getData('retIva');
            $cartaporte->neto = $this->request->getData('neto');
            $cartaporte->totalLetras = "un peso 12/100 M.N.";
            $cartaporte->contacto = $this->request->getData('contacto');
            $cartaporte->cita = $this->request->getData('cita');
            $cartaporte->impoExpo = $this->request->getData('impoExpo');
            $cartaporte->agenciaAduanal = $this->request->getData('agenciaAduanal');
            $cartaporte->pedimento = $this->request->getData('pedimento');
            $cartaporte->referencia = $this->request->getData('referencia');
            $cartaporte->unidad = $this->request->getData('unidad');
            $cartaporte->operador = $this->request->getData('operador');
            $cartaporte->remolque = $this->request->getData('remolque');
            $cartaporte->remolqueplacas = $this->request->getData('remolqueplacas');
            $cartaporte->tractorplacas = $this->request->getData('tractorplacas');
            $Cartaporte->save($cartaporte);
             
            
            //$cartaporte = $this->Cartaporte->patchEntity($cartaporte, $this->request->getData());

            if ($this->Cartaporte->save($cartaporte)) {
                $this->Flash->success(__('La Carta Porte ha sido guardada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La Carta Porte no ha sido guardada. intente nuevamente.'));
        }
        $this->set(compact('cartaporte'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cartaporte id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cartaporte = $this->Cartaporte->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cartaporte = $this->Cartaporte->patchEntity($cartaporte, $this->request->getData());
            if ($this->Cartaporte->save($cartaporte)) {
                $this->Flash->success(__('The cartaporte has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cartaporte could not be saved. Please, try again.'));
        }
        $this->set(compact('cartaporte'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cartaporte id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cartaporte = $this->Cartaporte->get($id);
        if ($this->Cartaporte->delete($cartaporte)) {
            $this->Flash->success(__('The cartaporte has been deleted.'));
        } else {
            $this->Flash->error(__('The cartaporte could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
