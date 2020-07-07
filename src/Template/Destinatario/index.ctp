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
    <h3 class="text-secondary"><?= __('Destinatarios') ?></h3>
    <div class="izquierda" >
    <?= $this->Fa->link('file', __('Nuevo'), ['controller' =>'Destinatario', 'action' => 'add'], ['class' => 'btn btn-lg btn-success']) ?>
    </div>
    <br>
    <table id="table2" class="table table-hover responsive">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Acciones</th>
                <th scope="col">Destinatario</th>
                <th scope="col">RFC</th>
                <th scope="col">Destino</th>
                <th scope="col">Patio destino</th>
                <th scope="col">Se entrega</th>
               
              
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($destinatario as $destinatario): ?>
            <tr>
            <td class="actions">
                    <?= $this->Html->link(__(''), ['action' => 'edit', $destinatario->id], ['class' => 'btn btn-light btn-sm fa fa-edit']) ?>
                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $destinatario->id], ['class' => 'btn btn-light btn-sm fa fa-trash-alt','confirm' => __('Seguro que quiere eliminar el registro? # {0}?', $destinatario->id)]) ?>
                </td>
                <td><?= h($destinatario->destinatario) ?></td>
                <td><?= h($destinatario->rfc) ?></td>
                <td><?= h($destinatario->destino) ?></td>
                <td><?= h($destinatario->domicilio) ?></td>
                <td><?= h($destinatario->entrega) ?></td>
               
                
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   
    <div class="col-md-2"></div>
        </div>
    </div>

<script src="https://kit.fontawesome.com/838f8159c2.js" crossorigin="anonymous"></script>