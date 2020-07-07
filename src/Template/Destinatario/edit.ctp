
   <div Class="row">
     <div class="col-md-4"></div>
     
     <div Class="col-md-4">
     <div  Class="container-panel">
    	<div class="page-header">
      
        <h3 class="text-secondary">Editar Destinatario</h3>
        <?= $this->Fa->link('chevron-circle-left', __('Volver'), ['controller' =>'Remitente', 'action' => 'index'], ['class' => 'btn btn-sm btn-primary'], ['before' => true])?>
      <br>
      </div>
     <?= $this->Form->create($destinatario) ?>
        <fieldset class="col-0 col-md-0 px-20">
        
           
         
        <?= $this->Form->control('destinatario', ['class' => 'form-control input-lg','label' => 'Destinatario:']);?>
           <?= $this->Form->control('rfc', ['class' => 'form-control input-lg','label' => 'RFC:']);?>
           <?= $this->Form->control('destino', ['class' => 'form-control input-lg','label' => 'Destino:']);?>
           <?= $this->Form->control('domicilio', ['class' => 'form-control input-lg','label' => 'Patio Destino:']);?>
           <?= $this->Form->control('entrega', ['class' => 'form-control input-lg','label' => 'Se entrega en:']);?>
            
        
        
        </fieldset>
        <hr>
        <div class="row">
        <div class="col-xs-0 col-sm-15 col-md-12">
    <?= $this->Form->button('Guardar', ['class' => 'btn btn-lg btn-primary btn-block']) ?>
    <?= $this->Form->end() ?>
    </div>
        </div>
        <div class="col-md-4"></div>
        </div>
    </div>