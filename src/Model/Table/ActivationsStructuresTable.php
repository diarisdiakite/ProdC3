<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ActivationsStructures Model
 *
 * @property \App\Model\Table\ActivationsTable|\Cake\ORM\Association\BelongsTo $Activations
 * @property \App\Model\Table\StructuresTable|\Cake\ORM\Association\BelongsTo $Structures
 *
 * @method \App\Model\Entity\ActivationsStructure get($primaryKey, $options = [])
 * @method \App\Model\Entity\ActivationsStructure newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ActivationsStructure[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ActivationsStructure|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActivationsStructure|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActivationsStructure patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ActivationsStructure[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ActivationsStructure findOrCreate($search, callable $callback = null, $options = [])
 */
class ActivationsStructuresTable extends Table
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

        $this->setTable('activations_structures');
        $this->setDisplayField('activation_id');
        $this->setPrimaryKey(['activation_id', 'structure_id']);

        $this->belongsTo('Activations', [
            'foreignKey' => 'activation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Structures', [
            'foreignKey' => 'structure_id',
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
        $rules->add($rules->existsIn(['structure_id'], 'Structures'));

        return $rules;
    }
}
