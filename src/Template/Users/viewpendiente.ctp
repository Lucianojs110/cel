
    
   
    <div Class="row">
     <div class="col-md-4"></div>
     
     <div Class="col-md-4">
     <div  Class="container-panel">
    	<div class="page-header">
     
        <h3 class="text-secondary">Ver Pendientes</h3>
        <?= $this->Html->link(__('<-Volver'), ['controller' =>'users', 'action' => 'home'], ['class' => 'btn btn-sm btn-primary '])?>
    	</div>
        <table id="tabletransfer" class="table table-hover responsive"  style="font-size: 12px; ">
        <thead class="thead-dark" >
            <tr>
                <th scope="col">Caja</th>
                <th scope="col">Cruce</th>
                <th scope="col">Colocación</th>
                <th scope="col">Cliente</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($penlinea as $penlinea2): ?>

            <?php 
               $cruce = date("d-m-Y", strtotime($penlinea2->cruce)); 
               $colocacion = date("d-m-Y", strtotime($penlinea2->colocacion)); 
               ?> 
            <tr>
      
            <td><?= h($penlinea2->caja) ?></td>
            <td><?= h($cruce) ?></td>
            <td><?= h($colocacion) ?></td>
            <td><?= h($penlinea2->cliente) ?></td>
                
                
            </tr>
            <?php endforeach; ?>

        </tbody>
        <hr>
        <div class="row">
        <div class="col-xs-0 col-sm-15 col-md-12">
    
        </div>
        </div>
        <div class="col-md-4"></div>
        </div>
    </div>