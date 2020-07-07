<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */

?>

<?php echo $this->Html->script(array('datatables.js' ), array('inline'=>false)) ?>

<?php echo $this->Html->css('style.css'); ?>



<div  Class="container-panel">

<h3 class="text-secondary"><?= __('Reporte facturación Orbis') ?></h3>
<br>
<?= $this->Form->create('facturacion',['type'=>'get'])  ?>	
<div class="row">
  <div class="col">
  <?php echo $this->Form->control('fechaInicio', array(
              'class' => 'form-control datepicker-here', 
              'label' => 'Fecha Inicio',
              'id' => 'fechaInicio',
              'type' => 'Text',
              'data-language' => 'es',
              'data-date-format' => 'dd-mm-yyyy',
              
              'empty'=>'empty',
              'autocomplete' => 'off'
               ));
     ?>	
  
  
  </div>
  <div class="col">
  <?php echo $this->Form->control('fechaFinal', array(
              'class' => 'form-control datepicker-here', 
              'label' => 'Fecha Final',
              'id' => 'fechaFinal',
              'type' => 'Text',
              'data-language' => 'es',
              'data-date-format' => 'dd-mm-yyyy',
              
              'empty'=>'empty',
              'autocomplete' => 'off'
               ));
     ?>	
  
  
  </div>
  <div class="col">
  <?= $this->Form->control('cliente',  ['id'=>'cliente','type' => 'select', 'options' => ['todos' => 'Todos', 'pioneer' => 'PIONEER', 'toho' => 'TOHO', 'ekabel' => 'EKABEL'],  'class' => 'form-control input-lg']); ?>
  </div>
  <div class="col">
  <?= $this->Form->control('facturado',  ['id'=>'facturado','label' => 'Facturación', 'type' => 'select', 'options' => ['todos' => 'Todos', 'facturado' => 'Facturado', 'pendientes' => 'Pendientes'],  'class' => 'form-control input-lg']);?>
  </div>
  <div class="col" style="margin-top:24px">
  <button class="btn btn-lg btn-primary btn-block " ><i class="fas fa-search"></i> Buscar</button>
  </div>
</div>

