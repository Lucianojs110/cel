<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */

?>

<?php echo $this->Html->script(array('datatables.js' ), array('inline'=>false)) ?>
<?php echo $this->Html->css('style.css'); ?>


<div  Class="container-panel">

    <h3 class="text-secondary"><?= __('Tabla Colocación') ?></h3>
    <br>
    <div class="container">

    <div class="row">
    <div class="col-sm-3">
    <?= $this->Form->create($colocacion, ['type' => 'get']) ?>
    <div class="input-group mb-3"> 
    <?= $this->Form->control('estatus',  ['label'=>'Seleccione Estatus','type' => 'select', 'options' => $opestatus,  'class' => 'form-control input-lg']); ?>

    </div>
 
    </div>
    <div class="col-sm-6">
    </div>
   
    </div>

    <div class="row">
    <div class="col-sm-3">
   
    <div class="input-group mb-3"> 
    
    <input name="cjsearch" type="text" class="form-control" placeholder="Ingrese Nº de caja" aria-label="" aria-describedby="basic-addon1">
    
    <button class="btn btn-outline-secondary" ><i class="fas fa-search"></i></button>
    </div>
    <?= $this->Form->end() ?>
    </div>
    <div class="col-sm-6">
    </div>
    <div class="col-sm-3" style="text-align: right; ">
    <?= $this->Fa->link('file', __('Nuevo'), ['controller' =>'Colocacion', 'action' => 'add'], ['class' => 'btn btn-lg btn-success'], ['before' => false]) ?>
    </div>
     </div>
    </div>
    
    <div class="table-responsive">
    <table  class="table"   style="font-size:12px">
        <thead class="thead-dark"  style="font-size: 12px">
            <tr>
               <th>Acciones</th>
                <th>Coloc.</th>
                <th>Caja</th>
                <th>Linea</th>
                <th>Pickup</th>
                <th>Cliente</th>
                <th>Agencia</th>
                <th>PoAnexo</th>
                <th>Trasbordo</th>
                <th>Entregada</th>
                <th>Cruce</th>
                <th>Transfer</th>
                <th>Estatus</th>
                
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($colocacion as $colocacion2): ?>
                
            <tr>
            <td class="Acciones" style="font-size:15px">
                 <?= $this->Html->link(__(''), ['action' => 'edit', $colocacion2->id], ['class' => 'btn btn-light btn-sm fa fa-edit']) ?>
                 <?= $this->Html->link(__(''), ['action' => 'view',$colocacion2->id], ['class' => 'btn btn-light btn-sm fa fa-eye']) ?>
                 <?= $this->Form->postLink(__(''), ['action' => 'delete', $colocacion2->id], ['class' => 'btn btn-light btn-sm fa fa-trash-alt','confirm' => __('Seguro que quiere eliminar el registro? # {0}?', $colocacion2->id)]) ?>
                </td>

               <?php 
               $coloc2 = date("d-m-Y", strtotime($colocacion2->colocacion)); 
               
               if(($colocacion2->trasbordo)==null){
                $trasbordo=null;
                }else{$trasbordo = date("d-m-Y", strtotime($colocacion2->trasbordo));}
                if(($colocacion2->entregada)==null){
                    $entregada=null;
                    }else{$entregada = date("d-m-Y", strtotime($colocacion2->entregada));}
                if(($colocacion2->cruce)==null){
                    $cruce=null;
                    }else{$cruce = date("d-m-Y", strtotime($colocacion2->cruce));}
               ?>
                <td><?= h($coloc2) ?></td>
                <td><?= h($colocacion2->caja) ?></td>
                <td><?= h($colocacion2->linea->name) ?></td>
                <td><?= h($colocacion2->pickup) ?></td>
                <td><?= h($colocacion2->cliente) ?></td>
                <td><?= h($colocacion2->entrega) ?></td>
                <td><?= h($colocacion2->poanexo) ?></td>
                <td><?= h($trasbordo) ?></td>
                <td><?= h($entregada) ?></td>
                <td><?= h($cruce) ?></td>
                <td><?= h($colocacion2->transfer->name) ?></td>
                <?php if($colocacion2->estatus->name=="DESCARGADA"){
                    echo "<td style='background-color:#4DDF35; color:white'>".$colocacion2->estatus->name."</td>";
                }else{
                    echo "<td>".$colocacion2->estatus->name."</td>";
                } ?>

              
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


<script src="https://kit.fontawesome.com/838f8159c2.js" crossorigin="anonymous"></script>