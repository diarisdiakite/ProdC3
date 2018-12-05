<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StructuresTrainings Model
 *
 * @property \App\Model\Table\StructuresTable|\Cake\ORM\Association\BelongsTo $Structures
 * @property \App\Model\Table\TrainingsTable|\Cake\ORM\Association\BelongsTo $Trainings
 *
 * @method \App\Model\Entity\StructuresTraining get($primaryKey, $options = [])
 * @method \App\Model\Entity\StructuresTraining newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StructuresTraining[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StructuresTraining|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StructuresTraining|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StructuresTraining patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StructuresTraining[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StructuresTraining findOrCreate($search, callable $callback = null, $options = [])
 */
class StructuresTrainingsTable extends Table
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

        $this->setTable('structures_trainings');
        $this->setDisplayField('structure_id');
        $this->setPrimaryKey(['structure_id', 'training_id']);

        $this->belongsTo('Structures', [
            'foreignKey' => 'structure_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Trainings', [
            'foreignKey' => 'training_id',
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
        $rules->add($rules->existsIn(['structure_id'], 'Structures'));
        $rules->add($rules->existsIn(['training_id'], 'Trainings'));

        return $rules;
    }
}
