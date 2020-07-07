<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<?php echo $this->Html->script(array('datatables.js' ), array('inline'=>false)) ?>
<style>
    .izquierda {
    text-align: right;
    margin-right: 0px;
    z-index:1:
}
 </style>
  <div Class="row">
     <div class="col-md-2"></div>
     
     <div Class="col-md-8">
 <div  Class="container-panel">
<div class="table">
    <h3 class="text-secondary"><?= __('Operadores') ?></h3>
    <div class="izquierda" >
    <?= $this->Fa->link('file', __('Nuevo'), ['controller' =>'Operador', 'action' => 'add'], ['class' => 'btn btn-lg btn-success']) ?>
    </div>
    <br>
    <table id="table2" class="table table-hover responsive">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Acciones</th>
                <th scope="col">Operador</th>
                <th scope="col">Unidad</th>
                <th scope="col">Placas Tractor</th>
                <th scope="col">Permisionario</th>   
            </tr>
        </thead>
        <tbody>
            <?php foreach ($operador as $operador): ?>
            <tr>
            <td class="actions">
                    <?= $this->Html->link(__(''), ['action' => 'edit', $operador->id], ['class' => 'btn btn-light btn-sm fa fa-edit']) ?>
                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $operador->id], ['class' => 'btn btn-light btn-sm fa fa-trash-alt','confirm' => __('Seguro que quiere eliminar el registro? # {0}?', $operador->id)]) ?>
                </td>
                <td><?= h($operador->operador) ?></td>
                <td><?= h($operador->unidad) ?></td>
                <td><?= h($operador->placatractor) ?></td>
                <td><?= h($operador->permisionario) ?></td>

               
                
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   
    <div class="col-md-2"></div>
        </div>
    </div>

<script src="https://kit.fontawesome.com/838f8159c2.js" crossorigin="anonymous"></script>