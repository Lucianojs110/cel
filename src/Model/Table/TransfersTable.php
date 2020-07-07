<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transfers Model
 *
 * @property \App\Model\Table\ColocacionTable&\Cake\ORM\Association\HasMany $Colocacion
 *
 * @method \App\Model\Entity\Transfer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Transfer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Transfer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transfer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transfer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transfer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Transfer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transfer findOrCreate($search, callable $callback = null, $options = [])
 */
class TransfersTable extends Table
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

        $this->setTable('transfers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Colocacion', [
            'foreignKey' => 'transfer_id',
        ]);
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
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('name_ab')
            ->maxLength('name_ab', 50)
            ->requirePresence('name_ab', 'create')
            ->notEmptyString('name_ab');

        return $validator;
    }
}
