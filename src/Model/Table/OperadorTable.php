<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Operador Model
 *
 * @method \App\Model\Entity\Operador get($primaryKey, $options = [])
 * @method \App\Model\Entity\Operador newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Operador[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Operador|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Operador saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Operador patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Operador[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Operador findOrCreate($search, callable $callback = null, $options = [])
 */
class OperadorTable extends Table
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

        $this->setTable('operador');
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
            ->scalar('operador')
            ->maxLength('operador', 60)
            ->requirePresence('operador', 'create')
            ->notEmptyString('operador');

        $validator
            ->scalar('unidad')
            ->maxLength('unidad', 60)
            ->requirePresence('unidad', 'create')
            ->notEmptyString('unidad');

        $validator
            ->scalar('placatractor')
            ->maxLength('placatractor', 60)
            ->requirePresence('placatractor', 'create')
            ->notEmptyString('placatractor');

        $validator
            ->scalar('permisionario')
            ->maxLength('permisionario', 60)
            ->requirePresence('permisionario', 'create')
            ->notEmptyString('permisionario');

        return $validator;
    }
}
