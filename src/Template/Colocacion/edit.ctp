 
<?php echo $this->Html->script(array('addpo.js' ), array('inline'=>false)) ?>
<?php echo $this->Html->script(array('datatables.js' ), array('inline'=>false)) ?> 
<?php echo $this->Html->script(array('editcolocacion.js' ), array('inline'=>false)) ?>


<style>
  .modal-header {
    background:#0480be!important;
    color:white;
 }
 .dataTables_wrapper {
   margin:10px;
 }
</style>

     <div Class="col-md-12">
    	<div class="page-header">
      <div Class="row">
     <div class="col-md-1"></div>
     
     <div Class="col-md-10">
      <div  Class="container-panel">
        
    		<h3 class="text-secondary">Editar Registro Colocación</h3>
        
        <div id="msg1"></div>
       
    	
      <br>

    
        
      <button  class="btn btn-md btn-primary" data-target="#Modalpo" data-toggle="modal"style="margin-right: 150px;"><i class="fas fa-search"></i> Cambiar P.O.</button>
      <?= $this->Form->create($colocacion) ?>
      <div id="resultpo"> <!-- contenedor de general po-->
          <div Class="row">
            <div class="col-lg-4">
             <?php
                
                echo $this->Form->control('pickup', [ 'id'=>'pickup', 'readonly'=>true, 'style'=>'background-color:white','label' => 'Pickup', 'class' => 'form-control input-lg']);
                echo $this->Form->control('idgeneral', [ 'id'=>'idgeneral', 'value'=>$colocacion->id_general,  'type' => 'hidden', 'label' => 'id', 'class' => 'form-control input-lg']);
                ?>
                </div>

                <div class="col-lg-4">
             <?php
                 echo $this->Form->control('cliente', ['id'=>'cliente', 'readonly'=>true, 'style'=>'background-color:white','label' => 'Cliente', 'class' => 'form-control input-lg']);
                ?>
                </div>
                <div class="col-lg-4">
             <?php
                echo $this->Form->control('entrega', [ 'id'=>'entrega', 'readonly'=>true, 'style'=>'background-color:white', 'label' => 'Agencia', 'class' => 'form-control input-lg']);
                ?>
                </div>
          </div>
          </div>


     <div Class="row">
            <div class="col-lg-4">
            <?php   
                   $originalDate = $colocacion->colocacion;
                   $newDate = date("d-m-Y", strtotime($originalDate));
                   echo $this->Form->control('colocacion', array(
                     'class' => 'form-control datepicker-here',
                     'label' => 'Fecha de Colocacion',
                     'id' => 'colocacion',
                     'type' => 'Text',
                     'value' => $newDate,
                     'data-language' => 'es',
                     'data-date-format' => 'dd-mm-yyyy',
                     'empty'=>'empty',
                     'autocomplete'=>'off'
                      ));
                
                ?>
                </div>

                <div class="col-lg-4">
             <?php
                 echo $this->Form->control('caja', ['id'=>'caja', 'onkeyup'=>'javascript:this.value=this.value.toUpperCase();','label' => 'Caja', 'class' => 'form-control input-lg']);
                ?>
                </div>
                <div class="col-lg-4">
               
              <?= $this->Form->control('linea_id',  ['id'=>'linea','type' => 'select', 'options' => $oplinea,  'class' => 'form-control input-lg']); ?> </th>
                </div>
        </div> 
        
       
        
          
            <div Class="row">
            <div class="col-lg-4">
             <?php
                
                echo $this->Form->control('poanexo', ['id'=>'poanexo', 'onkeyup'=>'javascript:this.value=this.value.toUpperCase();', 'label' => 'Po Anexo', 'class' => 'form-control input-lg']);
  
               
                echo $this->Form->control('transfer_id',  ['id'=>'transfer','label' => 'Transfer', 'type' => 'select', 'options' => $optransfer,  'class' => 'form-control input-lg']); 
                
                echo $this->Form->control('estatus_id',  ['id'=>'estatus','label' => 'Estatus', 'type' => 'select', 'options' => $opestatus,  'class' => 'form-control input-lg']);
                ?>
                </div>

                <div class="col-lg-4">
             <?php
                   if(($colocacion->trasbordo)==null){
                    $trasbordo2=null;
                    }else{$trasbordo2 = date("d-m-Y", strtotime($colocacion->trasbordo));}
                
                 echo $this->Form->control('trasbordo', array(
                    'class' => 'form-control datepicker-here', 
                    'label' => 'Fecha de Trasbordo',
                    'value' => $trasbordo2,
                    'id' => 'trasbordo',
                    'type' => 'Text',
                    'data-language' => 'es',
                    'data-date-format' => 'dd-mm-yyyy',
                    'empty'=>'empty',
                    'autocomplete'=>'off'
                     ));
                      
                     
                     if(($colocacion->importacion)==null){
                      $importacion2=null;
                      }else{$importacion2 = date("d-m-Y", strtotime($colocacion->importacion));}
                     echo $this->Form->control('importacion', array(
                        'class' => 'form-control datepicker-here', 
                        'label' => 'Fecha de Importación',
                        'id' => 'importacion',
                        'type' => 'Text',
                        'value' => $importacion2,
                        'data-language' => 'es',
                        'data-date-format' => 'dd-mm-yyyy',
                        'empty'=>'empty',
                        'autocomplete'=>'off'
                         ));

                          if(($colocacion->despacho)==null){
                          $despacho2=null;
                          }else{$despacho2 = date("d-m-Y", strtotime($colocacion->despacho));}
                         echo $this->Form->control('despacho', array(
                         'class' => 'form-control datepicker-here', 
                         'label' => 'Fecha de despacho',
                         'id' => 'despacho',
                         'type' => 'Text',
                         'value' => $despacho2,
                         'data-language' => 'es',
                         'data-date-format' => 'dd-mm-yyyy',
                         'empty'=>'empty',
                         'autocomplete'=>'off'
                           ));    

                
                echo $this->Form->control('ide', [ 'id'=>'id1', 'value'=>$colocacion->id,  'type' => 'hidden', 'label' => 'id', 'class' => 'form-control input-lg']);
                
                ?>
                </div>
                <div class="col-lg-4">
             <?php
                 

                  if(($colocacion->entregada)==null){
                    $entregada2=null;
                    }else{$entregada2 = date("d-m-Y", strtotime($colocacion->entregada));}

                  echo $this->Form->control('entregada', array(
                    'class' => 'form-control datepicker-here', 
                    'label' => 'Fecha de Entrega A.A.',
                    'id' => 'entregada',
                    'type' => 'Text',
                    'value' => $entregada2,
                    'data-language' => 'es',
                    'data-date-format' => 'dd-mm-yyyy',
                    'empty'=>'empty',
                    'autocomplete'=>'off'
                     ));
                     if(($colocacion->cruce)==null){
                      $cruce2=null;
                      }else{$cruce2 = date("d-m-Y", strtotime($colocacion->cruce));}
                     echo $this->Form->control('cruce', array(
                        'class' => 'form-control datepicker-here', 
                        'label' => 'Fecha de Cruce',
                        'id' => 'cruce',
                        'type' => 'Text',
                        'value' => $cruce2,
                        'data-language' => 'es',
                        'data-date-format' => 'dd-mm-yyyy',
                        'empty'=>'empty',
                        'autocomplete'=>'off'
                         ));
                         if(($colocacion->descargada)==null){
                          $descargada2=null;
                          }else{$descargada2 = date("d-m-Y", strtotime($colocacion->descargada));}
                         echo $this->Form->control('descargada', array(
                        'class' => 'form-control datepicker-here', 
                        'label' => 'Fecha de descarga',
                        'id' => 'descargada',
                        'type' => 'Text',
                        'value' => $descargada2,
                        'data-language' => 'es',
                        'data-date-format' => 'dd-mm-yyyy',
                        'empty'=>'empty',
                        'autocomplete'=>'off'
                            ));  
                ?>
                </div>
          </div>


            <hr>
                <div class="row">
                <div class="col-lg-4">
                <button class="btn btn-lg btn-primary btn-block editcolocacion" ><i class="fas fa-save"></i> Actualizar</button>
           
                </div>
                <div class="col-lg-4">
                
                <?= $this->Fa->link('chevron-circle-left', __('Volver'), ['controller' =>'Colocacion', 'action' => 'index'], ['class' => 'btn btn-lg btn-primary btn-block'], ['before' => 'true'])?>
                </div>
                </div>
                
            </div>

            </div>
             
