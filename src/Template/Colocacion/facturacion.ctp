<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */

?>
<?php echo $this->Html->script(array('datatables.js' ), array('inline'=>false)) ?>

 <div  Class="container-panel">
    <h3 class="text-secondary"><?= __('Facturación') ?></h3>
    <br>
   
    <div class="container">
  <div class="row">

    <div class="col-sm-3">
    <?= $this->Form->create($colocacion, ['type' => 'get']) ?>

    <div class="input-group mb-3">
    
  <input name="cjsearch" type="text" class="form-control" placeholder="Ingrese Nº de caja" aria-label="" aria-describedby="basic-addon1">
   <button class="btn btn-outline-secondary" ><i class="fas fa-search"></i></button>

</div>

<?= $this->Form->end() ?>

    </div>
    <div class="col-sm-6">
    </div>
    <div class="col-sm-3" style="text-align: right;">
    
    </div>
     </div>
    </div>

    <div class="table-responsive">
    <table  class="table" style="font-size: 12px; width:100%" >
        <thead class="thead-dark" >
            <tr>
            <th scope="col" >Acciones</th>
                <th scope="col" >Colocación</th>
                <th scope="col" >Caja</th>
                <th scope="col" >Linea</th>
                <th scope="col" >Transfer</th>
                <th scope="col" >Fac. Transportista</th>
                <th scope="col" >Fac. Transfer</th>
                <th scope="col" >Fac. Orbis</th>
                
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($colocacion as $colocacion2): ?>
            <tr>
            <td class="Acciones" style="font-size:15px">
                    
                    
                 <?= $this->Html->link(__(''), ['action' => 'editfactura', $colocacion2->id], ['class' => 'btn btn-light btn-sm fa fa-edit']) ?>
                 <?= $this->Html->link(__(''), ['action' => 'viewFac',$colocacion2->id], ['class' => 'btn btn-light btn-sm fa fa-eye']) ?>
                 <?php 
                 $coloc2 = date("d-m-Y", strtotime($colocacion2->colocacion));
                 
                 if(($colocacion2->cruce)==null){
                    $cruce=null;
                    }else{$cruce = date("d-m-Y", strtotime($colocacion2->cruce));}
                 ?>
                </td>
                <td><?= h($coloc2) ?></td>
                <td><?= h($colocacion2->caja) ?></td>
                <td><?= h($colocacion2->linea->name) ?></td>
                <td ><?= h($colocacion2->transfer->name) ?></td>
                <td><?= h($colocacion2->transFactura) ?></td>
                <td><?= h($colocacion2->transferFactura) ?></td>
                <td><?= h($colocacion2->orbisFactura) ?></td>
                
               
               
                

              
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>    
            <?php
        if(!empty($total)){
           echo "Total ".$total." registros"; 
        }else{
            echo "No hay resultados";
        }


      ?>
     
  <hr>
    <?php
$paginator = $this->Paginator->setTemplates([
    'number'=>'<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
    'current'=>'<li class="page-item active"><a href="{{url}}" class="page-link">{{text}}</a></li>',
    'first'=>'<li class="page-item"><a href="{{url}}" class="page-link">primero</a></li>',
    'last'=>'<li class="page-item"><a href="{{url}}" class="page-link">ultimo</a></li>',
    'prevActive'=>'<li class="page-item"><a href="{{url}}" class="page-link">anterior<<</a></li>',
    'nextActive'=>'<li class="page-item"><a href="{{url}}" class="page-link">siguiente>></a></li>'
]);
?>
<nav>
<ul class="pagination">
<?php
echo $paginator->first();
if($paginator->hasPrev()){
    echo $paginator->prev();
}
echo $paginator->numbers();
if($paginator->hasNext()){
    echo $paginator->next();
}
echo $paginator->last();
?>
</ul>
</nav>
</div>


<script src="https://kit.fontawesome.com/838f8159c2.js" crossorigin="anonymous"></script>