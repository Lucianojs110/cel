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
     <div class="col-md-3"></div>
     
     <div Class="col-md-6">
 <div  Class="container-panel">
<div class="table">
    <h3 class="text-secondary"><?= __('Remolques') ?></h3>
    <div class="izquierda" >
    <?= $this->Fa->link('file', __('Nuevo'), ['controller' =>'Remolque', 'action' => 'add'], ['class' => 'btn btn-lg btn-success']) ?>
    </div>
    <br>
    <table id="table2" class="table table-hover responsive">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Acciones</th>
                <th scope="col">Remolque</th>
                <th scope="col">Placa</th>
              
        </thead>
        <tbody>
            <?php foreach ($remolque as $remolque): ?>
            <tr>
            <td class="actions">
                    <?= $this->Html->link(__(''), ['action' => 'edit', $remolque->id], ['class' => 'btn btn-light btn-sm fa fa-edit']) ?>
                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $remolque->id], ['class' => 'btn btn-light btn-sm fa fa-trash-alt','confirm' => __('Seguro que quiere eliminar el registro? # {0}?', $remolque->id)]) ?>
                </td>
                <td><?= h($remolque->remolque) ?></td>
                <td><?= h($remolque->placaremolque) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   
    <div class="col-md-3"></div>
        </div>
    </div>

<script src="https://kit.fontawesome.com/838f8159c2.js" crossorigin="anonymous"></script>