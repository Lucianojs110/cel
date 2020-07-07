<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    
    
     public function login()
    {
        if($this->request->is('post'))
        {
            $user = $this->Auth->identify();
            if($user)
            {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            else
            {
                $this->Flash->error('Los datos son invalidos', ['key' => 'auth']);
            }
        }
       
        if ($this->Auth->user())
        {
            return $this->redirect(['controller' => 'Users', 'action' => 'home']);
        }
        
    }
    
    
    
     public function index()
    {

      

        $users =  $this->Users->find()->select(['id', 'first_name', 'email', 'role'])
        ->where(['first_name !=' => 'admin']);

        $this->set('users', $users);
    }



    public function home()
    {
        


        $query10 = TableRegistry::getTableLocator()->get('Colocacion')->find();
        $sumaPesos = 0;
        foreach ($query10 as $query11)
        {$sumaPesos = ((double)$query11->orbisPeso) + $sumaPesos;}
        $this->set('sumaPesos', $sumaPesos);

       

        $oplinea = TableRegistry::getTableLocator()->get('lineas')->find('list')->select(['name']);
        $this->set('oplinea', $oplinea); 

      
            $reslinea = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['Colocacion.cruce !=' => ''])
            ->where(['Estatus.name !=' => 'DESCARGADA'])
            ->where(['Lineas.id !=' => 1])
            ->group(['Lineas.id']);
            $reslinea->select(['Lineas.id','Lineas.name', 'count' => $reslinea->func()->count('*')]);
            $this->set('reslinea', $reslinea); 
            
            $totalPendientes =0;
            foreach ($reslinea as $reslinea2){

                $totalPendientes = $totalPendientes + $reslinea2->count;
            }
            $this->set('totalPendientes', $totalPendientes); 
    }

    public function viewpendiente($id = null)
    {
            $penlinea = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['Colocacion.cruce !=' => ''])
            ->where(['Lineas.id' => $id])
            ->where(['Estatus.id !=' => 6]);
            $this->set('penlinea', $penlinea); 
            

           
    }



    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El Usuario se guardo Correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El ususrio no pudo ser guardado.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El Usuario se guardo Correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El ususrio no pudo ser guardado.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('El Usuario se ha eliminado.'));
        } else {
            $this->Flash->error(__('El Usuario no ha podido eliminarse.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            //if(in_array($this->request->action, ['home', 'view', 'logout']))
            if(in_array($this->request->getParam('action'), ['home', 'logout']))
            {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }
}
