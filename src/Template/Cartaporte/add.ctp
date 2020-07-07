
<?php echo $this->Html->script(array('autocomplete.js' ), array('inline'=>false)) ?>
<?php echo $this->Html->script(array('addremitente.js' ), array('inline'=>false)) ?>
<?php echo $this->Html->script(array('adddestinatario.js' ), array('inline'=>false)) ?>
<?php echo $this->Html->script(array('addoperador.js' ), array('inline'=>false)) ?>
<?php echo $this->Html->script(array('addremolque.js' ), array('inline'=>false)) ?>
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



<div Class="row">
     <div class="col-md-1"></div>
     
     <div Class="col-md-12">
<div  Class="container-panel">
<div Class="col-md-12">

    	<div class="page-header">
      
    		<h3 class="text-secondary">Nueva Carta Porte</h3>
            <?= $this->Fa->link('chevron-circle-left', __('Volver'), ['controller' =>'cartaporte', 'action' => 'index'], ['class' => 'btn btn-sm btn-primary '], ['before' => true])?>
            <button  class="btn btn-sm btn-primary" data-target="#Modalrem" data-toggle="modal" ><i class="fas fa-plus-square"></i> Remitentes</button>
            <button  class="btn btn-sm btn-primary" data-target="#Modaldes" data-toggle="modal" ><i class="fas fa-plus-square"></i> Destinatarios</button>
            <button  class="btn btn-sm btn-primary" data-target="#Modalop" data-toggle="modal" ><i class="fas fa-plus-square"></i> Operadores</button>
            <button  class="btn btn-sm btn-primary" data-target="#Modalremolque" data-toggle="modal" ><i class="fas fa-plus-square"></i> Remolques</button>
    	</div>
      <br>
     <?= $this->Form->create($cartaporte) ?>
     
     <h5 class="text-secondary">Expedición:</h5>
    
     <div Class="row">

                <div class="col-lg-3">
                <?php  echo $this->Form->control('lugarExp', ['value' =>'Nuevo Laredo','label' => 'Lugar:', 'class' => 'form-control input-lg']);  ?>
                </div>
                <div class="col-lg-2">
                <?php  echo $this->Form->control('fechaExp', ['value' => date('d-m-Y'),
              'empty'=>'empty',
              'autocomplete' => 'off', 'data-date-format' => 'dd-mm-yyyy', 
              'id' => 'fechaExp','type'=>'text', 'label' => 'Fecha: ', 'class' => 'form-control']); ?>
                </div>
        </div>
       
        <hr>
    
     <div Class="row">
    
                <div class="col-lg-3">
            
               <?php echo $this->Form->control('remitente', ['label' => 'Remitente:', 'class' => 'form-control input-lg']); ?>
               
                </div>
                <div class="col-lg-3">
                <?php echo $this->Form->control('origen', ['label' => 'Origen:', 'class' => 'form-control input-lg']); ?>
                </div>
                <div class="col-lg-2">
                <?php echo $this->Form->control('rfcrem', ['label' => 'RFC:', 'class' => 'form-control input-lg']);?>
                </div>
                <div class="col-lg-2">
                <?php echo $this->Form->control('domiciliorem', ['label' => 'Domicilio:', 'class' => 'form-control input-lg']);?>
                </div>
                <div class="col-lg-2">
                <?php echo $this->Form->control('lugarrecogida', ['label' => 'Se recoge en:', 'class' => 'form-control input-lg']);?>
                </div>
     </div>
     <div Class="row">
    
                <div class="col-lg-3">
                <?php echo $this->Form->control('destinatario', ['label' => 'Destinatario:', 'class' => 'form-control input-lg']);?>
                </div>
                <div class="col-lg-3">
                <?php echo $this->Form->control('destino', ['label' => 'Destino:', 'class' => 'form-control input-lg']); ?>
                </div>
                <div class="col-lg-2">
                <?php echo $this->Form->control('rfcdes', ['label' => 'RFC:', 'class' => 'form-control input-lg']);?>
                </div>
                <div class="col-lg-2">
                <?php echo $this->Form->control('patiodestino', ['label' => 'Patio Destino:', 'class' => 'form-control input-lg']);?>
                </div>
                <div class="col-lg-2">
                <?php echo $this->Form->control('lugarentrega', ['label' => 'Se entrega en:', 'class' => 'form-control input-lg']);?>
                </div>
    </div>
    <hr>
    <div Class="row">
                <div class="col-lg-4">
                <?php  echo $this->Form->control('valorUnitario', ['value'=>'Cuota convenida','label' => 'Valor Unitario por tonelada o fracción:', 'class' => 'form-control input-lg']);  ?>
                </div>
                <div class="col-lg-4">
                <?php echo $this->Form->control('valorDeclarado', ['value'=>'No declarado', 'label' => 'Valor Declarado:', 'class' => 'form-control input-lg']); ?>
                </div>
                <div class="col-lg-2">
                <?php echo $this->Form->control('pesoDeclarado', ['value'=>'1', 'type'=>'number','label' => 'Peso Declarado:', 'class' => 'form-control input-lg']); ?>
                </div>
        </div>
