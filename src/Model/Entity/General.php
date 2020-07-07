<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * General Entity
 *
 * @property int $id
 * @property string $sched
 * @property string $arrive
 * @property string $number
 * @property string $product
 * @property string $client
 * @property string $carga
 * @property string $carrier
 * @property string $boxusa
 * @property string $cita
 * @property string $origen
 * @property string $destino
 * @property string $pickup
 * @property string $poanexo
 * @property string $cajanac
 * @property string $colocacion
 * @property string $peso
 * @property string $bultos
 * @property string $entrega
 */
class General extends Entity
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
        'sched' => true,
        'arrive' => true,
        'number' => true,
        'product' => true,
        'client' => true,
        'carga' => true,
        'carrier' => true,
        'boxusa' => true,
        'cita' => true,
        'origen' => true,
        'destino' => true,
        'pickup' => true,
        'poanexo' => true,
        'cajanac' => true,
        'colocacion' => true,
        'peso' => true,
        'bultos' => true,
        'entrega' => true,
    ];
}
