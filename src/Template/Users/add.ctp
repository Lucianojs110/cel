
   
     <div Class="row">
     <div class="col-md-4"></div>
     
     <div Class="col-md-4">
     <div  Class="container-panel">
    	<div class="page-header">
     
        <h3 class="text-secondary">Crear usuario</h3>
        <?= $this->Fa->link('chevron-circle-left', __('Volver'), ['controller' =>'Users', 'action' => 'index'], ['class' => 'btn btn-sm btn-primary'], ['before' => true])?>
    	</div>
     <?= $this->Form->create($user) ?>
        <fieldset class="col-0 col-md-0 px-20">
        <?php
           
         
             echo $this->Form->control('first_name', ['class' => 'form-control input-lg', 'label' => 'Nombre']);
             echo $this->Form->control('email', ['class' => 'form-control input-lg','label' => 'E-mail']);
             echo $this->Form->control('password', ['class' => 'form-control input-lg','label' => 'Contraseña']);
             echo $this->Form->control('role', ['class' => 'form-control input-lg','label' => 'Rol ', 'options' => ['admin' => 'Administrador', 'user' => 'Usuario']]);
        
        ?>
        </fieldset>
        <hr>
        <div class="row">
        <div class="col-xs-0 col-sm-15 col-md-12">
    <?= $this->Form->button('Crear Usuario', ['class' => 'btn btn-lg btn-primary btn-block']) ?>
    <?= $this->Form->end() ?>
        </div>
        </div>
        <div class="col-md-4"></div>
        </div>
    </div>