<hr>
    <div Class="row">
      
                <div class="col-lg-1">
                <?php echo $this->Form->control('cantidad', ['value'=>'1', 'type'=>'number','label' => 'Cantidad:', 'class' => 'form-control input-lg']); ?>
                </div>
                <div class="col-lg-4">
                <?php echo $this->Form->control('contenido', ['label' => 'Contenido:', 'class' => 'form-control input-lg']); ?>
                </div>
                <div class="col-lg-1">
                <?php echo $this->Form->control('totalFlete', ['value'=>'1.00', 'type'=>'number', 'step'=>'.01','label' => 'Total:', 'class' => 'form-control input-lg']); ?>
                </div>
                <div class="col-lg-1">
                <?php echo $this->Form->control('seguro', ['value'=>'0.00', 'type'=>'number','label' => 'Seguro:', 'class' => 'form-control input-lg']); ?>
                </div>
                <div class="col-lg-1">
                <?php echo $this->Form->control('otros', ['value'=>'0.00', 'type'=>'number','label' => 'Otros:', 'class' => 'form-control input-lg']); ?>
                </div>
                <div class="col-lg-1">
                <?php echo $this->Form->control('importe', ['value'=>'1.00', 'type'=>'number','label' => 'Importe:', 'class' => 'form-control input-lg']); ?>
                </div>
                <div class="col-lg-1">
                <?php echo $this->Form->control('iva', ['value'=>'0.16', 'type'=>'number','label' => 'IVA 16%:', 'class' => 'form-control input-lg']); ?>
                </div>
                <div class="col-lg-1">
                <?php echo $this->Form->control('retIva', ['value'=>'0.04', 'type'=>'number','label' => 'Ret. 4%:', 'class' => 'form-control input-lg']); ?>
                </div>
                <div class="col-lg-1">
                <?php echo $this->Form->control('neto', ['value'=>'1.12', 'type'=>'number','label' => 'Neto:', 'class' => 'form-control input-lg']); ?>
                </div>
   
    </div>
    <hr>
    <h5 class="text-secondary">Observaciones:</h5>
    <div Class="row">
                <div class="col-lg-2">
                <?php echo $this->Form->control('contacto', ['label' => 'Contacto:', 'class' => 'form-control input-lg']); ?>
                </div>
                
                <div class="col-lg-2">
                <?php echo $this->Form->control('impoExpo', ['label' => 'impo/expo:', 'class' => 'form-control input-lg']);?>
                </div>
                <div class="col-lg-2">
                <?php echo $this->Form->control('agenciaAduanal', ['label' => 'Agencia Aduanal:', 'class' => 'form-control input-lg']);?>
                </div>
                <div class="col-lg-2">
                <?php
               
                 echo $this->Form->control('cita', [ 'type'=>'text', 'label' => 'Cita', 
                 'data-language' => 'en',
                    'data-date-format' => 'dd-mm-yyyy h:mm',
                    'empty'=>'empty',
                    
                    'autocomplete' => 'off',
                 'class' => 'form-control']);
                 ?>
                </div>
                <div class="col-lg-2">
                <?php echo $this->Form->control('pedimento', ['label' => 'Pedimento:', 'class' => 'form-control input-lg']);?>
                </div>
                <div class="col-lg-2">
                <?php echo $this->Form->control('referencia', ['label' => 'Referencia:', 'class' => 'form-control input-lg']);?>
                </div>
    </div>

    <hr>
    <div Class="row">
                <div class="col-lg-3">
                <?php echo $this->Form->control('operador', [ 'label' => 'Operador:', 'class' => 'form-control input-lg']);?>
                </div>            
                <div class="col-lg-3">
                <?php echo $this->Form->control('unidad', ['label' => 'Unidad:', 'class' => 'form-control input-lg']); ?>
                </div>
                <div class="col-lg-2">
                <?php echo $this->Form->control('tractorplacas', ['label' => 'Placas Tractor:', 'class' => 'form-control input-lg']);?>
                </div>
                <div class="col-lg-2">
                <?php echo $this->Form->control('remolque', [ 'label' => 'Remolque:', 'class' => 'form-control input-lg']);?>
                </div>
                <div class="col-lg-2">
                <?php echo $this->Form->control('remolqueplacas', ['label' => 'Placas Remolque:', 'class' => 'form-control input-lg']);?>
                </div>
                
    </div>


            <hr>
                <div class="row">
                <div class="col-lg-4">
            <?= $this->Form->button('Guardar', ['class' => 'btn btn-lg btn-primary btn-block']) ?>
            <?= $this->Form->end() ?>
                </div>

                <div class="col-lg-4">
         
            
                </div>
                </div>

                
           
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

            <!-- Modal REMITENTE-->


    <div class="modal fade" id="Modalrem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-md" role="document">
     <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Remitentes</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
      
   <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="add" role="tabpanel" aria-labelledby="add-tab">
      
      <div class="container" style="padding:4%" >
      <div id="msg1"></div>
    
      <?= $this->Form->control('remitente2', ['class' => 'form-control input-lg','label' => 'Remitente:']);?>
      <?= $this->Form->control('rfc', ['class' => 'form-control input-lg','label' => 'RFC:']);?>
      <?= $this->Form->control('origen2', ['class' => 'form-control input-lg','label' => 'Origen:']);?>
      <?= $this->Form->control('domicilio', ['class' => 'form-control input-lg','label' => 'Domicilio:']);?>
      <?= $this->Form->control('recogida', ['class' => 'form-control input-lg','label' => 'Se recoge en:']);?>
       <br>
       <?= $this->Form->button('Guardar', ['class' => 'btn btn-lg btn-primary btn-block addremitente']) ?>
       
      
       </div> 
       </div> 
       
       
      
     
     
     
     
      
        </div>
      </div>
    </div>
  </div>
 
    </div>
