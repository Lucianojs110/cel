<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */

?>
<?php echo $this->Html->script(array('datatables.js' ), array('inline'=>false)) ?>

 <div  Class="container-panel">

    
    <h3 class="text-secondary"><?= __('Tabla General PO') ?></h3>
    <br>
    <div class="container">
    <div class="row">
    <div class="col-sm-3">
    <?= $this->Form->create($general, ['type' => 'get']) ?>
    <div class="input-group mb-3"> 
    <input name="pksearch" type="text" class="form-control" placeholder="Ingrese Nº de Pickup" aria-label="" aria-describedby="basic-addon1">
    <button class="btn btn-outline-secondary" ><i class="fas fa-search"></i></button>
    </div>
    <?= $this->Form->end() ?>
    </div>
    <div class="col-sm-6">
    </div>
    <div class="col-sm-3" style="text-align: right">
    <?= $this->Fa->link('file', __('Nuevo'), ['controller' =>'General', 'action' => 'add'], ['class' => 'btn btn-lg btn-success'], ['before' => false]) ?>
    </div>
     </div>
    </div>
    
    <div class="table-responsive">
    <table  class="table" style="font-size: 12px; width:100%" >
        <thead class="thead-dark">
            <tr>
                <th scope="col">Acciones</th>
                <th scope="col">Schedule</th>
                <th scope="col">Arrive</th>
                <th scope="col">Cliente</th>
                <th scope="col">Pick Up</th>
                <th scope="col">Po Anexo</th>
                <th scope="col">Caja Nacional</th>
                <th scope="col">Entrega</th>
                
                
               
              
            </tr>
        </thead>
        <tbody>
            <?php foreach ($general as $general2): ?>
            <tr>
                <td class="Acciones" style="font-size:15px"> 
                 <?= $this->Html->link(__(''), ['action' => 'edit', $general2->id], ['class' => 'btn btn-light btn-sm fa fa-edit']) ?>
                 <?= $this->Html->link(__(''), ['action' => 'view', $general2->id], ['class' => 'btn btn-light btn-sm fa fa-eye']) ?>
                 <?= $this->Form->postLink(__(''), ['action' => 'delete', $general2->id], ['class' => 'btn btn-light btn-sm fa fa-trash-alt','confirm' => __('Seguro que quiere eliminar el registro? # {0}?', $general2->id)]) ?>
                </td>
                <td><?= h($general2->sched) ?></td>
                <td><?= h($general2->arrive) ?></td>
                <td><?= h($general2->client) ?></td>
                <td><?= h($general2->pickup) ?></td>
                <td><?= h($general2->poanexo) ?></td>
                <td><?= h($general2->cajanac) ?></td>
                <td><?= h($general2->entrega) ?></td>
                
               
               
                
              
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