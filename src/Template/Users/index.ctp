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

    <h3 class="text-secondary"><?= __('Usuarios') ?></h3>
    <div class="izquierda" >
    <?= $this->Fa->link('file', __('Nuevo'), ['controller' =>'Users', 'action' => 'add'], ['class' => 'btn btn-lg btn-success']) ?>
    </div>
</div>
    <table id="table2" class="table table-hover responsive">
        <thead class="thead-dark">
            <tr>
               
                <th scope="col" class="actions">Acciones</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Rol</th>
              
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
               <td class="actions">
                    <?= $this->Html->link(__(''), ['action' => 'edit', $user->id], ['class' => 'btn btn-light btn-sm fa fa-edit']) ?>
                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $user->id], ['class' => 'btn btn-light btn-sm fa fa-trash-alt','confirm' => __('Seguro que quiere eliminar el registro? # {0}?', $user->id)]) ?>
                </td>
               
                <td><?= h($user->first_name) ?></td>
              
                <td><?= h($user->email) ?></td>
               
                <td><?= h($user->role) ?></td>
                
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    
            </div>
</div>
<div class="col-md-3"></div>
        </div>
    </div>

<script src="https://kit.fontawesome.com/838f8159c2.js" crossorigin="anonymous"></script>