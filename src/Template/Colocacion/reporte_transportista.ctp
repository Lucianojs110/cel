<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */

?>

<?php echo $this->Html->script(array('datatables.js' ), array('inline'=>false)) ?>

<?php echo $this->Html->css('style.css'); ?>



<div  Class="container-panel">

<h3 class="text-secondary"><?= __('Reporte facturación transportista') ?></h3>
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
  <?= $this->Form->control('linea',  ['id'=>'linea','type' => 'select', 'options' => $oplinea,  'class' => 'form-control input-lg']); ?>
  </div>
  <div class="col">
  <?= $this->Form->control('pago',  ['id'=>'pago','label' => 'Pago', 'type' => 'select', 'options' => ['todos' => 'Todos', 'pagados' => 'Pagados', 'pendientes' => 'Pendientes'],  'class' => 'form-control input-lg']);?>
  </div>
  <div class="col" style="margin-top:24px">
  <button class="btn btn-lg btn-primary btn-block " ><i class="fas fa-search"></i> Buscar</button>
  </div>
</div>

<br>

   
    <?php echo $this->Form->end();?>
    

    
    <br>
    
    <table id="tabletrans" class="table table-hover responsive"  style="font-size: 12px; width: 100% ">
        <thead class="thead-dark" >
            <tr>
               
                <th scope="col">Colocación</th>
                <th scope="col">Caja</th>
                <th scope="col">Linea</th>
                <th scope="col">Nº Factura</th>
                <th scope="col">Recepción</th>
                <th scope="col">Pago</th>
                <th scope="col">Cheque</th>
                <th scope="col">Importe Pesos</th>
                <th scope="col">Importe Dolares</th>
                
                
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($colocacion as $colocacion2): ?>
                
            <tr>
            <?php 
               $coloc2 = date("d-m-Y", strtotime($colocacion2->colocacion)); 
               if(($colocacion2->transRecepcion)==null){
                $transRecepcion=null;
                }else{$transRecepcion = date("d-m-Y", strtotime($colocacion2->transRecepcion));}
                if(($colocacion2->transPago)==null){
                    $transPago=null;
                    }else{$transPago = date("d-m-Y", strtotime($colocacion2->transPago));}
                
               ?>
                <td><?= h($coloc2) ?></td>
                <td><?= h($colocacion2->caja) ?></td>
                <td><?= h($colocacion2->linea->name) ?></td>
                <td><?= h($colocacion2->transFactura) ?></td>
                <td><?= h($transRecepcion) ?></td>
                <td><?= h($transPago) ?></td>
                <td><?= h($colocacion2->transCheque) ?></td>
                <td><?= h($colocacion2->transImportePesos) ?></td>
                <td><?= h($colocacion2->transImporteDolar) ?></td>
                
                
            </tr>
            <?php endforeach; ?>

        </tbody>
        <tfoot>
            <tr>
                <th>Desde:</th>
                <th><?php echo $inicio2; ?></th>
                <th>Hasta:</th>
                <th><?php echo $final2; ?></th>
                <th></th>
                <th>Total:</th>
                <th>$<?php echo (number_format($total1, 2 ,',', '.')); ?></th>
                <th>$<?php echo (number_format($total2, 2 ,',', '.')); ?></th>
            
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