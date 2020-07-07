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
    <h3 class="text-secondary"><?= __('Remitentes') ?></h3>
    <div class="izquierda" >
    <?= $this->Fa->link('file', __('Nuevo'), ['controller' =>'Remitente', 'action' => 'add'], ['class' => 'btn btn-lg btn-success']) ?>
    </div>
    <br>
    <table id="table2" class="table table-hover responsive">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Acciones</th>
                <th scope="col">Remitente</th>
                <th scope="col">RFC</th>
                <th scope="col">Origen</th>
                <th scope="col">Domicilio</th>
                <th scope="col">Se recoge</th>
               
              
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($remitente as $remitente): ?>
            <tr>
            <td class="actions">
                    <?= $this->Html->link(__(''), ['action' => 'edit', $remitente->id], ['class' => 'btn btn-light btn-sm fa fa-edit']) ?>
                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $remitente->id], ['class' => 'btn btn-light btn-sm fa fa-trash-alt','confirm' => __('Seguro que quiere eliminar el registro? # {0}?', $remitente->id)]) ?>
                </td>
                <td><?= h($remitente->remitente) ?></td>
                <td><?= h($remitente->rfc) ?></td>
                <td><?= h($remitente->origen) ?></td>
                <td><?= h($remitente->domicilio) ?></td>
                <td><?= h($remitente->recogida) ?></td>
               
                
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   
    <div class="col-md-2"></div>
        </div>
    </div>

<script src="https://kit.fontawesome.com/838f8159c2.js" crossorigin="anonymous"></script>