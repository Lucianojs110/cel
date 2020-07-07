<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * General Model
 *
 * @method \App\Model\Entity\General get($primaryKey, $options = [])
 * @method \App\Model\Entity\General newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\General[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\General|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\General saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\General patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\General[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\General findOrCreate($search, callable $callback = null, $options = [])
 */
class GeneralTable extends Table
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

        $this->setTable('general');
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
            ->scalar('sched')
            ->maxLength('sched', 50)
            ->requirePresence('sched', 'create')
            ->notEmptyString('sched');

       

        return $validator;
    }
}
