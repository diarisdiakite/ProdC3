<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DepartmentsTrainings Model
 *
 * @property \App\Model\Table\DepartmentsTable|\Cake\ORM\Association\BelongsTo $Departments
 * @property \App\Model\Table\TrainingsTable|\Cake\ORM\Association\BelongsTo $Trainings
 *
 * @method \App\Model\Entity\DepartmentsTraining get($primaryKey, $options = [])
 * @method \App\Model\Entity\DepartmentsTraining newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DepartmentsTraining[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentsTraining|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DepartmentsTraining|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DepartmentsTraining patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentsTraining[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentsTraining findOrCreate($search, callable $callback = null, $options = [])
 */
class DepartmentsTrainingsTable extends Table
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

        $this->setTable('departments_trainings');
        $this->setDisplayField('department_id');
        $this->setPrimaryKey(['department_id', 'training_id']);

        $this->belongsTo('Departments', [
            'foreignKey' => 'department_id',
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
        $rules->add($rules->existsIn(['department_id'], 'Departments'));
        $rules->add($rules->existsIn(['training_id'], 'Trainings'));

        return $rules;
    }
}
