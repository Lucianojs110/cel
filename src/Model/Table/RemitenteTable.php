<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Remitente Model
 *
 * @method \App\Model\Entity\Remitente get($primaryKey, $options = [])
 * @method \App\Model\Entity\Remitente newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Remitente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Remitente|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Remitente saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Remitente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Remitente[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Remitente findOrCreate($search, callable $callback = null, $options = [])
 */
class RemitenteTable extends Table
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

        $this->setTable('remitente');
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
            ->scalar('remitente')
            ->maxLength('remitente', 60)
            ->requirePresence('remitente', 'create')
            ->notEmptyString('remitente');

        $validator
            ->scalar('rfc')
            ->maxLength('rfc', 60)
            ->requirePresence('rfc', 'create')
            ->notEmptyString('rfc');

        $validator
            ->scalar('origen')
            ->maxLength('origen', 60)
            ->requirePresence('origen', 'create')
            ->notEmptyString('origen');

        $validator
            ->scalar('domicilio')
            ->maxLength('domicilio', 60)
            ->requirePresence('domicilio', 'create')
            ->notEmptyString('domicilio');

        $validator
            ->scalar('recogida')
            ->maxLength('recogida', 60)
            ->requirePresence('recogida', 'create')
            ->notEmptyString('recogida');

        return $validator;
    }
}
