<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Colocacion Model
 *
 * @property \App\Model\Table\LineasTable&\Cake\ORM\Association\BelongsTo $Lineas
 * @property \App\Model\Table\TransfersTable&\Cake\ORM\Association\BelongsTo $Transfers
 * @property &\Cake\ORM\Association\BelongsTo $Estatus
 *
 * @method \App\Model\Entity\Colocacion get($primaryKey, $options = [])
 * @method \App\Model\Entity\Colocacion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Colocacion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Colocacion|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Colocacion saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Colocacion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Colocacion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Colocacion findOrCreate($search, callable $callback = null, $options = [])
 */
class ColocacionTable extends Table
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

        $this->setTable('colocacion');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Lineas', [
            'foreignKey' => 'linea_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Transfers', [
            'foreignKey' => 'transfer_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Estatus', [
            'foreignKey' => 'estatus_id',
            'joinType' => 'INNER',
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

      

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
  
}
