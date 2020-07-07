<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Colocacion Entity
 *
 * @property int $id
 * @property string $colocacion
 * @property string $caja
 * @property int $linea_id
 * @property string $id_general
 * @property string $pickup
 * @property string $cliente
 * @property string $entrega
 * @property string $poanexo
 * @property string $trasbordo
 * @property string $entregada
 * @property string $importacion
 * @property string $cruce
 * @property int $transfer_id
 * @property int $estatus_id
 * @property string $despacho
 * @property string $descargada
 * @property string $transRecepcion
 * @property string $transportista
 * @property string $transFactura
 * @property string $transImporte
 * @property string $transPago
 * @property string $transCheque
 * @property string $transferRecepcion
 * @property string $transfer2
 * @property string $transferImporte
 * @property string $transferPago
 * @property string $transferCheque
 * @property string $orbisFactura
 * @property string $orbisCliente
 * @property string $orbisPeso
 * @property string $orbisDolares
 * @property string $orbisTotalFactura
 * @property string $orbisEnvio
 * @property string $orbisRelacion
 * @property string $orbisPago
 * @property string $orbisCheque
 *
 * @property \App\Model\Entity\Linea $linea
 * @property \App\Model\Entity\Transfer $transfer
 * @property \App\Model\Entity\Estatus $estatus
 */
class Colocacion extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'colocacion' => true,
        'caja' => true,
        'linea_id' => true,
        'id_general' => true,
        'pickup' => true,
        'cliente' => true,
        'entrega' => true,
        'poanexo' => true,
        'trasbordo' => true,
        'entregada' => true,
        'importacion' => true,
        'cruce' => true,
        'transfer_id' => true,
        'estatus_id' => true,
        'despacho' => true,
        'descargada' => true,
        'transRecepcion' => true,
        'transportista' => true,
        'transFactura' => true,
        'transImporte' => true,
        'transPago' => true,
        'transCheque' => true,
        'transferRecepcion' => true,
        'transfer2' => true,
        'transferImporte' => true,
        'transferPago' => true,
        'transferCheque' => true,
        'orbisFactura' => true,
        'orbisCliente' => true,
        'orbisPeso' => true,
        'orbisDolares' => true,
        'orbisTotalFactura' => true,
        'orbisEnvio' => true,
        'orbisRelacion' => true,
        'orbisPago' => true,
        'orbisCheque' => true,
        'linea' => true,
        'transfer' => true,
        'estatus' => true,
    ];
}
