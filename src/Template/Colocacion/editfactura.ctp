<?php echo $this->Html->script(array('edittransportista.js' ), array('inline'=>false)) ?>
<?php echo $this->Html->script(array('edittransfer.js' ), array('inline'=>false)) ?>
<?php echo $this->Html->script(array('editorbis.js' ), array('inline'=>false)) ?>

 

 

 <div Class="row">
     <div class="col-md-3"></div>
     
     <div Class="col-md-6">
 <div  Class="container-panel">
<h3 class="text-secondary">Editar Factura </h3>
<h6 class="text-secondary">
CAJA: <?= $colocacion->caja ?>

<?php foreach ($general as $general2): ?>
ORIGEN: <?= $general2->origen ?>
<?php endforeach; ?>

</h6>
<?php $id=$colocacion->id;
$idsig=$id+1;
$idant=$id-1;
?>

<?= $this->Html->link(__('<< Listado'), ['controller' =>'Colocacion', 'action' => 'facturacion'], ['class' => 'btn btn-sm btn-primary']) ?>
<?= $this->Html->link(__('<< Anterior'), ['action' => 'editfactura', $idant], ['class' => 'btn btn-sm btn-primary']) ?>
<?= $this->Html->link(__('Siguiente >>'), ['action' => 'editfactura', $idsig], ['class' => 'btn btn-sm btn-primary']) ?>
<br>
<div id="loading" style="display:none; text-align: center">
          <?php echo $this->Html->link($this->Html->image('loading.gif',
             array('width' => '500px', 'height' => '20px')) ,
                   '#today',array('escape' => false));?>
         </div>
<br>
<div id="msg1"></div>



<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="transporte-tab" data-toggle="tab" href="#transporte" role="tab" aria-controls="transporte" aria-selected="true">Transporte</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="transfer-tab" data-toggle="tab" href="#transfer" role="tab" aria-controls="transfer" aria-selected="false">Transfer</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="orbis-tab" data-toggle="tab" href="#orbis" role="tab" aria-controls="orbis" aria-selected="false">Orbis</a>
  </li>
</ul>


