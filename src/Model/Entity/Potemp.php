<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Potemp Entity
 *
 * @property int $id
 * @property string $pickup
 * @property string $cliente
 * @property string $entrega
 */
class Potemp extends Entity
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
        'id' => true,
        'pickup' => true,
        'cliente' => true,
        'entrega' => true,
    ];
}
