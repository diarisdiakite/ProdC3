<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Trainings Model
 *
 * @property \App\Model\Table\ProjectActionsTable|\Cake\ORM\Association\BelongsTo $ProjectActions
 * @property \App\Model\Table\MinistriesTable|\Cake\ORM\Association\BelongsTo $Ministries
 * @property \App\Model\Table\SectorsTable|\Cake\ORM\Association\BelongsTo $Sectors
 * @property \App\Model\Table\LeashesTable|\Cake\ORM\Association\BelongsTo $Leashes
 * @property \App\Model\Table\JobEmploymentsTable|\Cake\ORM\Association\BelongsTo $JobEmployments
 * @property \App\Model\Table\TypesTable|\Cake\ORM\Association\BelongsTo $Types
 * @property \App\Model\Table\DateYearsTable|\Cake\ORM\Association\BelongsTo $DateYears
 * @property \App\Model\Table\DepartmentsTable|\Cake\ORM\Association\BelongsToMany $Departments
 * @property \App\Model\Table\MinistriesTable|\Cake\ORM\Association\BelongsToMany $Ministries
 * @property \App\Model\Table\StructuresTable|\Cake\ORM\Association\BelongsToMany $Structures
 *
 * @method \App\Model\Entity\Training get($primaryKey, $options = [])
 * @method \App\Model\Entity\Training newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Training[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Training|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Training|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Training patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Training[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Training findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TrainingsTable extends Table
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

        $this->setTable('trainings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ProjectActions', [
            'foreignKey' => 'project_action_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Ministries', [
            'foreignKey' => 'ministry_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sectors', [
            'foreignKey' => 'sector_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Leashes', [
            'foreignKey' => 'leash_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('JobEmployments', [
            'foreignKey' => 'job_employment_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Types', [
            'foreignKey' => 'type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('DateYears', [
            'foreignKey' => 'date_year_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Departments', [
            'foreignKey' => 'training_id',
            'targetForeignKey' => 'department_id',
            'joinTable' => 'departments_trainings'
        ]);
        $this->belongsToMany('Ministries', [
            'foreignKey' => 'training_id',
            'targetForeignKey' => 'ministry_id',
            'joinTable' => 'ministries_trainings'
        ]);
        $this->belongsToMany('Structures', [
            'foreignKey' => 'training_id',
            'targetForeignKey' => 'structure_id',
            'joinTable' => 'structures_trainings'
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->integer('effectif')
            ->allowEmpty('effectif');

        $validator
            ->date('beginning')
            ->allowEmpty('beginning');

        $validator
            ->integer('duration')
            ->allowEmpty('duration');

        return $validator;
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
        $rules->add($rules->existsIn(['project_action_id'], 'ProjectActions'));
        $rules->add($rules->existsIn(['ministry_id'], 'Ministries'));
        $rules->add($rules->existsIn(['sector_id'], 'Sectors'));
        $rules->add($rules->existsIn(['leash_id'], 'Leashes'));
        $rules->add($rules->existsIn(['job_employment_id'], 'JobEmployments'));
        $rules->add($rules->existsIn(['type_id'], 'Types'));
        $rules->add($rules->existsIn(['date_year_id'], 'DateYears'));

        return $rules;
    }
}