<br>

   
    <?php echo $this->Form->end();?>
    

    
    <br>
    
    <table id="tableorbis" class="table table-hover responsive"  style="font-size: 12px; width: 100% ">
        <thead class="thead-dark" >
            <tr>
               
                <th scope="col">Colocación</th>
                <th scope="col">Caja</th>
                <th scope="col">Linea</th>
                <th scope="col">Cliente</th>
                <th scope="col">Nº Factura</th>
                <th scope="col">Pago</th>
                <th scope="col">Cheque</th>
                <th scope="col">Envio</th>
                <th scope="col">Importe Pesos</th>
                <th scope="col">Importe Dolares</th>
                <th scope="col">Importe Total</th>
                <th scope="col">Utilidad</th>
                
               
                
               
            </tr>
        </thead>
        <tbody>
        <?php  $orbisUtilidad3=0;?>
            <?php foreach ($colocacion as $colocacion2): ?>
                
            <tr>

            
            <?php 
               $coloc2 = date("d-m-Y", strtotime($colocacion2->colocacion)); 
               if(($colocacion2->orbisEnvio)==null){
                $orbisEnvio=null;
                }else{$orbisEnvio = date("d-m-Y", strtotime($colocacion2->orbisEnvio));}
                if(($colocacion2->orbisPago)==null){
                    $orbisPago=null;
                    }else{$orbisPago = date("d-m-Y", strtotime($colocacion2->orbisPago));}
                
               
                 if (($colocacion2->orbisDolares!=null)and($colocacion2->orbisCotizacion!=null)){
                    
                     if(($colocacion2->transImportePesos!=null)and($colocacion2->transferImportePesos!=null)){

                        $orbisDolares=floatval($colocacion2->orbisDolares);
                        $transImportePesos=floatval($colocacion2->transImportePesos);
                        $transferImportePesos=floatval($colocacion2->transferImportePesos);
                        $orbisCotizacion=floatval($colocacion2->orbisCotizacion);
                        $orbisUtilidad = $orbisDolares-(($transImportePesos/$orbisCotizacion)+($transferImportePesos/$orbisCotizacion));
                        
                     }  else if (($colocacion2->transImporteDolar!=null)and($colocacion2->transferImporteDolar!=null)){
                        
                        $orbisDolares=floatval($colocacion2->orbisDolares);
                        $transImporteDolar=floatval($colocacion2->transImporteDolar);
                        $transferImporteDolar=floatval($colocacion2->transferImporteDolar);
                        $orbisUtilidad = $orbisDolares-($transImporteDolar+$transferImporteDolar);    

                     } else if (($colocacion2->transImporteDolar!=null)and($colocacion2->transferImportePesos!=null)){
                        
                        $orbisDolares=floatval($colocacion2->orbisDolares);
                        $transImporteDolar=floatval($colocacion2->transImporteDolar);
                        $transferImportePesos=floatval($colocacion2->transferImportePesos);
                        $orbisCotizacion=floatval($colocacion2->orbisCotizacion);
                        $orbisUtilidad = $orbisDolares-($transImporteDolar+($transferImportePesos/$orbisCotizacion));

                    }else if (($colocacion2->transImportePesos!=null)and($colocacion2->transferImporteDolar!=null)){
                       
                        $orbisDolares=floatval($colocacion2->orbisDolares);
                        $transImportePesos=floatval($colocacion2->transImporteDolar);
                        $transferImporteDolar=floatval($colocacion2->transferImporteDolar);
                        $orbisCotizacion=floatval($colocacion2->orbisCotizacion);
                        $orbisUtilidad = $orbisDolares-(($transImportePesos/$orbisCotizacion)+$transferImporteDolar);

                    } else {

                        $orbisUtilidad = null;
                    }
                    
                 
                     

                 }else if (($colocacion2->orbisPeso!=null)and($colocacion2->orbisCotizacion!=null))
                 
                    {

                        if(($colocacion2->transImportePesos!=null)and($colocacion2->transferImportePesos!=null)){

                            $orbisPeso=floatval($colocacion2->orbisPeso);
                            $transImportePesos=floatval($colocacion2->transImportePesos);
                            $transferImportePesos=floatval($colocacion2->transferImportePesos);
                            $orbisCotizacion=floatval($colocacion2->orbisCotizacion);
                            $orbisUtilidad = ($orbisPeso/$orbisCotizacion)-(($transImportePesos/$orbisCotizacion)+($transferImportePesos/$orbisCotizacion));
                            
                         }  else if (($colocacion2->transImporteDolar!=null)and($colocacion2->transferImporteDolar!=null)){
                            
                            $orbisPeso=floatval($colocacion2->orbisPeso);
                            $transImporteDolar=floatval($colocacion2->transImporteDolar);
                            $transferImporteDolar=floatval($colocacion2->transferImporteDolar);
                            $orbisCotizacion=floatval($colocacion2->orbisCotizacion);
                            $orbisUtilidad = ($orbisPeso/$orbisCotizacion)-($transImporteDolar+$transferImporteDolar);    
    
                         } else if (($colocacion2->transImporteDolar!=null)and($colocacion2->transferImportePesos!=null)){
                            
                            $orbisPeso=floatval($colocacion2->orbisPeso);
                            $transImporteDolar=floatval($colocacion2->transImporteDolar);
                            $transferImportePesos=floatval($colocacion2->transferImportePesos);
                            $orbisCotizacion=floatval($colocacion2->orbisCotizacion);
                            $orbisUtilidad = ($orbisPeso/$orbisCotizacion)-($transImporteDolar+($transferImportePesos/$orbisCotizacion));
    
                        }else if (($colocacion2->transImportePesos!=null)and($colocacion2->transferImporteDolar!=null)){
                           
                            $orbisPeso=floatval($colocacion2->orbisPeso);
                            $transImportePesos=floatval($colocacion2->transImporteDolar);
                            $transferImporteDolar=floatval($colocacion2->transferImporteDolar);
                            $orbisCotizacion=floatval($colocacion2->orbisCotizacion);
                            $orbisUtilidad = ($orbisPeso/$orbisCotizacion)-(($transImportePesos/$orbisCotizacion)+$transferImporteDolar);
    
                        } else {
    
                            $orbisUtilidad = null;
                       }

                    }else {
                        $orbisUtilidad = null;
                    }
             
                     $orbisUtilidad3 = $orbisUtilidad3 + $orbisUtilidad;
               ?>
                <td><?= h($coloc2) ?></td>
                <td><?= h($colocacion2->caja) ?></td>
                <td><?= h($colocacion2->linea->name) ?></td>
                <td><?= h($colocacion2->cliente) ?>
                <td><?= h($colocacion2->orbisFactura) ?></td>
                <td><?= h($orbisPago) ?></td>
                <td><?= h($colocacion2->orbisCheque) ?></td>
                <td><?= h($orbisEnvio) ?></td>
                <td><?= h($colocacion2->orbisPeso) ?></td>
                <td><?= h($colocacion2->orbisDolares) ?></td>
                <td><?= h($colocacion2->orbisTotalFactura) ?></td>
                <td><?=  h(number_format($orbisUtilidad, 2 ,',', '.')) ?></td>
                
            </tr>
            <?php endforeach; ?>

        </tbody>
        <tfoot>
            <tr>
                <th>Desde:</th>
                <th><?php echo $inicio2; ?></th>
                <th></th>
                <th>Hasta:</th>
                <th><?php echo $final2; ?></th>
                <th></th>
                <th></th>
                <th>Total:</th>
                <th> $<?php echo number_format($total1, 2, ',', '.'); ?></th>
                <th>$<?php echo number_format($total2, 2, ',', '.'); ?></th>
                <th>$<?php echo number_format($total3, 2, ',', '.'); ?></th>
                <th>$<?php echo number_format($orbisUtilidad3, 2, ',', '.'); ?></th>
                
                
            </tr>
        </tfoot>
    </table>
            
    <?php
$paginator = $this->Paginator->setTemplates([
    'number'=>'<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
    'current'=>'<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
    'first'=>'<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
    'last'=>'<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
    'prevActive'=>'<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
    'nextActive'=>'<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>'
]);
?>



<script src="https://kit.fontawesome.com/838f8159c2.js" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" c></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>


<script>
$('#fechaInicio').datetimepicker({
	language: 'es',
	timepicker:false,
	format:'d-m-Y',
	formatDate:'d-m-Y',

});
$.datetimepicker.setLocale('es');

$('#fechaFinal').datetimepicker({
	language: 'es',
	timepicker:false,
	format:'d-m-Y',
	formatDate:'d-m-Y',

});
$.datetimepicker.setLocale('es');
</script>