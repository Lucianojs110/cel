<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Potemp Model
 *
 * @method \App\Model\Entity\Potemp get($primaryKey, $options = [])
 * @method \App\Model\Entity\Potemp newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Potemp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Potemp|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Potemp saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Potemp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Potemp[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Potemp findOrCreate($search, callable $callback = null, $options = [])
 */
class PotempTable extends Table
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

        $this->setTable('potemp');
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
            ->requirePresence('id', 'create')
            ->notEmptyString('id');

        $validator
            ->scalar('pickup')
            ->maxLength('pickup', 50)
            ->requirePresence('pickup', 'create')
            ->notEmptyString('pickup');

        $validator
            ->scalar('cliente')
            ->maxLength('cliente', 50)
            ->requirePresence('cliente', 'create')
            ->notEmptyString('cliente');

        $validator
            ->scalar('entrega')
            ->maxLength('entrega', 50)
            ->requirePresence('entrega', 'create')
            ->notEmptyString('entrega');

        return $validator;
    }
}
