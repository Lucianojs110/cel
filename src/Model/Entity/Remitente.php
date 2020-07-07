<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Remitente Entity
 *
 * @property int $id
 * @property string $remitente
 * @property string $rfc
 * @property string $origen
 * @property string $domicilio
 * @property string $recogida
 */
class Remitente extends Entity
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
        'remitente' => true,
        'rfc' => true,
        'origen' => true,
        'domicilio' => true,
        'recogida' => true,
    ];
}
