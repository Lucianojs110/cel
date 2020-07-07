<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Destinatario Entity
 *
 * @property int $id
 * @property string $destinatario
 * @property string $destino
 * @property string $rfc
 * @property string $domicilio
 * @property string $entrega
 */
class Destinatario extends Entity
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
        'destinatario' => true,
        'destino' => true,
        'rfc' => true,
        'domicilio' => true,
        'entrega' => true,
    ];
}
