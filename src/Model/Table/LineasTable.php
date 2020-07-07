<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lineas Model
 *
 * @property \App\Model\Table\ColocacionTable&\Cake\ORM\Association\HasMany $Colocacion
 *
 * @method \App\Model\Entity\Linea get($primaryKey, $options = [])
 * @method \App\Model\Entity\Linea newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Linea[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Linea|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Linea saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Linea patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Linea[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Linea findOrCreate($search, callable $callback = null, $options = [])
 */
class LineasTable extends Table
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

        $this->setTable('lineas');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Colocacion', [
            'foreignKey' => 'linea_id',
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
            ->scalar('linea_ab')
            ->maxLength('linea_ab', 60)
            ->requirePresence('linea_ab', 'create')
            ->notEmptyString('linea_ab');

        return $validator;
    }
}
