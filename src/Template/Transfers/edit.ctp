<div Class="row">
     <div class="col-md-4"></div>
     
     <div Class="col-md-4">
     <div  Class="container-panel">
    	<div class="page-header">
       
        <h3 class="text-secondary">Editar Transfer</h3>
        <?= $this->Fa->link('chevron-circle-left', __('Volver'), ['controller' =>'Transfers', 'action' => 'index'], ['class' => 'btn btn-sm btn-primary'], ['before' => true])?>
        <br>    
      </div>
     <?= $this->Form->create($transfer) ?>
        <fieldset class="col-0 col-md-0 px-20">
        <?php
           
         
             echo $this->Form->control('name', ['class' => 'form-control input-lg', 'onkeyup'=>'javascript:this.value=this.value.toUpperCase();','label' => 'Nombre']);
             echo $this->Form->control('name_ab', ['class' => 'form-control input-lg', 'onkeyup'=>'javascript:this.value=this.value.toUpperCase();','label' => 'Nombre Completo']);
            
        
        ?>
        </fieldset>
        <hr>
        <div class="row">
        <div class="col-xs-0 col-sm-15 col-md-12">
    <?= $this->Form->button('Editar Transfer', ['class' => 'btn btn-lg btn-primary btn-block']) ?>
    <?= $this->Form->end() ?>
    </div>
        </div>
        <div class="col-md-4"></div>
        </div>
    </div>