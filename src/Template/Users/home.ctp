<?php echo $this->Html->script(array('lineas.js' ), array('inline'=>false)) ?>


<style>
  .titulo {
  
  
 
  color: #213268;
  font-size:30px;
  padding-top: 48px;
}
.card{
  background-color: #5dade2;
  background-image: linear-gradient(90deg, #5dade2 39%, #9279c4 100%);

   border: 0px;
  color: white;
  margin-left:1%; 
  margin-right:1%;
  margin-top:4%;"
}
.align-self-center{
    color: white;
    font-size:50px;
}

.label{
    color: white;
    font-size:30px;
    margin-right: 7px
}
.select{
  background-color: #5dade2;
  color: white;
  font-size:18px;
  border: none;
  width: 100px;
}

</style>
  
 

  <div class="row" style="margin-left:6%; margin-right:5%;margin-top:2%; ">
 

  
 
  <div class="titulo" >PENDIENTES DE ENTREGAR A DESCARGAS: <?= $totalPendientes?> </div>
 
  </div>
  <hr style="height:2px; margin-left:6%; margin-right:6%; background-color:#213268">
  <div class="row" style="margin-left:5%; margin-right:5%;margin-top:2%;">

  


  <?php foreach ($reslinea as $reslinea2): ?>
    <?php 
    
      if($reslinea2->linea->name=='-'){
        $reslinea2->linea->name='SIN LINEA';
      }
      
      ?>
  



  
  <div class="col-sm-3">
  <div class="card">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="media-body text-left">
                <h3 class="warning"><?= $reslinea2->linea->name; ?></h3>
                <h5 class="warning">Pendientes: <?= $reslinea2->count?></h5>
              </div>
              <div class="align-self-center">
              
              <?= $this->Html->link(__(''), ['action' => 'viewpendiente',$reslinea2->linea->id], ['class' => 'btn-ligth btn-sm fa fa-list-ol', 'style' => 'color:white']) ?>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  
  <?php endforeach; ?>
   
  

   