<?= $this->Form->end() ?>
<div class="col-md-1"></div>
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
      
      <div class="container" id="contenedor-clientes">
      <div class="table" style="text-align:center; font-size: 15px;">
      <div id="msg1"></div>
   
    <table id="tablemodal" class="table  table-hover responsive" cellspacing="0" width="100%">
        <thead>
            <tr>
                
                <th scope="col" style="text-align:center; font-size: 15px;"><?= $this->Paginator->sort('Pick Up') ?></th>
                <th scope="col" style="text-align:center; font-size: 15px;"><?= $this->Paginator->sort('Cliente') ?></th>
                <th scope="col" style="text-align:center; font-size: 15px;"><?= $this->Paginator->sort('Entrega') ?></th>
               
                <th scope="col" class="actions" style="text-align:center; font-size: 15px;"><?= __('Agregar') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($general as $general2): ?>
            <tr>
                
                
                <td><?= h($general2->pickup) ?></td>
                <td><?= h($general2->client) ?></td>
                <td><?= h($general2->entrega) ?></td>
               
                
                
                <td class="Acciones">
                <?=  $this->Form->button('agregar', array(
                'type' => 'button',
                'class' => 'btn btn-primary btn-md addpo',
                 'id' =>$general2->id,
                 'pickup' =>$general2->pickup,
                 'cliente' =>$general2->client,
                 'entrega' =>$general2->entrega,
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
 

<!-- fin Modal -->



<script src="https://kit.fontawesome.com/838f8159c2.js" crossorigin="anonymous"></script>
<script>
$('#trasbordo').datetimepicker({
	language: 'es',
	timepicker:false,
	format:'d-m-Y',
	formatDate:'d-m-Y',

});
$.datetimepicker.setLocale('es');

$('#importacion').datetimepicker({
	language: 'es',
	timepicker:false,
	format:'d-m-Y',
	formatDate:'d-m-Y',

});

$('#entregada').datetimepicker({
	language: 'es',
	timepicker:false,
	format:'d-m-Y',
	formatDate:'d-m-Y',

});
$.datetimepicker.setLocale('es');
$('#cruce').datetimepicker({
	language: 'es',
	timepicker:false,
	format:'d-m-Y',
	formatDate:'d-m-Y',

});
$.datetimepicker.setLocale('es');
$('#colocacion').datetimepicker({
	language: 'es',
	timepicker:false,
	format:'d-m-Y',
  formatDate:'d-m-Y',

});
$.datetimepicker.setLocale('es');
$('#despacho').datetimepicker({
	language: 'es',
	timepicker:false,
	format:'d-m-Y',
	formatDate:'d-m-Y',

});
$.datetimepicker.setLocale('es');
$('#descargada').datetimepicker({
	language: 'es',
	timepicker:false,
	format:'d-m-Y',
	formatDate:'d-m-Y',

});
$.datetimepicker.setLocale('es');
</script>