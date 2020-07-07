
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
            <td style="text-align:center">
           <H4>DOCUMENTO SIN VALOR FISCAL</H4>
            </td>
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


<br>


<table class="table table-sm ">
    
    <tbody>
    <tr>
            <td>
            <b>CONDICIONES DEL CONTRATO DE TRANSPORTE QUE AMPARA ESTA CARTA DE PORTE </b><br>
            <hr>
    PRIMERA.- Para los efectos del presente contrato de transporte se denomina &quot;Porteador&quot; al transportista y &quot;Remitente&quot; al usuario que contrate el servicio.<br>
    SEGUNDA.- El &quot;Remitente&quot; es responsable de que la información proporcionada al &quot;Porteador&quot; sea veraz y que la documentación que entregue para efectos del transporte sea la correcta.<br>
    TERCERA.- El &quot;Remitente&quot; debe declarar al &quot;Porteador&quot; el tipo de mercancía o efectos de que se trate, peso, medidas y/o número de la carga que entrega para su transporte y, en su caso, el valor de la misma. La carga que se entregue a granel será pesada por el &quot;Porteador&quot; en el primer punto donde haya báscula apropiada o, en su defecto, aforada en metros cúbicos con la conformidad del &quot;Remitente&quot;. <br>
    CUARTA.- Para efectos del transporte, el &quot;Remitente&quot; deberá entregar al &quot;Porteador&quot; los documentos que las leyes y reglamentos exijan para llevar a cabo el servicio, en caso de no cumplirse con estos requisitos el &quot;Porteador&quot; está obligado a rehusar el transporte de las mercancías.<br>
    QUINTA.- Si por sospecha de falsedad en la declaración del contenido de un bulto el &quot;Porteador&quot; deseare proceder a su reconocimiento, podrá hacerlo ante testigos y con asistencia del &quot;Remitente&quot; o del consignatario. Si este último no concurriere, se solicitará la presencia de un inspector de la Secretaría de Comunicaciones y Transportes, y se levantará el acta correspondiente. El porteador tendrá en todo caso la obligación de dejar los bultos en el estado en que se encontraban antes del reconocimiento.<br>
    SEXTA.- El &quot;Porteador&quot; deberá recoger y entregar la carga precisamente en los domicilios que señale el &quot;Remitente&quot;, ajustándose a los términos y condiciones convenidos. El &quot;Porteador&quot; sólo está obligado a llevar la carga al domicilio del consignatario para su entrega una sola vez. Si ésta no fuera recibida, se dejará aviso de que la mercancía queda a disposición del interesado en las bodegas que indique el &quot;Porteador&quot;<br>
    SEPTIMA.- Si la carga no fuere retirada dentro de los 30 días siguientes a aquél en que hubiere sido puesta a disposición del consignatario, el &quot;Porteador&quot; podrá solicitar la venta en pública subasta con arreglo a lo que dispone el Código de Comercio.<br>
    OCTAVA.- El &quot;Porteador&quot; y el &quot;Remitente&quot; negociarán libremente el precio del servicio, tomando en cuenta su tipo, característica de los embarques, volumen, regularidad, clase de carga y sistema de pago.<br>
    NOVENA.- Si el &quot;Remitente&quot; desea que el &quot;Porteador&quot; asuma la responsabilidad por el valor de las mercancías o efectos que él declare y que cubra toda clase de riesgos, inclusive los derivados de caso fortuito o de fuerza mayor, las partes deberán convenir un cargo adicional, equivalente al valor de la prima del seguro que se contrate, el cual se deberá expresar en la carta de porte.<br>
    DECIMA.- Cuando el importe del flete no incluya el cargo adicional, la responsabilidad del &quot;Porteador&quot; queda expresamente limitada a la cantidad equivalente a 15 días del salario mínimo vigente en el Distrito Federal por tonelada o cuando se trate de embarques cuyo peso sea mayor de 200 kg. pero menor de 1000 kg; y a 4 días de salario mínimo por remesa cuando se trate de embarques con peso hasta de 200 kg.<br>
    DECIMA PRIMERA.- El precio del transporte deberá pagarse en origen, salvo convenio entre las partes de pago en destino. Cuando el transporte se hubiere concertado &quot;Flete por Cobrar&quot;, la entrega de las mercancías o efectos se hará contra el pago del flete y el &quot;Porteador&quot; tendrá derecho a retenerlos mientras no se le cubra el precio convenido.<br>
    DECIMA SEGUNDA.- Si al momento de la entrega resultare algún faltante o avería, el consignatario deberá hacerla constar en ese acto en la carta de porte y formular su reclamación por escrito al &quot;Porteador&quot;, dentro de las 24 horas siguientes.<br>
    DECIMA TERCERA.- El &quot;Porteador&quot; queda eximido de la obligación de recibir mercancías o efectos para su transporte, en los siguientes casos:<br>
    a) Cuando se trate de carga que por su naturaleza, peso, volumen, embalaje, defectuoso o cualquier otra circunstancia no pueda transportarse sin destruirse o sin causar daño a los demás artículos o al material rodante, salvo que la empresa de que se trate tenga el equipo adecuado.<br>
    b) Las mercancías cuyo transporte haya sido prohibido por disposiciones legales o reglamentarias. Cuando tales disposiciones no prohiban precisamente el transporte de determinadas mercancías, pero sí ordenen la presentación de ciertos documentos para que puedan ser transportadas, el &quot;Remitente&quot; estará obligado a entregar al &quot;Porteador&quot; los documentos correspondientes. <br>
            </td>
         
           
        </tr>
        
    </tbody>
</table>

