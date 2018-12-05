<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjectActions Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TypesTable|\Cake\ORM\Association\BelongsTo $Types
 * @property \App\Model\Table\ExpectedResultsTable|\Cake\ORM\Association\BelongsTo $ExpectedResults
 * @property \App\Model\Table\InsertsTable|\Cake\ORM\Association\HasMany $Inserts
 * @property \App\Model\Table\TechnicalsTable|\Cake\ORM\Association\HasMany $Technicals
 * @property \App\Model\Table\TrainingsTable|\Cake\ORM\Association\HasMany $Trainings
 * @property \App\Model\Table\DepartmentsTable|\Cake\ORM\Association\BelongsToMany $Departments
 *
 * @method \App\Model\Entity\ProjectAction get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjectAction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjectAction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectAction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectAction|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectAction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectAction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectAction findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProjectActionsTable extends Table
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

        $this->setTable('project_actions');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Types', [
            'foreignKey' => 'type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ExpectedResults', [
            'foreignKey' => 'expected_result_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Inserts', [
            'foreignKey' => 'project_action_id'
        ]);
        $this->hasMany('Technicals', [
            'foreignKey' => 'project_action_id'
        ]);
        $this->hasMany('Trainings', [
            'foreignKey' => 'project_action_id'
        ]);
        $this->belongsToMany('Departments', [
            'foreignKey' => 'project_action_id',
            'targetForeignKey' => 'department_id',
            'joinTable' => 'departments_project_actions'
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
            ->integer('num')
            ->allowEmpty('num');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->boolean('approved')
            ->allowEmpty('approved');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['type_id'], 'Types'));
        $rules->add($rules->existsIn(['expected_result_id'], 'ExpectedResults'));

        return $rules;
    }
}
