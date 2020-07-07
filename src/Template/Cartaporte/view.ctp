
 <div Class="row">
     <div class="col-md-2"></div>
<div  Class="container-panel">
<div Class="col-md-12">
<?= $this->Fa->link('chevron-circle-left', __('Volver'), ['controller' =>'Cartaporte', 'action' => 'index'], ['class' => 'btn btn-sm btn-primary'], ['before' => true])?>
<br><br>
<table class="table table-sm table-bordered">
    
        <tbody>
            <tr>
                <td>
                <?php  echo $this->Html->image('orbis.png', ['fullBase' => true, 'width' => '320px', 'height' => '120px']); ?>
                </td>
                <td> <b></b> ORBIS LOGISTICS SOLUTIONS, S.A. DE C.V. <br>
                RFC: OLS140228RA6 <br>
                AV. LUDWIG VAN BEETHOVEN No. 5113, INTERIOR 4 <br>
                COL. RESIDENCIAL LA ESTANCIA, ZAPOPAN, JALISCO  CP 45030 <br>
                SERVICIO PÚBLICO FEDERAL </b>
                </td>
                <td>
                CARTA PORTE <br>
                <H1> LD<?= $cartaporte->id ?> </H1> 
                IMPORTACIÓN
                </td>
            </tr>
            
        </tbody>
    </table>



    <table class="table table-sm table-bordered">
    
    <tbody>
    <tr>
            <td>
            <b>Lugar de Expedición :</b>  <?= $cartaporte->lugarExp ?> 
            </td>
            <td>  
            <?php   $fechaExp = date("d-m-Y", strtotime($cartaporte->fechaExp));?>
            <b>Fecha de Expedición :</b>  <?= $fechaExp ?>
            </td>
          
        </tr>
        
    </tbody>
</table>


    <table class="table table-sm table-bordered">
    
    <tbody>
    
        <tr>
            <td>
            <b>Origen:</b> <?= $cartaporte->origen ?>
            </td>
            <td>  
            <b>Remitente:</b> <?= $cartaporte->remitente ?>
            </td>
            <td>  
            <b>RFC Remitente:</b> <?= $cartaporte->rfcrem ?>
            </td>
            <td>  
            <b>Domicilio:</b> <?= $cartaporte->domiciliorem ?>
            </td>
            <td>  
            <b>Se recoge en:</b> <?= $cartaporte->lugarrecogida ?>
            </td>
        </tr>
        <tr>
            <td>
            <b>Destino:</b> <?= $cartaporte->destino ?>
            </td>
            <td>  
            <b>Destinatario:</b> <?= $cartaporte->destinatario ?>
            </td>
            <td>  
            <b>RFC Destinatario:</b> <?= $cartaporte->rfcdes ?>
            </td>
            <td>  
            <b>Patio Destino:</b> <?= $cartaporte->patiodestino ?>
            </td>
            <td>  
            <b>Se entrega en:</b> <?= $cartaporte->lugarentrega ?>
            </td>
        </tr>
        
    </tbody>
</table>


<table class="table table-sm table-bordered">
    
    <tbody>
    <tr>
            <td>
            <b>Valor Unitario por cuota o fracción:</b>  <?= $cartaporte->valorUnitario ?> 
            </td>
            <td>  
            <b>Valor Declarado:</b>  <?= $cartaporte->valorDeclarado?>
            </td>
            <td>  
            <b>Peso Declarado:</b>  <?= $cartaporte->pesoDeclarado?>
            </td>
        </tr>
        
    </tbody>
</table>


<table class="table table-sm table-bordered">
    
    <tbody>
    <tr>
            <td>
            <b>Cantidad:</b>  <?= $cartaporte->cantidad ?> 
            </td>
            <td>  
            <b>Contenido:</b>  <?= $cartaporte->contenido?>
            </td>
            <td>  
            <b>Peso Declarado:</b>  <?= $cartaporte->pesoDeclarado?>
            </td>
           
  
        </tr>
        
    </tbody>
</table>

<table class="table table-sm table-bordered">
    
    <tbody>
    <tr>
         
           
            <td>  
            <b>Total Flete:</b>$<?= $cartaporte->totalFlete?>
            </td>
            <td>  
            <b> Seguro:</b>  $<?= $cartaporte->seguro?>
            </td>
            <td>  
            <b>Otros: </b>  $<?= $cartaporte->otros?>
            </td>
            <td>  
            <b>Importe:</b>  $<?= $cartaporte->importe?>
            </td>
            <td>  
            <b>IVA 16%:</b>  $<?= $cartaporte->iva?>
            </td>
            <td>  
            <b>Ret. IVA 4%:</b>  $<?= $cartaporte->retIva?>
            </td>
            <td>  
            <b>Neto:</b>  $<?= $cartaporte->neto?>
            </td>
        </tr>
        
    </tbody>
</table>


<table class="table table-sm table-bordered">
    
    <tbody>
    <tr>
            <td>
            <b> Cantidad en letras: </b>Un Peso 12/100
            </td>
        </tr>
        
    </tbody>
</table>

<table class="table table-sm ">
<tbody>
    <tr>
            <td   style="text-align:center">
           <H4>DOCUMENTO SIN VALOR FISCAL</H4>
            </>
        </tr>
        
    </tbody>
</table>

<h5>OBSERVACIONES:</h5>


<table class="table table-sm table-bordered">
    
    <tbody>
    <tr>
            <td>
            <b>Contacto:</b>  <?= $cartaporte->contacto ?> 
            </td>
            <td>  
            <b>Cita (fecha y hora):</b>  <?= $cartaporte->cita?>
            </td>
            <td>  
            <b>Impo/Expo:</b>  <?= $cartaporte->impoExpo?>
            </td>
            <td>  
            <b>Agencia Aduanal:</b>  <?= $cartaporte->agenciaAduanal?>
            </td>
             
            
        </tr>
        
    </tbody>
</table>
<table class="table table-sm table-bordered">
<tbody>
    <tr>
      
            <td>  
            <b>Pedimento:</b>  <?= $cartaporte->pedimento?>
            </td>
            <td>  
            <b>Referencia:</b>  <?= $cartaporte->referencia?>
            </td>
        </tr>
        
    </tbody>
</table>


<table class="table table-sm table-bordered">
    
    <tbody>
    <tr>
            <td>
            <b>Unidad:</b>  <?= $cartaporte->unidad ?> 
            </td>
            <td>  
            <b>Operador:</b>  <?= $cartaporte->operador?>
            </td>
            <td>  
            <b>Placas Tractor:</b>  <?= $cartaporte->tractorplacas?>
            </td>
            
           
        </tr>
        
    </tbody>
</table>


<table class="table table-sm table-bordered">
    
    <tbody>
    <tr>
            <td>
            <b>Remolque:</b>  <?= $cartaporte->remolque?>
            </td>
            <td>  
            <b>Placas Remolque:</b>  <?= $cartaporte->remolqueplacas?>
            </td>
           
        </tr>
        
    </tbody>
</table>

ESTA MERCANCÍA VIAJA POR CUENTA Y RIESGO DEL DESTINATARIO Y LIBRE DE MANIOBRAS PARA EL OPERADOR. 

</div></div>

    <div class="col-md-3"></div>
        
    </div>