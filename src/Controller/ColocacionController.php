<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * Colocacion Controller
 *
 *
 * @method \App\Model\Entity\Colocacion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ColocacionController extends AppController
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
            'Colocacion.colocacion' => 'desc'
        ]
    ];
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        
    }

    public function index()
    {
       
        $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus']);
        $this->set('colocacion', $this->paginate($colocacion));
        $total = $colocacion->count();
        $this->set('total', $total);

        $opestatus = TableRegistry::getTableLocator()->get('estatus')->find('list')->select(['id','name']);
        $this->set('opestatus', $opestatus); 
        
        ;
        
        $total = $colocacion->count();
        $this->set('total', $total);


        if (!empty($this->request->getQuery('estatus'))) {
            
            $cjsearch = $this->request->getQuery('cjsearch');
            $estatus = $this->request->getQuery('estatus');

            if(is_null($cjsearch)){
                $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
                ->where(['Estatus.id' => $estatus]);
                $this->set('colocacion', $this->paginate($colocacion));

                $total = $colocacion->count();
                $this->set('total', $total);

            }else{

                if($estatus==1){
                $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
                ->where(['Colocacion.caja LIKE' => "%$cjsearch%"]);
                $this->set('colocacion', $this->paginate($colocacion));
                
                $total = $colocacion->count();
                $this->set('total', $total);
            }else{
                $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
                ->where(['Colocacion.caja LIKE' => "%$cjsearch%"])
                ->where(['Estatus.id' => $estatus]);
                $this->set('colocacion', $this->paginate($colocacion));
                
                $total = $colocacion->count();
                $this->set('total', $total);

                }
            }
            
            
            

           
        }

        
        
        
       
        $Potemp = TableRegistry::getTableLocator()->get('potemp');
        $potemp1 = $Potemp->newEntity();
        $potemp1->id = 1;
        $potemp1->id_general = ""; 
        $potemp1->pickup = ""; 
        $potemp1->cliente = "";   
        $potemp1->entrega = ""; 
        $Potemp->save($potemp1);
        
        
    }


    public function export(){
        $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])->toArray();
        $this->set('colocacion', $colocacion); 
        pr($colocacion);
        die;
    }

    public function reporte()
    {
        $oplinea = TableRegistry::getTableLocator()->get('lineas')->find('list')->select(['name']);
        $this->set('oplinea', $oplinea); 
        $opestatus = TableRegistry::getTableLocator()->get('estatus')->find('list')->select(['name']);
        $this->set('opestatus', $opestatus); 
       
       
       $inicio2 = $this->request->query('fechaInicio');
       $final2 = $this->request->query('fechaFinal');
       $linea = $this->request->query('linea');
       $estatus = $this->request->query('estatus');

       $inicio = date("Y-m-d", strtotime($inicio2) );
       $final = date("Y-m-d", strtotime($final2) );

      
       if(($linea==1)and($estatus!=1)){
        $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
        ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
        ->where(['DATE(Colocacion.colocacion) <=' => $final])
        ->where(['Estatus.id' => $estatus])
        ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
        
        $this->set('colocacion', $colocacion);
        }
        elseif(($estatus==1)and($linea!=1)){
         $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
         ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
         ->where(['DATE(Colocacion.colocacion) <=' => $final])
         ->where(['Lineas.id' => $linea])
         ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
         $this->set('colocacion', $colocacion);
        }
        elseif(($estatus==1) and ($linea==1)){
         $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
         ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
         ->where(['DATE(Colocacion.colocacion) <=' => $final])
         ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
         $this->set('colocacion', $colocacion);
 
        }else{
 
         $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
         ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
         ->where(['DATE(Colocacion.colocacion) <=' => $final])
         ->where(['Lineas.id' => $linea])
         ->where(['Estatus.id' => $estatus])
         ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
         $this->set('colocacion', $colocacion);
        }


          
    }

    public function reporteTransportista()
    {
        $oplinea = TableRegistry::getTableLocator()->get('lineas')->find('list')->select(['name']);
        $this->set('oplinea', $oplinea); 
        
       
       
       $inicio2 = $this->request->query('fechaInicio');
       $final2 = $this->request->query('fechaFinal');
       $linea = $this->request->query('linea');
       $pago = $this->request->query('pago');

       $inicio = date("Y-m-d", strtotime($inicio2) );
       $final = date("Y-m-d", strtotime($final2) );

      
       if(($linea==1)and($pago=='todos')){
        $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
        ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
        ->where(['DATE(Colocacion.colocacion) <=' => $final])
        ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
        $this->set('colocacion', $colocacion);

        $colocacion2 = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
        ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
        ->where(['DATE(Colocacion.colocacion) <=' => $final]);
    
        $res1 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImportePesos')])->first();
        $total1 = $res1->sum;
        $this->set("total1", $res1->sum); 

        $res2 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImporteDolar')])->first();
        $total2 = $res2->sum;
        $this->set("total2", $res2->sum); 

        $this->set("inicio2", $inicio2);
        $this->set("final2", $final2);
        }

        elseif(($linea==1)and($pago=='pagados')){
         $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
         ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
         ->where(['DATE(Colocacion.colocacion) <=' => $final])
         ->where(['Colocacion.transPago !=' => ""])
         ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
         $this->set('colocacion', $colocacion);


         $colocacion2 = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
         ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
         ->where(['DATE(Colocacion.colocacion) <=' => $final])
         ->where(['Colocacion.transPago !=' => ""]);

         $res1 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImportePesos')])->first();
         $total1 = $res1->sum;
         $this->set("total1", $res1->sum); 
 
         $res2 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImporteDolar')])->first();
         $total2 = $res2->sum;
         $this->set("total2", $res2->sum); 

         $this->set("inicio2", $inicio2);
        $this->set("final2", $final2);
        }
        elseif(($linea==1)and($pago=='pendientes')){
            $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Colocacion.transPago' => ""])
            ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
            $this->set('colocacion', $colocacion);

            $colocacion2 = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Colocacion.transPago' => ""]);

            $res1 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImportePesos')])->first();
            $total1 = $res1->sum;
            $this->set("total1", $res1->sum); 
    
            $res2 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImporteDolar')])->first();
            $total2 = $res2->sum;
            $this->set("total2", $res2->sum); 

            $this->set("inicio2", $inicio2);
            $this->set("final2", $final2);
 
        }elseif(($linea!=1)and($pago=='todos')){
            $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Lineas.id' => $linea])
            ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
            $this->set('colocacion', $colocacion);

            $colocacion2 = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Lineas.id' => $linea]);

            $res1 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImportePesos')])->first();
            $total1 = $res1->sum;
            $this->set("total1", $res1->sum); 
    
            $res2 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImporteDolar')])->first();
            $total2 = $res2->sum;
            $this->set("total2", $res2->sum); 

            $this->set("inicio2", $inicio2);
            $this->set("final2", $final2);
        }
        elseif(($linea!=1)and($pago=='pagados')){
            $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Lineas.id' => $linea])
            ->where(['Colocacion.transPago !=' => ""])
            ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
            $this->set('colocacion', $colocacion);

            $colocacion2 = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Lineas.id' => $linea])
            ->where(['Colocacion.transPago !=' => ""]);

            $res1 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImportePesos')])->first();
            $total1 = $res1->sum;
            $this->set("total1", $res1->sum); 
    
            $res2 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImporteDolar')])->first();
            $total2 = $res2->sum;
            $this->set("total2", $res2->sum);
            
            $this->set("inicio2", $inicio2);
            $this->set("final2", $final2);
        }
        elseif(($linea!=1)and($pago=='pendiente')){
            $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Lineas.id' => $linea])
            ->where(['Colocacion.transPago' => ""])
            ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
            $this->set('colocacion', $colocacion);

            $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Lineas.id' => $linea])
            ->where(['Colocacion.transPago' => ""]);

            $res1 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImportePesos')])->first();
            $total1 = $res1->sum;
            $this->set("total1", $res1->sum); 
    
            $res2 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImporteDolar')])->first();
            $total2 = $res2->sum;
            $this->set("total2", $res2->sum); 

            $this->set("inicio2", $inicio2);
            $this->set("final2", $final2);
        }else{
            $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final]);
            $this->set('colocacion', $colocacion);

            $total1 = 0;
            $this->set("total1", $total1); 
            
            $total2 = 0;
            $this->set("total2", $total2); 

            $this->set("inicio2", $inicio2);
            $this->set("final2", $final2);
        }
        
       
       
        


    }

    public function reporteTransfer()
    {
        $oplinea = TableRegistry::getTableLocator()->get('lineas')->find('list')->select(['name']);
        $this->set('oplinea', $oplinea); 
        
       
       
       $inicio2 = $this->request->query('fechaInicio');
       $final2 = $this->request->query('fechaFinal');
       $linea = $this->request->query('linea');
       $pago = $this->request->query('pago');

       $inicio = date("Y-m-d", strtotime($inicio2) );
       $final = date("Y-m-d", strtotime($final2) );

      
       if(($linea==1)and($pago=='todos')){
        $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
        ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
        ->where(['DATE(Colocacion.colocacion) <=' => $final])
        ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
        $this->set('colocacion', $colocacion);

        $colocacion2 = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
        ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
        ->where(['DATE(Colocacion.colocacion) <=' => $final]);
    
        $res1 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transferImportePesos')])->first();
        $total1 = $res1->sum;
        $this->set("total1", $res1->sum); 

        $res2 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transferImporteDolar')])->first();
        $total2 = $res2->sum;
        $this->set("total2", $res2->sum);
        
        $this->set("inicio2", $inicio2);
        $this->set("final2", $final2);
        }

        elseif(($linea==1)and($pago=='pagados')){
         $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
         ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
         ->where(['DATE(Colocacion.colocacion) <=' => $final])
         ->where(['Colocacion.transferPago !=' => ""])
         ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
         $this->set('colocacion', $colocacion);


         $colocacion2 = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
         ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
         ->where(['DATE(Colocacion.colocacion) <=' => $final])
         ->where(['Colocacion.transferPago !=' => ""]);

         $res1 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transferImportePesos')])->first();
         $total1 = $res1->sum;
         $this->set("total1", $res1->sum); 
 
         $res2 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transferImporteDolar')])->first();
         $total2 = $res2->sum;
         $this->set("total2", $res2->sum); 

         $this->set("inicio2", $inicio2);
        $this->set("final2", $final2);
        }
        elseif(($linea==1)and($pago=='pendientes')){
            $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Colocacion.transferPago' => ""])
            ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
            $this->set('colocacion', $colocacion);

            $colocacion2 = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Colocacion.transferPago' => ""]);

            $res1 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transferImportePesos')])->first();
            $total1 = $res1->sum;
            $this->set("total1", $res1->sum); 
    
            $res2 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transferImporteDolar')])->first();
            $total2 = $res2->sum;
            $this->set("total2", $res2->sum); 

            $this->set("inicio2", $inicio2);
            $this->set("final2", $final2);
 
        }elseif(($linea!=1)and($pago=='todos')){
            $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Lineas.id' => $linea])
            ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
            $this->set('colocacion', $colocacion);

            $colocacion2 = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Lineas.id' => $linea]);

            $res1 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transferImportePesos')])->first();
            $total1 = $res1->sum;
            $this->set("total1", $res1->sum); 
    
            $res2 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transferImporteDolar')])->first();
            $total2 = $res2->sum;
            $this->set("total2", $res2->sum); 

            $this->set("inicio2", $inicio2);
            $this->set("final2", $final2);
        }
        elseif(($linea!=1)and($pago=='pagados')){
            $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Lineas.id' => $linea])
            ->where(['Colocacion.transPago !=' => ""])
            ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
            $this->set('colocacion', $colocacion);

            $colocacion2 = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Lineas.id' => $linea])
            ->where(['Colocacion.transPago !=' => ""]);

            $res1 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImportePesos')])->first();
            $total1 = $res1->sum;
            $this->set("total1", $res1->sum); 
    
            $res2 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImporteDolar')])->first();
            $total2 = $res2->sum;
            $this->set("total2", $res2->sum); 

            $this->set("inicio2", $inicio2);
            $this->set("final2", $final2);
        }
        elseif(($linea!=1)and($pago=='pendiente')){
            $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Lineas.id' => $linea])
            ->where(['Colocacion.transPago' => ""])
            ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
            $this->set('colocacion', $colocacion);

            $colocacion2 = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Lineas.id' => $linea])
            ->where(['Colocacion.transPago' => ""]);

            $res1 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImportePesos')])->first();
            $total1 = $res1->sum;
            $this->set("total1", $res1->sum); 
    
            $res2 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImporteDolar')])->first();
            $total2 = $res2->sum;
            $this->set("total2", $res2->sum); 

            $this->set("inicio2", $inicio2);
            $this->set("final2", $final2);
        }else{
            $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final]);
            $this->set('colocacion', $colocacion);
        
            $total1 = 0;
            $this->set("total1", $total1); 
    
            $total2 = 0;
            $this->set("total2", $total2); 

            $this->set("inicio2", $inicio2);
            $this->set("final2", $final2);
        }
        
    }

    public function reporteOrbis()
    {
      
      
       $inicio2 = $this->request->query('fechaInicio');
       $final2 = $this->request->query('fechaFinal');
       $cliente = $this->request->query('cliente');
       $facturado = $this->request->query('facturado');

       $inicio = date("Y-m-d", strtotime($inicio2) );
       $final = date("Y-m-d", strtotime($final2) );

      
       if(($cliente=='todos')and($facturado=='todos')){
        $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
        ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
        ->where(['DATE(Colocacion.colocacion) <=' => $final])
        ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
        $this->set('colocacion', $colocacion);

        $colocacion2 = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
        ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
        ->where(['DATE(Colocacion.colocacion) <=' => $final]);
    
        $res1 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.orbisPeso')])->first();
        $total1 = $res1->sum;
        $this->set("total1", $res1->sum); 

        $res2 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.orbisDolares')])->first();
        $total2 = $res2->sum;
        $this->set("total2", $res2->sum); 

        $res3 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.orbisTotalFactura')])->first();
        $total3 = $res3->sum;
        $this->set("total3", $res3->sum);

        $res4 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImportePesos')])->first();
        $total4 = $res4->sum;
        
        $res5 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transferImportePesos')])->first();
        $total5 = $res5->sum;

        $total6 = $total2-($total4+$total5);
        $this->set("total6", $total6);

        $this->set("inicio2", $inicio2);
        $this->set("final2", $final2);
        
        }

        elseif(($cliente=='todos')and($facturado=='facturado')){
         $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
         ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
         ->where(['DATE(Colocacion.colocacion) <=' => $final])
         ->where(['Colocacion.orbisFactura !=' => ""])
         ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
         $this->set('colocacion', $colocacion);


         $colocacion2 = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
         ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
         ->where(['DATE(Colocacion.colocacion) <=' => $final])
         ->where(['Colocacion.orbisFactura !=' => ""]);
         $this->set('colocacion', $colocacion);

         $res1 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.orbisPeso')])->first();
            $total1 = $res1->sum;
            $this->set("total1", $res1->sum); 
    
            $res2 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.orbisDolares')])->first();
            $total2 = $res2->sum;
            $this->set("total2", $res2->sum); 
    
            $res3 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.orbisTotalFactura')])->first();
            $total3 = $res3->sum;
            $this->set("total3", $res3->sum); 

            $res4 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImportePesos')])->first();
            $total4 = $res4->sum;
            
            $res5 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transferImportePesos')])->first();
            $total5 = $res5->sum;
            
           
            
            $this->set("inicio2", $inicio2);
            $this->set("final2", $final2);
        }
        elseif(($cliente=='todos')and($facturado=='pendientes')){
         $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
         ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
         ->where(['DATE(Colocacion.colocacion) <=' => $final])
         ->where(['Colocacion.orbisFactura' => ""])
         ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
         $this->set('colocacion', $colocacion);


         $colocacion2 = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
         ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
         ->where(['DATE(Colocacion.colocacion) <=' => $final])
         ->where(['Colocacion.orbisFactura' => ""]);
         $this->set('colocacion', $colocacion);

         $res1 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.orbisPeso')])->first();
         $total1 = $res1->sum;
         $this->set("total1", $res1->sum); 
 
         $res2 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.orbisDolares')])->first();
         $total2 = $res2->sum;
         $this->set("total2", $res2->sum); 
 
         $res3 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.orbisTotalFactura')])->first();
         $total3 = $res3->sum;
         $this->set("total3", $res3->sum); 

          $res4 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImportePesos')])->first();
        $total4 = $res4->sum;
        
        $res5 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transferImportePesos')])->first();
        $total5 = $res5->sum;
        
        $total6 = $total2-($total4+$total5);
        $this->set("total6", $total6);

         $this->set("inicio2", $inicio2);
         $this->set("final2", $final2);
 
        }elseif(($cliente!='todos')and($facturado=='todos')){
            
            $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Colocacion.Cliente LIKE' => "%$cliente%"])
            ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
            $this->set('colocacion', $colocacion);

            $colocacion2 = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Colocacion.Cliente LIKE' => "%$cliente%"]);

            $res1 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.orbisPeso')])->first();
            $total1 = $res1->sum;
            $this->set("total1", $res1->sum); 
    
            $res2 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.orbisDolares')])->first();
            $total2 = $res2->sum;
            $this->set("total2", $res2->sum); 
    
            $res3 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.orbisTotalFactura')])->first();
            $total3 = $res3->sum;
            $this->set("total3", $res3->sum);  

            $res4 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImportePesos')])->first();
            $total4 = $res4->sum;
            
            $res5 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transferImportePesos')])->first();
            $total5 = $res5->sum;
            
            $total6 = $total2-($total4+$total5);
            $this->set("total6", $total6);

            $this->set("inicio2", $inicio2);
            $this->set("final2", $final2);
        }
        elseif(($cliente!='todos')and($facturado=='facturado')){
           
            $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Colocacion.orbisFactura !=' => ""])
            ->where(['Colocacion.Cliente LIKE' => "%$cliente%"])
            ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
            $this->set('colocacion', $colocacion);

            $colocacion2 = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Colocacion.orbisFactura !=' => ""])
            ->where(['Colocacion.Cliente LIKE' => "%$cliente%"]);

            $res1 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.orbisPeso')])->first();
            $total1 = $res1->sum;
            $this->set("total1", $res1->sum); 
    
            $res2 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.orbisDolares')])->first();
            $total2 = $res2->sum;
            $this->set("total2", $res2->sum); 
    
            $res3 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.orbisTotalFactura')])->first();
            $total3 = $res3->sum;
            $this->set("total3", $res3->sum); 

            $res4 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImportePesos')])->first();
            $total4 = $res4->sum;
            
            $res5 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transferImportePesos')])->first();
            $total5 = $res5->sum;
            
            $total6 = $total2-($total4+$total5);
            $this->set("total6", $total6);

            $this->set("inicio2", $inicio2);
            $this->set("final2", $final2);
        }
        elseif(($cliente!='todos')and($facturado=='pendientes')){

            $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Colocacion.orbisFactura' => ""])
            ->where(['Colocacion.Cliente LIKE' => "%$cliente%"]);
            $this->set('colocacion', $colocacion);

            $colocacion2 = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final])
            ->where(['Colocacion.orbisFactura' => ""])
            ->where(['Colocacion.Cliente LIKE' => "%$cliente%"])
            ->order(['DATE(Colocacion.colocacion)' => 'ASC']);
            $this->set('colocacion', $colocacion);


            $res1 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.orbisPeso')])->first();
            $total1 = $res1->sum;
            $this->set("total1", $res1->sum); 
    
            $res2 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.orbisDolares')])->first();
            $total2 = $res2->sum;
            $this->set("total2", $res2->sum); 
    
            $res3 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.orbisTotalFactura')])->first();
            $total3 = $res3->sum;
            $this->set("total3", $res3->sum); 

            $res4 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transImportePesos')])->first();
            $total4 = $res4->sum;
            
            $res5 =$colocacion2->select(['sum' => $colocacion2->func()->sum('Colocacion.transferImportePesos')])->first();
            $total5 = $res5->sum;
            
            $total6 = $total2-($total4+$total5);
            $this->set("total6", $total6);

            $this->set("inicio2", $inicio2);
            $this->set("final2", $final2);
        }else{
            $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
            ->where(['DATE(Colocacion.colocacion) >=' => $inicio])
            ->where(['DATE(Colocacion.colocacion) <=' => $final]);
            $this->set('colocacion', $colocacion);

            
            $total1 = 0;
            $this->set("total1", $total1); 
    
            
            $total2 = 0;
            $this->set("total2", $total2); 

            $total3 = 0;
            $this->set("total3", $total3);

            $total6 = 0;
            $this->set("total6", $total6);

            $this->set("inicio2", $inicio2);
            $this->set("final2", $final2);
        }
        
    }

    public function facturacion()
    {
        
        $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus']);
        $this->set('colocacion', $this->paginate($colocacion));
        $total = $colocacion->count();
        $this->set('total', $total);
        if (!empty($this->request->getQuery('cjsearch'))) {
            $cjsearch = $this->request->getQuery('cjsearch');
        
            $colocacion = TableRegistry::getTableLocator()->get('Colocacion')->find('all')->contain(['Lineas','Transfers','Estatus'])
           
            ->where([
                
                'OR' => [['Colocacion.caja LIKE' => "$cjsearch"], ['Colocacion.transFactura LIKE' => "$cjsearch"], ['Colocacion.transferFactura LIKE' => "$cjsearch"], ['Colocacion.orbisFactura LIKE' => "$cjsearch"]],
            ]);
            $this->set('colocacion', $this->paginate($colocacion));
            
            $total = $colocacion->count();
            $this->set('total', $total);
        }
    }

    /**
     * View method
     *
     * @param string|null $id Colocacion id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $colocacion = $this->Colocacion->get($id, [
            'contain' => ['Lineas','Transfers','Estatus'],
        ]);
        $this->set(compact('colocacion'));  
    }

    
    public function viewFac($id = null)
    {
        $colocacion = $this->Colocacion->get($id, [
            'contain' => ['Lineas','Transfers','Estatus'],
        ]);
        $this->set(compact('colocacion'));  
    }


    public function query()
    {
        $caja = $this->request->data['caja'];
        $query = TableRegistry::getTableLocator()->get('Colocacion')->find()->select(['colocacion'])
        ->where(['caja' => $caja]);
        header('Content-Type: application/json');
        return $this->response->withType("application/json")->withStringBody(json_encode($query));
    
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $oplinea = TableRegistry::getTableLocator()->get('lineas')->find('list')->select(['linea_ab']);
        $this->set('oplinea', $oplinea); 

        $general = TableRegistry::getTableLocator()->get('general')->find()->select(['id','pickup', 'client', 'entrega'])
        ->where(['colocacion =' => ""]);
        $this->set('general', $general);


        $this->Potemp = TableRegistry::get('potemp');
        $query = $this->Potemp->find('all');
        $this->set('query', $query);
   
        foreach ($query as $potemp3):
        $idgeneral2=$potemp3->id_general;
        $pickup2=$potemp3->pickup;
        $cliente2=$potemp3->cliente;
        $entrega2=$potemp3->entrega;
        endforeach;

        if($this->request->is('ajax'))
        {
        
        
            $var = $this->request->data['colocacion'];
            $var2 = date("y-m-d", strtotime($var) );

            $Colocacion = TableRegistry::getTableLocator()->get('Colocacion');
            $colocacion1 = $Colocacion->newEntity();
            $colocacion1->colocacion = $var2;
            $colocacion1->caja = $this->request->data['caja'];
            $colocacion1->linea_id = $this->request->data['linea'];
            $colocacion1->pickup = $pickup2;
            $colocacion1->cliente = $cliente2;
            $colocacion1->entrega = $entrega2;
            $colocacion1->transfer_id = 1;
            $colocacion1->estatus_id = 1;
            $colocacion1->id_general = $idgeneral2;
            $colocacion1->poanexo = "";
            $colocacion1->transFactura = "";
            $colocacion1->transportista = "";
            $colocacion1->transImportePesos = "";
            $colocacion1->transImporteDolar = "";
            $colocacion1->transCheque = "";
            $colocacion1->transObs = "";
            $colocacion1->transferFactura = "";
            $colocacion1->transfer2 = "";
            $colocacion1->transferImportePesos = "";
            $colocacion1->transferImporteDolar = "";
            $colocacion1->transferCheque = "";
            $colocacion1->transferObs = "";
            $colocacion1->orbisFactura = "";
            $colocacion1->orbisCliente = "";
            $colocacion1->orbisPeso = "";
            $colocacion1->orbisDolares = "";
            $colocacion1->orbisTotalFactura = "";
            $colocacion1->orbisRelacion = "";
            $colocacion1->orbisCheque = "";
            $colocacion1->orbisObs = "";
            
            $Colocacion->save($colocacion1);

          
            if (!empty($idgeneral2)){
            $General = TableRegistry::getTableLocator()->get('general');
            $general1 = $General->get($idgeneral2);
            $general1->colocacion = $this->request->data['colocacion'];
            $general1->cajanac = $this->request->data['caja'];
            $General->save($general1);
            }

            $Potemp = TableRegistry::getTableLocator()->get('potemp');
            $potemp1 = $Potemp->newEntity();
            $potemp1->id = 1;
            $potemp1->id_general = ""; 
            $potemp1->pickup = ""; 
            $potemp1->cliente = "";   
            $potemp1->entrega = ""; 
            $Potemp->save($potemp1);
       
        } 
    }

    public function borrarpo()
    {
       
        if($this->request->is('ajax'))
        {
            $Potemp = TableRegistry::getTableLocator()->get('potemp');
            $potemp1 = $Potemp->newEntity();
            $potemp1->id = 1;
            $potemp1->id_general = ""; 
            $potemp1->pickup = ""; 
            $potemp1->cliente = "";   
            $potemp1->entrega = ""; 
            $Potemp->save($potemp1);
          
        } 
           
        $this->autoRender = false;
       
    }

    public function addpotemp()
    {
       
        if($this->request->is('ajax'))
        {
            $Potemp = TableRegistry::getTableLocator()->get('potemp');
            $potemp1 = $Potemp->newEntity();
            $potemp1->id = 1;
            $potemp1->id_general = $this->request->data['id']; 
            $potemp1->pickup = $this->request->data['pickup']; 
            $potemp1->cliente = $this->request->data['cliente'];   
            $potemp1->entrega = $this->request->data['entrega']; 
            $Potemp->save($potemp1);

          
        } 
           
        $this->autoRender = false;
       
    }

    public function obtenerdatospo()
    {
       
        $this->Potemp = TableRegistry::get('Potemp');
        $potemp1 = $this->Potemp->find(); 
        $this->set('potemp1', $potemp1);   
      
    }

    public function edit($id = null)
    {
        $colocacion = $this->Colocacion->get($id, [
            'contain' => [],
        ]);
        $this->set(compact('colocacion'));

        $general = TableRegistry::getTableLocator()->get('general')->find()->select(['id','pickup', 'client', 'entrega'])
        ->where(['colocacion =' => ""]);
        $this->set('general', $general);   
        
        $oplinea = TableRegistry::getTableLocator()->get('lineas')->find('list')->select(['linea_ab']);
        $this->set('oplinea', $oplinea); 

        $optransfer = TableRegistry::getTableLocator()->get('Transfers')->find('list')->select(['name']);
        $this->set('optransfer', $optransfer); 

        $opestatus = TableRegistry::getTableLocator()->get('estatus')->find('list')->select(['name']);
        $this->set('opestatus', $opestatus); 
       
    }

    
    public function edit2()
    {
     
        

        if($this->request->is('ajax'))
        {
           

            $coloc = $this->request->data['colocacion'];
            $coloc2 = date("Y-m-d", strtotime($coloc) );

            $trasbordo= $this->request->data['trasbordo'];
            if(($trasbordo)!=null){
                $trasbordo2 = date("Y-m-d", strtotime($trasbordo));
                }

            $entregada = $this->request->data['entregada'];
            if(($entregada)!=null){
                $entregada2 = date("Y-m-d", strtotime($entregada));
                }
            
            
            $importacion = $this->request->data['importacion'];
            if(($importacion)!=null){
                $importacion2 = date("Y-m-d", strtotime($importacion));
                }

            $cruce = $this->request->data['cruce'];
            if(($cruce)!=null){
                $cruce2 = date("Y-m-d", strtotime($cruce));
                }

            $despacho = $this->request->data['despacho'];
            if(($despacho)!=null){
                $despacho2 = date("Y-m-d", strtotime($despacho) );
                 }

            $descargada = $this->request->data['descargada'];
            if(($descargada)!=null){
                $descargada2 = date("Y-m-d", strtotime($descargada));
                }   



            $idcoloc= $this->request->data['idcoloc'];   
            $id_general1=null;
            $colocacion = $this->Colocacion->get($idcoloc);
            $this->set(compact('colocacion'));
            $id_general1=$colocacion->id_general;

            $colocacion = TableRegistry::getTableLocator()->get('colocacion');
            $colocacion1 = $colocacion->get($idcoloc);
            $colocacion1->colocacion = $coloc2;
            $colocacion1->caja = $this->request->data['caja'];
            $colocacion1->linea_id = $this->request->data['linea'];
            $colocacion1->pickup = $this->request->data['pickup'];
            $colocacion1->cliente = $this->request->data['cliente'];
            $colocacion1->entrega = $this->request->data['entrega'];
            $colocacion1->poanexo = $this->request->data['poanexo'];
            $colocacion1->trasbordo = $trasbordo2;
            $colocacion1->entregada = $entregada2;
            $colocacion1->importacion = $importacion2;
            $colocacion1->cruce = $cruce2;
            $colocacion1->transfer_id = $this->request->data['transfer'];
            $colocacion1->estatus_id = $this->request->data['estatus'];
            $colocacion1->despacho =  $despacho2;
            $colocacion1->descargada = $descargada2;
            $colocacion1->id_general = $this->request->data['idgeneral'];
            $id_general2 = $this->request->data['idgeneral'];
            $colocacion->save($colocacion1);

            $this->Flash->success(__('El registro se actualizó correctamente'));
            

            if($id_general1!=null){
                if($id_general1==$id_general2){
                    
                    $idgeneral2 = $this->request->data['idgeneral'];
                    $General = TableRegistry::getTableLocator()->get('general');
                    $general1 = $General->get($idgeneral2);
                    $general1->colocacion = $this->request->data['colocacion'];
                    $general1->cajanac = $this->request->data['caja'];
                    $general1->poanexo = $this->request->data['poanexo'];
                    $general1->arrive = $this->request->data['trasbordo'];
                    $General->save($general1);
                   
                }else{
                    $General = TableRegistry::getTableLocator()->get('general');
                    $general1 = $General->get($id_general2);
                    $general1->colocacion = $this->request->data['colocacion'];
                    $general1->cajanac = $this->request->data['caja'];
                    $general1->poanexo = $this->request->data['poanexo'];
                    $general1->arrive = $this->request->data['trasbordo'];
                    $General->save($general1);

                    $General3 = TableRegistry::getTableLocator()->get('general');
                    $general2 = $General->get($id_general1);
                    $general2->colocacion = "";
                    $general2->cajanac = "";
                    $general2->poanexo = "";
                    $general2->arrive = "";
                    
                    $General3->save($general2);
                }
                
            }else{
                $idgeneral2 = $this->request->data['idgeneral'];
                $General = TableRegistry::getTableLocator()->get('general');
                $general1 = $General->get($idgeneral2);
                $general1->colocacion = $this->request->data['colocacion'];
                $general1->cajanac = $this->request->data['caja'];
                $general1->poanexo = $this->request->data['poanexo'];
                $general1->arrive = $this->request->data['trasbordo'];
                $General->save($general1);
            }

            
            $Potemp = TableRegistry::getTableLocator()->get('potemp');
            $potemp1 = $Potemp->newEntity();
            $potemp1->id = 1;
            $potemp1->id_general = ""; 
            $potemp1->pickup = ""; 
            $potemp1->cliente = "";   
            $potemp1->entrega = ""; 
            $Potemp->save($potemp1);
          
        }
           
        $this->autoRender = false;

    }
   

    /**
     * Edit method
     *
     * @param string|null $id Colocacion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
   

    /**
     * Delete method
     *
     * @param string|null $id Colocacion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $colocacion = $this->Colocacion->get($id);
        if ($this->Colocacion->delete($colocacion)) {
            $this->Flash->success(__('Se ha borrado el registro de Colcación.'));
        } else {
            $this->Flash->error(__('No se ha podido borrar. intente nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function orbis()
    {
       
    }
    public function edittransfer()
    {
        if($this->request->is('ajax'))
        {    
            
            $recepcion= $this->request->data['transferRecepcion'];
            if(($recepcion)!=null){
                $recepcion2 = date("y-m-d", strtotime($recepcion));
               }
            $pago= $this->request->data['transferPago'];
            if(($pago)!=null){
                 $pago2 = date("y-m-d", strtotime($pago));
                }

            
            $idcoloc= $this->request->data['idcoloc'];
                           
            $Colocacion = TableRegistry::getTableLocator()->get('colocacion');
            $colocacion1 = $Colocacion->get($idcoloc);
            $colocacion1->transferRecepcion = $recepcion2;
            $colocacion1->transfer2 = $this->request->data['transfer2'];
            $colocacion1->transferImportePesos = $this->request->data['transferImportePesos'];
            $colocacion1->transferImporteDolar = $this->request->data['transferImporteDolar'];
            $colocacion1->transferPago = $pago2;
            $colocacion1->transferCheque = $this->request->data['transferCheque'];
            $colocacion1->transferFactura = $this->request->data['transferFactura'];
            $colocacion1->transferObs = $this->request->data['transferObs'];
            $Colocacion->save($colocacion1);

            
        }
        
         
        $this->autoRender = false;
    }

    public function edittransportista()
    {
        if($this->request->is('ajax'))
        {    
            $recepcion= $this->request->data['recepcion'];
            if(($recepcion)!=null){
                $recepcion2 = date("y-m-d", strtotime($recepcion) );
                }
            
            $pago= $this->request->data['transPago'];
             if(($pago)!=null){
                $pago2 = date("y-m-d", strtotime($pago) );
                }

            $idcoloc= $this->request->data['idcoloc'];
                           
            $Colocacion = TableRegistry::getTableLocator()->get('colocacion');
            $colocacion1 = $Colocacion->get($idcoloc);
            $colocacion1->transRecepcion = $recepcion2;
            $colocacion1->transportista = $this->request->data['transportista'];
            $colocacion1->transFactura = $this->request->data['transFactura'];
            $colocacion1->transImportePesos = $this->request->data['transImportePesos'];
            $colocacion1->transImporteDolar = $this->request->data['transImporteDolar'];
            $colocacion1->transPago = $pago2;
            $colocacion1->transCheque = $this->request->data['transCheque'];
            $colocacion1->transObs = $this->request->data['transObs'];
            $Colocacion->save($colocacion1);

            
        }
        
         
        $this->autoRender = false;

    }

    public function editorbis()
    {
        if($this->request->is('ajax'))
        {    
            
            $pago= $this->request->data['orbisPago'];
            if(($pago)!=null){
               $pago2 = date("y-m-d", strtotime($pago) );
               }
        

            $envio = $this->request->data['orbisEnvio'];
            if(($envio)!=null){
                $envio2 = date("y-m-d", strtotime($envio) );
                }

            $idcoloc= $this->request->data['idcoloc'];
                           
            $Colocacion = TableRegistry::getTableLocator()->get('colocacion');
            $colocacion1 = $Colocacion->get($idcoloc);
            $colocacion1->orbisFactura = $this->request->data['orbisFactura'];
            $colocacion1->cliente = $this->request->data['orbisCliente'];
            $colocacion1->orbisPeso = $this->request->data['orbisPeso'];
            $colocacion1->orbisDolares = $this->request->data['orbisDolares'];
            $colocacion1->orbisTotalFactura = $this->request->data['orbisTotalFactura'];
            $colocacion1->orbisEnvio = $envio2;
            $colocacion1->orbisRelacion = $this->request->data['orbisRelacion'];
            $colocacion1->orbisPago = $pago2;
            $colocacion1->orbisCheque = $this->request->data['orbisCheque'];
            $colocacion1->orbisObs = $this->request->data['orbisObs'];
            $colocacion1->orbisCotizacion = $this->request->data['orbisCotizacion'];

            $Colocacion->save($colocacion1);

            
        }
        
         
        $this->autoRender = false;

    }

    
    public function editfactura($id = null)
    {
        $colocacion = $this->Colocacion->get($id, [
            'contain' => ['Lineas','Transfers','Estatus'],
        ]);
        $this->set(compact('colocacion'));
        
        $generalid = $colocacion->id_general;

        $general = TableRegistry::getTableLocator()->get('general')->find()->select(['id','origen'])
        ->where(['id =' => $generalid]);
        $this->set('general', $general);
          
    }


    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {    
            if(in_array($this->request->getParam('action'), ['index','facturacion','editfactura','editorbis',
            'edittransportista','edittransfer', 'view', 'viewFac', 'reporteOrbis', 'reporteTransfer', 
            'reporteTransportista', 'reporte']))
         
            {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }
  
}
