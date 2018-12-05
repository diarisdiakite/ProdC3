<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ActivationsInserts Model
 *
 * @property \App\Model\Table\ActivationsTable|\Cake\ORM\Association\BelongsTo $Activations
 * @property \App\Model\Table\InsertsTable|\Cake\ORM\Association\BelongsTo $Inserts
 *
 * @method \App\Model\Entity\ActivationsInsert get($primaryKey, $options = [])
 * @method \App\Model\Entity\ActivationsInsert newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ActivationsInsert[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ActivationsInsert|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActivationsInsert|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActivationsInsert patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ActivationsInsert[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ActivationsInsert findOrCreate($search, callable $callback = null, $options = [])
 */
class ActivationsInsertsTable extends Table
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

        $this->setTable('activations_inserts');
        $this->setDisplayField('activation_id');
        $this->setPrimaryKey(['activation_id', 'insert_id']);

        $this->belongsTo('Activations', [
            'foreignKey' => 'activation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Inserts', [
            'foreignKey' => 'insert_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['activation_id'], 'Activations'));
        $rules->add($rules->existsIn(['insert_id'], 'Inserts'));

        return $rules;
    }
}
