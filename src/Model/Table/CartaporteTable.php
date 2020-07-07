<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cartaporte Model
 *
 * @method \App\Model\Entity\Cartaporte get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cartaporte newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cartaporte[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cartaporte|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cartaporte saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cartaporte patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cartaporte[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cartaporte findOrCreate($search, callable $callback = null, $options = [])
 */
class CartaporteTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('cartaporte');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->date('fechaExp')
            ->requirePresence('fechaExp', 'create')
            ->notEmptyDate('fechaExp');

        $validator
            ->scalar('lugarExp')
            ->maxLength('lugarExp', 60)
            ->requirePresence('lugarExp', 'create')
            ->notEmptyString('lugarExp');

        $validator
            ->scalar('origen')
            ->maxLength('origen', 60)
            ->requirePresence('origen', 'create')
            ->notEmptyString('origen');

        $validator
            ->scalar('remitente')
            ->maxLength('remitente', 60)
            ->requirePresence('remitente', 'create')
            ->notEmptyString('remitente');

        $validator
            ->scalar('rfcrem')
            ->maxLength('rfcrem', 60)
            ->requirePresence('rfcrem', 'create')
            ->notEmptyString('rfcrem');

        $validator
            ->scalar('domiciliorem')
            ->maxLength('domiciliorem', 60)
            ->requirePresence('domiciliorem', 'create')
            ->notEmptyString('domiciliorem');

        $validator
            ->scalar('lugarrecogida')
            ->maxLength('lugarrecogida', 60)
            ->requirePresence('lugarrecogida', 'create')
            ->notEmptyString('lugarrecogida');

        $validator
            ->scalar('destino')
            ->maxLength('destino', 60)
            ->requirePresence('destino', 'create')
            ->notEmptyString('destino');

        $validator
            ->scalar('destinatario')
            ->maxLength('destinatario', 60)
            ->requirePresence('destinatario', 'create')
            ->notEmptyString('destinatario');

        $validator
            ->scalar('rfcdes')
            ->maxLength('rfcdes', 60)
            ->requirePresence('rfcdes', 'create')
            ->notEmptyString('rfcdes');

        $validator
            ->scalar('patiodestino')
            ->maxLength('patiodestino', 60)
            ->requirePresence('patiodestino', 'create')
            ->notEmptyString('patiodestino');

        $validator
            ->scalar('lugarentrega')
            ->maxLength('lugarentrega', 60)
            ->requirePresence('lugarentrega', 'create')
            ->notEmptyString('lugarentrega');

        $validator
            ->scalar('valorUnitario')
            ->maxLength('valorUnitario', 60)
            ->requirePresence('valorUnitario', 'create')
            ->notEmptyString('valorUnitario');

        $validator
            ->scalar('valorDeclarado')
            ->maxLength('valorDeclarado', 60)
            ->requirePresence('valorDeclarado', 'create')
            ->notEmptyString('valorDeclarado');

        $validator
            ->scalar('pesoDeclarado')
            ->maxLength('pesoDeclarado', 60)
            ->requirePresence('pesoDeclarado', 'create')
            ->notEmptyString('pesoDeclarado');

       

        $validator
            ->scalar('totalLetras')
            ->maxLength('totalLetras', 60)
            ->requirePresence('totalLetras', 'create')
            ->notEmptyString('totalLetras');

        $validator
            ->scalar('contacto')
            ->maxLength('contacto', 60)
            ->requirePresence('contacto', 'create')
            ->notEmptyString('contacto');

        $validator
            ->scalar('cita')
            ->maxLength('cita', 20)
            ->requirePresence('cita', 'create')
            ->notEmptyString('cita');

        $validator
            ->scalar('impoExpo')
            ->maxLength('impoExpo', 60)
            ->requirePresence('impoExpo', 'create')
            ->notEmptyString('impoExpo');

        $validator
            ->scalar('agenciaAduanal')
            ->maxLength('agenciaAduanal', 60)
            ->requirePresence('agenciaAduanal', 'create')
            ->notEmptyString('agenciaAduanal');

        $validator
            ->scalar('pedimento')
            ->maxLength('pedimento', 60)
            ->requirePresence('pedimento', 'create')
            ->notEmptyString('pedimento');

        $validator
            ->scalar('referencia')
            ->maxLength('referencia', 60)
            ->requirePresence('referencia', 'create')
            ->notEmptyString('referencia');

        $validator
            ->scalar('unidad')
            ->maxLength('unidad', 60)
            ->requirePresence('unidad', 'create')
            ->notEmptyString('unidad');

        $validator
            ->scalar('operador')
            ->maxLength('operador', 60)
            ->requirePresence('operador', 'create')
            ->notEmptyString('operador');

        $validator
            ->scalar('permisionario')
            ->maxLength('permisionario', 60)
            ->requirePresence('permisionario', 'create')
            ->notEmptyString('permisionario');

        $validator
            ->scalar('remolque')
            ->maxLength('remolque', 60)
            ->requirePresence('remolque', 'create')
            ->notEmptyString('remolque');

        $validator
            ->scalar('remolqueplacas')
            ->maxLength('remolqueplacas', 60)
            ->requirePresence('remolqueplacas', 'create')
            ->notEmptyString('remolqueplacas');

        $validator
            ->scalar('tractorplacas')
            ->maxLength('tractorplacas', 60)
            ->requirePresence('tractorplacas', 'create')
            ->notEmptyString('tractorplacas');

        return $validator;
    }
}