<!-- fin Modal -->



            <!-- Modal Destinatario-->

    <div class="modal fade" id="Modaldes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Destinatarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="container" style="padding:4%" >
      <div id="msg2"></div>
    
      <?= $this->Form->control('destinatario2', ['class' => 'form-control input-lg','label' => 'Destinatario:']);?>
      <?= $this->Form->control('rfcdes2', ['class' => 'form-control input-lg','label' => 'RFC:']);?>
      <?= $this->Form->control('destino2', ['class' => 'form-control input-lg','label' => 'Destino:']);?>
      <?= $this->Form->control('domiciliodes', ['class' => 'form-control input-lg','label' => 'Domicilio:']);?>
      <?= $this->Form->control('entrega2', ['class' => 'form-control input-lg','label' => 'Se entrega en:']);?>
       <br>
       <?= $this->Form->button('Guardar', ['class' => 'btn btn-lg btn-primary btn-block adddestinatario']) ?>
       
     </div>
     
        </div>
      </div>
    </div>
  </div>
 
  <div class="col-md-3"></div>
        </div>
    </div>
<!-- fin Modal -->



            <!-- Modal operadores-->

            <div class="modal fade" id="Modalop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Operadores</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="container" style="padding:4%" >
      <div id="msg3"></div>
    
      <?= $this->Form->control('operador2', ['class' => 'form-control input-lg','label' => 'Operador:']);?>
      <?= $this->Form->control('unidad2', ['class' => 'form-control input-lg','label' => 'Unidad:']);?>
      <?= $this->Form->control('placatractor2', ['class' => 'form-control input-lg','label' => 'Placa Tractor:']);?>
      <?= $this->Form->control('permisionario', ['class' => 'form-control input-lg','label' => 'Permisionario:']);?>
      
       <br>
       <?= $this->Form->button('Guardar', ['class' => 'btn btn-lg btn-primary btn-block addoperador']) ?>
       
     </div>
     
        </div>
      </div>
    </div>
  </div>
 
  <div class="col-md-3"></div>
        </div>
    </div>
<!-- fin Modal -->

    <!-- Modal remolque-->

      <div class="modal fade" id="Modalremolque" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remolques</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="container" style="padding:4%" >
      <div id="msg4"></div>
    
      <?= $this->Form->control('remolque2', ['class' => 'form-control input-lg','label' => 'Remolque:']);?>
      <?= $this->Form->control('placaremolque2', ['class' => 'form-control input-lg','label' => 'Placa Remolque:']);?>
      
      
       <br>
       <?= $this->Form->button('Guardar', ['class' => 'btn btn-lg btn-primary btn-block addremolque']) ?>
       
     </div>
     
        </div>
      </div>
    </div>
  </div>
 
  <div class="col-md-3"></div>
        </div>
    </div>
<!-- fin Modal -->
    
    <script>
     
 
        
        $.datetimepicker.setLocale('es');
          $('#cita').datetimepicker({
	        language: 'es',
	        timepicker:true,
	        format:'d-m-Y h:i',
           
            formatDate:'d-m-Y h:i',
          });

        
          $('#fechaExp').datetimepicker({
	        language: 'es',
	        timepicker:false,
	        format:'d-m-Y',
            formatDate:'d-m-Y',
          });    

         
         

          
</script>
