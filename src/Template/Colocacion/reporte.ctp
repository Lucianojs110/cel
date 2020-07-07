<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */

?>

<?php echo $this->Html->script(array('datatables.js' ), array('inline'=>false)) ?>

<?php echo $this->Html->css('style.css'); ?>



<div  Class="container-panel">

<h3 class="text-secondary"><?= __('Reporte de Colocación') ?></h3>
<br>
<?= $this->Form->create('colocacion',['type'=>'get'])  ?>	
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
  <?= $this->Form->control('estatus',  ['id'=>'estatus','label' => 'Estatus', 'type' => 'select', 'options' => $opestatus,  'class' => 'form-control input-lg']);?>
  </div>
  <div class="col" style="margin-top:24px">
  <button class="btn btn-lg btn-primary btn-block " ><i class="fas fa-search"></i> Buscar</button>
  </div>
</div>

<br>

   
    <?php echo $this->Form->end();?>
    

    
    <br>
    
    <table id="table5" class="table table-hover responsive"  style="font-size: 12px; width: 100% ">
        <thead class="thead-dark" >
            <tr>
               
                <th scope="col">Colocación</th>
                <th scope="col">Caja</th>
                <th scope="col">Linea</th>
                <th scope="col">Pickup</th>
                <th scope="col">Cliente</th>
                <th scope="col">Entrega</th>
                <th scope="col">PoAnexo</th>
                <th scope="col">Trasbordo</th>
                <th scope="col">Entregada</th>
                <th scope="col">Cruce</th>
                <th scope="col">Transfer</th>
                <th scope="col">Estatus</th>
                
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($colocacion as $colocacion2): ?>
                
            <tr>
            <?php 
               $coloc2 = date("d-m-Y", strtotime($colocacion2->colocacion)); 
               if(($colocacion2->trasbordo)==null){
                $trasbordo=null;
                }else{$trasbordo = date("d-m-Y", strtotime($colocacion2->trasbordo));}
                if(($colocacion2->entregada)==null){
                    $entregada=null;
                    }else{$entregada = date("d-m-Y", strtotime($colocacion2->entregada));}
                if(($colocacion2->cruce)==null){
                    $cruce=null;
                    }else{$cruce = date("d-m-Y", strtotime($colocacion2->cruce));}
               ?>
                <td><?= h($coloc2) ?></td>
                <td><?= h($colocacion2->caja) ?></td>
                <td><?= h($colocacion2->linea->name) ?></td>
                <td><?= h($colocacion2->pickup) ?></td>
                <td><?= h($colocacion2->cliente) ?></td>
                <td><?= h($colocacion2->entrega) ?></td>
                <td><?= h($colocacion2->poanexo) ?></td>
                <td><?= h($trasbordo) ?></td>
                <td><?= h($entregada) ?></td>
                <td><?= h($cruce) ?></td>
                <td><?= h($colocacion2->transfer->name) ?></td>
                <?php if($colocacion2->estatus->name=="DESCARGADA"){
                    echo "<td style='background-color:#4DDF35; color:white'>".$colocacion2->estatus->name."</td>";
                }else{
                    echo "<td>".$colocacion2->estatus->name."</td>";
                } ?>
              
            </tr>
            <?php endforeach; ?>
        </tbody>
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