<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="transporte" role="tabpanel" aria-labelledby="transporte-tab">
  <br>
  <!-- formulario Transportista-->

  
  <?= $this->Form->create($colocacion) ?>
  
  <div Class="row">
   <div class="col-lg-6">
     
     
     
     <?php
                echo $this->Form->control('transFactura', ['id'=>'transFactura','onkeyup'=>'javascript:this.value=this.value.toUpperCase();', 'class' => 'form-control input-lg','label' => 'Nº Factura:']);
                echo $this->Form->control('transImportePesos', ['id'=>'transImportePesos', 'type'=>'number','step'=>'0.10','class' => 'form-control input-lg','label' => 'Importe en Pesos:']);
               
            
                if(($colocacion->transRecepcion)==null){
                  $transRecepcion2=null;
                  }else{$transRecepcion2 = date("d-m-Y", strtotime($colocacion->transRecepcion));}
                  echo $this->Form->control('transRecepcion', array(
                    'class' => 'form-control datepicker-here', 
                    'label' => 'Fecha de Recepción:',
                    'id' => 'transRecepcion',
                    'type' => 'Text',
                    'data-language' => 'es',
                    'data-date-format' => 'dd-mm-yyyy',
                    'empty'=>'empty',
                    'value' => $transRecepcion2,
                    'autocomplete'=>'off'
                     ));
                     echo $this->Form->control('transCheque', ['id'=>'transCheque', 'onkeyup'=>'javascript:this.value=this.value.toUpperCase();','class' => 'form-control input-lg','label' => 'Cheque:']);
               
        ?>
    </div>
    <div class="col-lg-6">
             <?php
                  echo $this->Form->control('transportista', ['id'=>'transportista', 'readonly'=>true, 'style'=>'background-color:white','value'=>$colocacion->linea->name,'class' => 'form-control input-lg','label' => 'Transportista:']);
                  echo $this->Form->control('transImporteDolar', ['id'=>'transImporteDolar', 'type'=>'number','step'=>'0.10','class' => 'form-control input-lg','label' => 'Importe en Dolares:']);
                  if(($colocacion->transPago)==null){
                    $transPago2=null;
                    }else{$transPago2 = date("d-m-Y", strtotime($colocacion->transPago));}
                  echo $this->Form->control('transPago', array(
                    'class' => 'form-control datepicker-here', 
                    'label' => 'Fecha de Pago:',
                    'id' => 'transPago',
                    'type' => 'Text',
                    'data-language' => 'es',
                    'data-date-format' => 'dd-mm-yyyy',
                    'value' => $transPago2,
                    'empty'=>'empty',
                    'autocomplete'=>'off'
                     ));
                  
                  echo $this->Form->control('idcoloc', [ 'id'=>'idcoloc', 'value'=>$colocacion->id, 'type' => 'hidden',  'label' => 'id', 'class' => 'form-control input-lg']);
                ?>
                </div>

     </div>          

   
                <div class="row">
                <div class="col-lg-12">
                <?php echo $this->Form->control('transObs', ['id'=>'transObs', 'onkeyup'=>'javascript:this.value=this.value.toUpperCase();', 'type'=>'textarea', 'class' => 'form-control input-lg','label' => 'Observaciones:']); ?>
                <br>
                <button class="btn btn-lg btn-primary btn-block edittransportista" ><i ></i> Actualizar</button>
                <?= $this->Form->end() ?>
                </div>
                </div>    

  </div>
  <!-- FIN formulario Transportista-->

  <!-- formulario Transfer-->
  <div class="tab-pane fade" id="transfer" role="tabpanel" aria-labelledby="transfer-tab">

  <br>
  <?= $this->Form->create($colocacion) ?>
  <div Class="row">
   <div class="col-lg-6">
     <?php
                echo $this->Form->control('transferFactura', ['id'=>'transferFactura', 'onkeyup'=>'javascript:this.value=this.value.toUpperCase();','class' => 'form-control input-lg','label' => 'Nº Factura:']);
                echo $this->Form->control('transferImportePesos', ['id'=>'transferImportePesos', 'type'=>'number','step'=>'0.10','class' => 'form-control input-lg','label' => 'Importe en pesos:']);
                
                if(($colocacion->transferRecepcion)==null){
                  $transferRecepcion2=null;
                  }else{$transferRecepcion2 = date("d-m-Y", strtotime($colocacion->transferRecepcion));}
               
                echo $this->Form->control('transferRecepcion', array(
                    'class' => 'form-control datepicker-here', 
                    'label' => 'Fecha de Recepción:',
                    'id' => 'transferRecepcion',
                    'type' => 'Text',
                    'data-language' => 'en',
                    'data-date-format' => 'dd-mm-yyyy',
                    'value' => $transferRecepcion2,
                    'empty'=>'empty',
                    'autocomplete' => 'off'
                     ));
                     echo $this->Form->control('transferCheque', ['id'=>'transferCheque', 'onkeyup'=>'javascript:this.value=this.value.toUpperCase();','class' => 'form-control input-lg','label' => 'Cheque']);
                
        ?>
    </div>
    <div class="col-lg-6">
             <?php
              echo $this->Form->control('transfer2', ['id'=>'transfer2', 'readonly'=>true, 'style'=>'background-color:white','value'=>$colocacion->transfer->name, 'class' => 'form-control input-lg','label' => 'Transfer']);
              echo $this->Form->control('transferImporteDolar', ['id'=>'transferImporteDolar', 'type'=>'number','step'=>'0.10','class' => 'form-control input-lg','label' => 'Importe en Dolares:']);
              if(($colocacion->transferPago)==null){
                $transferPago2=null;
                }else{$transferPago2 = date("d-m-Y", strtotime($colocacion->transferPago));}
              
              echo $this->Form->control('transferPago', array(
                    'class' => 'form-control datepicker-here', 
                    'label' => 'Fecha de Pago:',
                    'id' => 'transferPago',
                    'type' => 'Text',
                    'data-language' => 'en',
                    'data-date-format' => 'dd-mm-yyyy',
                    'empty'=>'empty',
                    'value' => $transferPago2,
                    'autocomplete' => 'off'
                     ));
                  
                  
                  echo $this->Form->control('idcoloc', [ 'id'=>'idcoloc2', 'value'=>$colocacion->id, 'type' => 'hidden',  'label' => 'id', 'class' => 'form-control input-lg']);
                ?>
                </div>

     </div>          
                <div class="row">
                <div class="col-lg-12">
                <?php echo $this->Form->control('transferObs', ['id'=>'transferObs', 'onkeyup'=>'javascript:this.value=this.value.toUpperCase();', 'type'=>'textarea', 'class' => 'form-control input-lg','label' => 'Observaciones:']); ?>
                <br>
                <button class="btn btn-lg btn-primary btn-block edittransfer" ><i ></i> Actualizar</button>
                <?= $this->Form->end() ?>
                </div>
                </div>
  
  </div>
   <!-- FIN formulario Transfer-->
    <!-- formulario ORBIS-->
  <div class="tab-pane fade" id="orbis" role="tabpanel" aria-labelledby="orbis-tab">
  
  <br>
  
  <?= $this->Form->create($colocacion) ?>
  
  <div Class="row">
   <div class="col-lg-6">
     <?php
              
                echo $this->Form->control('orbisFactura', ['id'=>'orbisFactura', 'onkeyup'=>'javascript:this.value=this.value.toUpperCase();', 'class' => 'form-control input-lg','label' => 'Nº Factura:']);
                echo $this->Form->control('orbisPeso', ['id'=>'orbisPeso', 'type'=>'number','step'=>'0.10','class' => 'form-control input-lg','label' => 'Importe Pesos:']);
                echo $this->Form->control('orbisTotalFactura', ['id'=>'orbisTotalFactura', 'type'=>'number','step'=>'0.10','class' => 'form-control input-lg','label' => 'Total Factura:']);
                echo $this->Form->control('orbisRelacion', ['id'=>'orbisRelacion', 'onkeyup'=>'javascript:this.value=this.value.toUpperCase();','class' => 'form-control input-lg','label' => 'Relación:']);
                echo $this->Form->control('orbisCheque', ['id'=>'orbisCheque',  'onkeyup'=>'javascript:this.value=this.value.toUpperCase();','class' => 'form-control input-lg','label' => 'Cheque:']);
        ?>
    </div>
    <div class="col-lg-6">
             <?php
                 echo $this->Form->control('orbisCliente', ['id'=>'orbisCliente', 'value'=>$colocacion->cliente, 'onkeyup'=>'javascript:this.value=this.value.toUpperCase();','class' => 'form-control input-lg','label' => 'Cliente:']);
                 echo $this->Form->control('orbisDolares', ['id'=>'orbisDolares', 'type'=>'number','step'=>'0.10', 'class' => 'form-control input-lg','label' => 'Importe Dolares:']);
                  
                 if(($colocacion->orbisEnvio)==null){
                  $orbisEnvio2=null;
                  }else{$orbisEnvio2 = date("d-m-Y", strtotime($colocacion->orbisEnvio));}
                 
                  echo $this->Form->control('orbisEnvio', array(
                    'class' => 'form-control datepicker-here', 
                    'label' => 'Fecha de Envío:',
                    'id' => 'orbisEnvio',
                    'type' => 'Text',
                    'data-language' => 'en',
                    'data-date-format' => 'dd-mm-yyyy',
                    'empty'=>'empty',
                    'value' => $orbisEnvio2,
                    'autocomplete' => 'off'
                     ));

                     if(($colocacion->orbisPago)==null){
                      $orbisPago2=null;
                      }else{$orbisPago2 = date("d-m-Y", strtotime($colocacion->orbisPago));}
                     
                      
                  echo $this->Form->control('orbisPago', array(
                    'class' => 'form-control datepicker-here', 
                    'label' => 'Fecha de Pago:',
                    'id' => 'orbisPago',
                    'type' => 'Text',
                    'data-language' => 'en',
                    'data-date-format' => 'dd-mm-yyyy',
                    'empty'=>'empty',
                    'value' => $orbisPago2,
                    'autocomplete' => 'off'
                     ));
                  echo $this->Form->control('orbisCotizacion', ['id'=>'orbisCotizacion', 'type'=>'number','step'=>'0.10','class' => 'form-control input-lg','label' => 'Cotizacion:']);
                  echo $this->Form->control('idcoloc', [ 'id'=>'idcoloc', 'value'=>$colocacion->id, 'type' => 'hidden',  'label' => 'id', 'class' => 'form-control input-lg']);
                ?>
                </div>

     </div>          

 
                <div class="row">
                <div class="col-lg-12">
                <?php echo $this->Form->control('orbisObs', ['id'=>'orbisObs', 'onkeyup'=>'javascript:this.value=this.value.toUpperCase();', 'type'=>'textarea', 'class' => 'form-control input-lg','label' => 'Observaciones:']); ?>
                <br>
                <button class="btn btn-lg btn-primary btn-block editorbis" ><i ></i> Actualizar</button>
                <?= $this->Form->end() ?>
                </div>
                </div>    

  </div>
  
  
  
  </div>
