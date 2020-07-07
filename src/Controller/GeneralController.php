<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * General Controller
 *
 * @property \App\Model\Table\GeneralTable $General
 *
 * @method \App\Model\Entity\General[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GeneralController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public $helpers = array('Html', 'Form', 'Time');
    public $components = array('RequestHandler');
    public $paginate = [
        'limit' => 10,
        'order' => [
            'General.id' => 'desc'
        ]
    ];
    public function index()
    {
        

       $general = TableRegistry::getTableLocator()->get('General')->find('all');
       $this->set('general', $this->paginate($general));
       $total = $general->count();
       $this->set('total', $total);

       if (!empty($this->request->getQuery('pksearch'))) {
           $pksearch = $this->request->getQuery('pksearch');
       
           $general = TableRegistry::getTableLocator()->get('General')->find('all')
           ->where(['General.pickup LIKE' => "%$pksearch%"]);
           $this->set('general', $this->paginate($general));
           
           $total = $general->count();
           $this->set('total', $total);
       }
    }

    /**
     * View method
     *
     * @param string|null $id General id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $general = $this->General->get($id, [
            'contain' => [],
        ]);

        $this->set('general', $general);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $general = $this->General->newEntity();
        if ($this->request->is('post')) {
            $general = $this->General->patchEntity($general, $this->request->getData());
        if ($this->General->save($general)) {
                $this->Flash->success(__('El registro se guardó correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El registro no se guardó, intente nuevamente.'));
        }
        $this->set(compact('general'));

       
    }

    public function addexel()
    {
       

       
    }

    /**
     * Edit method
     *
     * @param string|null $id General id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $general = $this->General->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $general = $this->General->patchEntity($general, $this->request->getData());
            if ($this->General->save($general)) {
                $this->Flash->success(__('El registro General Po se actualizó'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar el registro.'));
        }
        $this->set(compact('general'));
    }

    /**
     * Delete method
     *
     * @param string|null $id General id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $general = $this->General->get($id);
        if ($this->General->delete($general)) {
            $this->Flash->success(__('se ha eliminado el registro.'));
        } else {
            $this->Flash->error(__('no se ha eliminado el registro, intente nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {    
            if(in_array($this->request->getParam('action'), ['index']))
         
            {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }
}
