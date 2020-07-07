<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Destinatario Model
 *
 * @method \App\Model\Entity\Destinatario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Destinatario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Destinatario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Destinatario|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Destinatario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Destinatario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Destinatario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Destinatario findOrCreate($search, callable $callback = null, $options = [])
 */
class DestinatarioTable extends Table
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

        $this->setTable('destinatario');
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
            ->scalar('destinatario')
            ->maxLength('destinatario', 60)
            ->requirePresence('destinatario', 'create')
            ->notEmptyString('destinatario');

        $validator
            ->scalar('destino')
            ->maxLength('destino', 60)
            ->requirePresence('destino', 'create')
            ->notEmptyString('destino');

        $validator
            ->scalar('rfc')
            ->maxLength('rfc', 60)
            ->requirePresence('rfc', 'create')
            ->notEmptyString('rfc');

        $validator
            ->scalar('domicilio')
            ->maxLength('domicilio', 60)
            ->requirePresence('domicilio', 'create')
            ->notEmptyString('domicilio');

        $validator
            ->scalar('entrega')
            ->maxLength('entrega', 60)
            ->requirePresence('entrega', 'create')
            ->notEmptyString('entrega');

        return $validator;
    }
}
