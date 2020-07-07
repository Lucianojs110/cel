
<?php foreach($potemp1 as $potemp2): ?>

    <div Class="row">
            <div class="col-lg-4">
             <?php
                
                echo $this->Form->control('pickup', [ 'id'=>'pickup', 'style'=>'background-color:white','readonly'=>true,'value' => $potemp2->pickup, 'label' => 'Pickup', 'class' => 'form-control input-lg']);
                echo $this->Form->control('idgeneral', [ 'id'=>'idgeneral', 'value'=>$potemp2->id_general,  'type' => 'hidden', 'label' => 'id', 'class' => 'form-control input-lg']);
                ?>
                </div>

                <div class="col-lg-4">
             <?php
                 echo $this->Form->control('cliente', ['id'=>'cliente', 'style'=>'background-color:white','readonly'=>true, 'value' => $potemp2->cliente, 'label' => 'Cliente', 'class' => 'form-control input-lg']);
                ?>
                </div>
                <div class="col-lg-4">
             <?php
                echo $this->Form->control('entrega', [ 'id'=>'entrega', 'style'=>'background-color:white','readonly'=>true,'value' => $potemp2->entrega, 'label' => 'Entrega', 'class' => 'form-control input-lg']);
               
                ?>
                </div>
          </div>


  <?php endforeach; ?>


  