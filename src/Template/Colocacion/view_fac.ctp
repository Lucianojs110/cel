<div  Class="container-panel">
  <div Class="col-md-12">
    
   
    <h3 class="text-secondary"><?= __('Ver Registro Colocación') ?></h3>
      
    <?= $this->Fa->link('chevron-circle-left', __('Volver'), ['controller' =>'colocacion', 'action' => 'facturacion'], ['class' => 'btn btn-sm btn-primary'], ['before' => true]) ?>
    <?= $this->Form->create($colocacion) ?>
    <br>

    <div class="row">
    <div class="col"  style="font-size:18px">
    <h4 class="text-secondary">Datos de la carga</h4>
    <?php 
    $coloc2 = date("d-m-Y", strtotime($colocacion->colocacion)); 
   
    if(($colocacion->trasbordo)==null){
    $trasbordo=null;
      }else{$trasbordo = date("d-m-Y", strtotime($colocacion->trasbordo));}

    if(($colocacion->entregada)==null){
      $entregada=null;
      }else{$entregada = date("d-m-Y", strtotime($colocacion->entregada));}

    if(($colocacion->cruce)==null){
                    $cruce=null;
      }else{$cruce = date("d-m-Y", strtotime($colocacion->cruce));}

      if(($colocacion->importacion)==null){
        $importacion=null;
      }else{$importacion = date("d-m-Y", strtotime($colocacion->importacion));}

      
    if(($colocacion->despacho)==null){
      $despacho=null;
    }else{$despacho = date("d-m-Y", strtotime($colocacion->despacho));}


    if(($colocacion->descargada)==null){
    $descargada=null;
   }else{$descargada = date("d-m-Y", strtotime($colocacion->descargada));}
        
      if(($colocacion->transPago)==null){
        $transPago=null;
      }else{$transPago = date("d-m-Y", strtotime($colocacion->transPago));}

      if(($colocacion->transRecepcion)==null){
        $transRecepcion=null;
      }else{$transRecepcion = date("d-m-Y", strtotime($colocacion->transRecepcion));}

      if(($colocacion->transferRecepcion)==null){
        $transferRecepcion=null;
      }else{$transferRecepcion = date("d-m-Y", strtotime($colocacion->transferRecepcion));}

      if(($colocacion->transferPago)==null){
        $transferPago=null;
      }else{$transferPago = date("d-m-Y", strtotime($colocacion->transferPago));}

      if(($colocacion->orbisEnvio)==null){
        $orbisEnvio=null;
      }else{$orbisEnvio = date("d-m-Y", strtotime($colocacion->orbisEnvio));}

      if(($colocacion->orbisPago)==null){
        $orbisPago=null;
      }else{$orbisPago = date("d-m-Y", strtotime($colocacion->orbisPago));}

    

        ?>



      Colocación: <?= h($coloc2) ?> <br>
      Caja: <?= h($colocacion->caja) ?> <br>
      Linea: <?= h($colocacion->linea->name) ?>  <br>
      Pickup:  <?= h($colocacion->pickup) ?>  <br>
      Po Anexo: <?= h($colocacion->poanexo) ?> <br>
      Trasbordo: <?= h($trasbordo) ?><br>
      Entregada: <?= h($entregada) ?><br>
      Importación: <?= h($importacion) ?><br>
      Cruce: <?= h($cruce) ?><br>
      Transfer: <?= h($colocacion->transfer->name) ?><br>
      Estatus: <?= h($colocacion->estatus->name) ?><br>
      Despacho: <?= h($despacho) ?><br>
      Descargada: <?= h($descargada) ?><br>
    </div>
    <div class="col" style="font-size:18px">
    <h4 class="text-secondary">Factura Transportista</h4>
    <th>Nº Factura: </th><td><?= h($colocacion->transFactura) ?></td><br>
    <th>Recepción: </th>  <td><?= h($transRecepcion) ?></td><br>
    <th>Transportista: </th><td><?= h($colocacion->transportista) ?></td><br>
    <th>Importe en Pesos: </th><td>$<?= h($colocacion->transImportePesos) ?></td><br>
    <th>Importe en Dolares: </th> <td>$<?= h($colocacion->transImporteDolar) ?></td><br>
    <th>Pago: </th><td><?= h($transPago) ?></td><br>
    <th>Cheque: </th><td><?= h($colocacion->transCheque) ?></td><br>
    <th>Observación: </th><td><?= h($colocacion->transObs) ?></td><br>
    </div>
    <div class="col" style="font-size:18px">
    <h4 class="text-secondary">Factura Transfer</h4>
    <th>Nº Factura: </th><td><?= h($colocacion->transferFactura) ?></td><br>
    <th>Recepción: </th><td><?= h($transferRecepcion) ?></td><br>
    <th>Transfer: </th><td><?= h($colocacion->transfer2) ?></td><br>
    <th>Importe Pesos: </th><td>$<?= h($colocacion->transferImportePesos) ?></td><br>
    <th>Importe Dolares: </th><td>$<?= h($colocacion->transferImporteDolar) ?></td><br>
    <th>Pago: </th><td><?= h($transferPago) ?></td><br>
    <th>Cheque: </th><td><?= h($colocacion->transferCheque) ?></td><br>
    <th>Observación: </th> <td><?= h($colocacion->transferObs) ?></td><br>
    </div>
    <div class="col" style="font-size:18px">
    <h4 class="text-secondary">Factura Orbis</h4>
    <th>Nº Factura: </th><td><?= h($colocacion->orbisFactura) ?></td><br>
    <th>Cliente: </th><td><?= h($colocacion->orbisCliente) ?></td><br>
    <th>Pesos: </th><td>$<?= h($colocacion->orbisPeso) ?></td><br>
    <th>Dolares: </th> <td>$<?= h($colocacion->orbisDolares) ?></td><br>
    <th>Total Factura: </th><td>$<?= h($colocacion->orbisTotalFactura) ?></td><br>
    <th>Cotizacion Dolar: </th><td>$<?= h($colocacion->orbisCotizacion) ?></td><br>
    <th>Envío: </th><td><?= h($orbisEnvio) ?></td><br>
    <th>Relación: </th><td><?= h($colocacion->orbisRelacion) ?></td><br>
    <th>Pago: </th><td><?= h($orbisPago) ?></td><br>
    <th>Cheque: </th>   <td><?= h($colocacion->orbisCheque) ?></td><br>
    <th>Observación: </th> <td><?= h($colocacion->orbisObs) ?></td><br>
    </div>
    </div>
    



    <?= $this->Form->end() ?>
    </div>
    </div>
