<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cartaporte Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $fechaExp
 * @property string $lugarExp
 * @property string $origen
 * @property string $remitente
 * @property string $rfcrem
 * @property string $domiciliorem
 * @property string $lugarrecogida
 * @property string $destino
 * @property string $destinatario
 * @property string $rfcdes
 * @property string $patiodestino
 * @property string $lugarentrega
 * @property string $valorUnitario
 * @property string $valorDeclarado
 * @property string $pesoDeclarado
 * @property string $cantidad
 * @property string $contenido
 * @property string $totalFlete
 * @property string $seguro
 * @property string $otros
 * @property string $importe
 * @property string $iva
 * @property string $retIva
 * @property string $neto
 * @property string $totalLetras
 * @property string $contacto
 * @property string $cita
 * @property string $impoExpo
 * @property string $agenciaAduanal
 * @property string $pedimento
 * @property string $referencia
 * @property string $unidad
 * @property string $operador
 * @property string $permisionario
 * @property string $remolque
 * @property string $remolqueplacas
 * @property string $tractorplacas
 */
class Cartaporte extends Entity
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
        'fechaExp' => true,
        'lugarExp' => true,
        'origen' => true,
        'remitente' => true,
        'rfcrem' => true,
        'domiciliorem' => true,
        'lugarrecogida' => true,
        'destino' => true,
        'destinatario' => true,
        'rfcdes' => true,
        'patiodestino' => true,
        'lugarentrega' => true,
        'valorUnitario' => true,
        'valorDeclarado' => true,
        'pesoDeclarado' => true,
        'cantidad' => true,
        'contenido' => true,
        'totalFlete' => true,
        'seguro' => true,
        'otros' => true,
        'importe' => true,
        'iva' => true,
        'retIva' => true,
        'neto' => true,
        'totalLetras' => true,
        'contacto' => true,
        'cita' => true,
        'impoExpo' => true,
        'agenciaAduanal' => true,
        'pedimento' => true,
        'referencia' => true,
        'unidad' => true,
        'operador' => true,
        'permisionario' => true,
        'remolque' => true,
        'remolqueplacas' => true,
        'tractorplacas' => true,
    ];
}