</div>
</div>
 <!--FIN formulario ORBIS-->
<?= $this->Form->end() ?>    


<div class="col-md-3"></div>
        </div>
    </div>

<script>
         $.datetimepicker.setLocale('es');
          $('#transRecepcion').datetimepicker({
	        language: 'es',
	        timepicker:false,
	        format:'d-m-Y',
          formatDate:'d-m-Y',
          });
         

          $.datetimepicker.setLocale('es');
          $('#transPago').datetimepicker({
	        language: 'es',
	        timepicker:false,
	        format:'d-m-Y',
          formatDate:'d-m-Y',
          });
        

          $('#transferRecepcion').datetimepicker({
	       language: 'es',
	       timepicker:false,
	       format:'d-m-Y',
	       formatDate:'d-m-Y',});
         

          $('#transferPago').datetimepicker({
	       language: 'es',
	       timepicker:false,
	       format:'d-m-Y',
	       formatDate:'d-m-Y',});
        

         

          $('#orbisPago').datetimepicker({
	       language: 'es',
	       timepicker:false,
	       format:'d-m-Y',
	       formatDate:'d-m-Y',});
         

          $('#orbisEnvio').datetimepicker({
	       language: 'es',
	       timepicker:false,
	       format:'d-m-Y',
	       formatDate:'d-m-Y',});
        $.datetimepicker.setLocale('es');
</script>