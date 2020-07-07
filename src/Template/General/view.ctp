<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
  <div  Class="container-panel">
  <div class="table">
  
    <h3 class="text-secondary"><?= __('Ver Registro  PO') ?></h3>
    <?= $this->Fa->link('chevron-circle-left', __('Volver'), ['controller' =>'General', 'action' => 'index'], ['class' => 'btn btn-sm btn-primary'], ['before' => true]) ?>
    <?= $this->Form->create($general) ?>
   <br>
    <table   class="table table-bordered" style="text-align:center; font-size: 11px; width:100%" >
        <thead class="thead-light">
        </thead>
        <tbody >
        <tr>
        <th>Schedule</th>
        <td><?= h($general->sched) ?></td>
        </tr>
        <tr>
        <th>Arrive</th>
        <td><?= h($general->arrive) ?></td>
        </tr>
        <tr>
        <th>Numero</th>
        <td><?= h($general->number) ?></td>
        </tr>
        <tr>
        <th>Producto</th>
        <td><?= h($general->product) ?></td>
        </tr>
        <tr>
        <th>Cliente</th>
        <td><?= h($general->client) ?></td>
        </tr>
        <tr>
        <th>Carga</th>
        <td><?= h($general->carga) ?></td>
        </tr>
        <tr>
        <th>Caja USA</th>
        <td><?= h($general->boxusa) ?></td>
        </tr>
        <tr>
        <th>Cita</th>
        <td><?= h($general->cita) ?></td>
        </tr>
        <tr>
        <th>Origen</th>
        <td><?= h($general->origen) ?></td>
        </tr>
        <tr>
        <th>Destino</th>
        <td><?= h($general->destino) ?></td>
        </tr>
        <tr>
        <th>Pick Up</th>
        <td><?= h($general->pickup) ?></td>
        </tr>
        <tr>
        <th>Po Anexo</th>
        <td><?= h($general->poanexo) ?></td>
        </tr>
        <tr>
        <th>Caja Nacional</th>
        <td><?= h($general->cajanac) ?></td>
        </tr>
        <tr>
        <th>Colocación</th>
        <td><?= h($general->colocacion) ?></td>
        </tr>
        <tr>
        <th>Peso</th>
        <td><?= h($general->peso) ?></td>
        </tr>
        <tr>
        <th>bultos</th>
        <td><?= h($general->bultos) ?></td>
        </tr>
        <tr>
        <th>Entrega</th>
        <td><?= h($general->entrega) ?></td>
        </tr>
            
        </tbody>
    </table>
</div>

    <?= $this->Form->end() ?>


  </div>
  <div class="col-md-4"></div>
</div>





