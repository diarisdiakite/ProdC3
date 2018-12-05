<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MinistriesTrainings Model
 *
 * @property \App\Model\Table\MinistriesTable|\Cake\ORM\Association\BelongsTo $Ministries
 * @property \App\Model\Table\TrainingsTable|\Cake\ORM\Association\BelongsTo $Trainings
 *
 * @method \App\Model\Entity\MinistriesTraining get($primaryKey, $options = [])
 * @method \App\Model\Entity\MinistriesTraining newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MinistriesTraining[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MinistriesTraining|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MinistriesTraining|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MinistriesTraining patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MinistriesTraining[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MinistriesTraining findOrCreate($search, callable $callback = null, $options = [])
 */
class MinistriesTrainingsTable extends Table
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

        $this->setTable('ministries_trainings');
        $this->setDisplayField('ministry_id');
        $this->setPrimaryKey(['ministry_id', 'training_id']);

        $this->belongsTo('Ministries', [
            'foreignKey' => 'ministry_id',
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
        $rules->add($rules->existsIn(['ministry_id'], 'Ministries'));
        $rules->add($rules->existsIn(['training_id'], 'Trainings'));

        return $rules;
    }
}
