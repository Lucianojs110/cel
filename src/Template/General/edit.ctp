

     <div  Class="container-panel">
     <div Class="col-md-12">
    	<div class="page-header">
     
    		<h3 class="text-secondary">Editar Registro General P.O.</h3>
            <?= $this->Fa->link('chevron-circle-left', __('Volver'), ['controller' =>'General', 'action' => 'index'], ['class' => 'btn btn-sm btn-primary'], ['before' => true])?>
        </div>
      <br>
     <?= $this->Form->create($general) ?>
     
     <div Class="row">
            <div class="col-lg-3">
             <?php
                
                echo $this->Form->control('sched', ['label' => 'Sched', 'class' => 'form-control input-lg']);
                echo $this->Form->control('arrive', ['label' => 'Arrive', 'class' => 'form-control input-lg']);
                echo $this->Form->control('number', ['label' => 'Numero', 'class' => 'form-control input-lg']);
                echo $this->Form->control('product', ['label' => 'Producto', 'class' => 'form-control input-lg']);
                echo $this->Form->control('client', ['label' => 'Cliente', 'class' => 'form-control input-lg']);
               
                ?>
                </div>
                <div class="col-lg-3">
             <?php
                 echo $this->Form->control('carrier', ['label' => 'Carrier', 'class' => 'form-control input-lg']);
                echo $this->Form->control('boxusa', ['label' => 'Caja Usa', 'class' => 'form-control input-lg']);
                echo $this->Form->control('cita', ['label' => 'Cita', 'class' => 'form-control input-lg']);
                echo $this->Form->control('origen', ['label' => 'Origen', 'class' => 'form-control input-lg']);
                echo $this->Form->control('destino', ['label' => 'Destino', 'class' => 'form-control input-lg']);
                
              
                ?>
                </div>
                <div class="col-lg-3">
             <?php
                echo $this->Form->control('poanexo', ['label' => 'Po Anexo', 'class' => 'form-control input-lg']);
                echo $this->Form->control('cajanac', ['label' => 'caja Nacional', 'class' => 'form-control input-lg']);
                echo $this->Form->control('colocacion', ['label' => 'Colocacion', 'class' => 'form-control input-lg']);
                echo $this->Form->control('peso', ['label' => 'Peso', 'class' => 'form-control input-lg']);
                
                ?>
                </div>
                <div class="col-lg-3">
             <?php
                 echo $this->Form->control('carga', ['label' => 'Carga', 'class' => 'form-control input-lg']);
                 echo $this->Form->control('pickup', ['label' => 'Pick Up', 'class' => 'form-control input-lg']);
                 echo $this->Form->control('bultos', ['label' => 'Bultos', 'class' => 'form-control input-lg']);
                 echo $this->Form->control('entrega', ['label' => 'Entrega', 'class' => 'form-control input-lg']);
                ?>
                </div>
        </div>


        
            <hr>
                <div class="row">
                <div class="col-lg-4">
            <?= $this->Form->button('Editar', ['class' => 'btn btn-lg btn-primary btn-block']) ?>
            <?= $this->Form->end() ?>
                </div>
                </div>
                
            </divee>
        