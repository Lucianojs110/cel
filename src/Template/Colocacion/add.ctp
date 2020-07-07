



<?php echo $this->Html->script(array('addpo.js' ), array('inline'=>false)) ?>
<?php echo $this->Html->script(array('datatables.js' ), array('inline'=>false)) ?> 
<?php echo $this->Html->script(array('addcolocacion.js' ), array('inline'=>false)) ?> 


<?php

  echo $this->Html->css('style');
?>

<style>
  .modal-header {
    background:#0480be!important;
    color:white;
 }
 .dataTables_wrapper {
   margin:10px;
 }
</style>





<?php 
date_default_timezone_set("America/Mexico_City");
?>
<div Class="row">
     <div class="col-md-3"></div>
     
     <div Class="col-md-6">
<div  Class="container-panel" >
<div Class="col-md-12">
    	<div class="page-header">
        
    		<h3 class="text-secondary">Crear colocación </h3>
       <br>
        <button  class="btn btn-md btn-primary" data-target="#Modalpo" data-toggle="modal" style="margin-right: 150px; margin-bottom: 10px"><i class="fas fa-search"></i> Buscar P.O.</button>
      </div>
      
    
      <div id="loading" style="display:none; text-align: center">
          <?php echo $this->Html->link($this->Html->image('loading.gif',
             array('width' => '500px', 'height' => '20px')) ,
                   '#today',array('escape' => false));?>
         </div>
        <div id="msg1"></div>
        
     <div Class="row">
               <div class="col-lg-4">
                
               <?php 
               echo $this->Form->control('Fecha de colocacion', array(
              'class' => 'form-control datepicker-here', 
              'label' => 'Fecha de colocación',
              'id' => 'colocacion',
              'type' => 'Text',
              'data-language' => 'es',
              'data-date-format' => 'dd-mm-yyyy',
              'value' => date('d-m-Y'),
              'empty'=>'empty',
              'autocomplete' => 'off'
               ));
                ?>	
           
                </div>
               
                <div class="col-lg-4">
             <?php
                 echo $this->Form->control('caja', ['id'=>'caja', 'onkeyup'=>'javascript:this.value=this.value.toUpperCase();', 'label' => 'Caja', 'class' => 'form-control input-lg']);
                ?>
                </div>
                <div class="col-lg-4">
             
              <?=  $this->Form->control('linea', ['id'=>'linea', 'type' => 'select', 'options' => $oplinea,'label' => 'Linea', 'class' => 'form-control input-lg']); ?> </th>
                </div>
        </div>
   
          
        
          

          <div id="container"> 
          <div id="resultpo"> <!-- contenedor de general po-->
         </div>
         </div>
        
            <hr>
                <div class="row">
                <div class="col-lg-4">
                <button class="btn btn-lg btn-primary btn-block addcolocacion" > Guardar</button>
                
                </div>
                <div class="col-lg-4">
                
                <?= $this->Fa->link('chevron-circle-left', __('Volver'), ['controller' =>'Colocacion', 'action' => 'index'], ['class' => 'btn btn-lg btn-primary btn-block'], ['before' => 'true'])?>
                </div>
            </div>


            <!-- Modal GENERAL-->


<div class="modal fade" id="Modalpo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Registro P.O.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="container" >
      <div class="table">
      
   
    <table id="tablemodal" style="text-align:center" class="table table-hover responsive" cellspacing="0" width="100%">
        <thead >
            <tr>
                
                <th scope="col" style="text-align:center; font-size: 15px;"><?= $this->Paginator->sort('Pick Up') ?></th>
                <th scope="col" style="text-align:center; font-size: 15px;"><?= $this->Paginator->sort('Cliente') ?></th>
                <th scope="col" style="text-align:center; font-size: 15px;"><?= $this->Paginator->sort('Entrega') ?></th>
                <th scope="col" class="actions" style="text-align:center; font-size: 15px;"><?= __('Agregar') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($general as $general3): ?>
            <tr>
                
                
                <td><?= h($general3->pickup) ?></td>
                <td><?= h($general3->client) ?></td>
                <td><?= h($general3->entrega) ?></td>
               
                
                
                <td class="Acciones">
                <?=  $this->Form->button('agregar', array(
                'type' => 'button',
                'class' => 'btn btn-primary btn-md addpo',
                 'id' =>$general3->id,
                 'pickup' =>$general3->pickup,
                 'cliente' =>$general3->client,
                 'entrega' =>$general3->entrega,
                 'escape' => false
           )); ?>
                
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
          </table>
  
</div>
     
        </div>
      </div>
    </div>
  </div>
 
  <div class="col-md-3"></div>
        </div>
    </div>
<!-- fin Modal -->



<script src="https://kit.fontawesome.com/838f8159c2.js" crossorigin="anonymous"></script>
<script>
$('#colocacion').datetimepicker({
	language: 'es',
	timepicker:false,
	format:'d-m-Y',
	formatDate:'d-m-Y',

});
$.datetimepicker.setLocale('es');
</script>