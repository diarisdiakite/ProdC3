<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Departments Model
 *
 * @property \App\Model\Table\MinistriesTable|\Cake\ORM\Association\BelongsTo $Ministries
 * @property \App\Model\Table\PlanificationsTable|\Cake\ORM\Association\HasMany $Planifications
 * @property \App\Model\Table\RealizationsTable|\Cake\ORM\Association\HasMany $Realizations
 * @property \App\Model\Table\StructuresTable|\Cake\ORM\Association\HasMany $Structures
 * @property \App\Model\Table\InquiryDatabasesTable|\Cake\ORM\Association\BelongsToMany $InquiryDatabases
 * @property \App\Model\Table\MeetingsTable|\Cake\ORM\Association\BelongsToMany $Meetings
 * @property \App\Model\Table\ProjectActionsTable|\Cake\ORM\Association\BelongsToMany $ProjectActions
 * @property \App\Model\Table\TrainingsTable|\Cake\ORM\Association\BelongsToMany $Trainings
 *
 * @method \App\Model\Entity\Department get($primaryKey, $options = [])
 * @method \App\Model\Entity\Department newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Department[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Department|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Department|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Department patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Department[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Department findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DepartmentsTable extends Table
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

        $this->setTable('departments');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ministries', [
            'foreignKey' => 'ministry_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Planifications', [
            'foreignKey' => 'department_id'
        ]);
        $this->hasMany('Realizations', [
            'foreignKey' => 'department_id'
        ]);
        $this->hasMany('Structures', [
            'foreignKey' => 'department_id'
        ]);
        $this->belongsToMany('InquiryDatabases', [
            'foreignKey' => 'department_id',
            'targetForeignKey' => 'inquiry_database_id',
            'joinTable' => 'departments_inquiry_databases'
        ]);
        $this->belongsToMany('Meetings', [
            'foreignKey' => 'department_id',
            'targetForeignKey' => 'meeting_id',
            'joinTable' => 'departments_meetings'
        ]);
        $this->belongsToMany('ProjectActions', [
            'foreignKey' => 'department_id',
            'targetForeignKey' => 'project_action_id',
            'joinTable' => 'departments_project_actions'
        ]);
        $this->belongsToMany('Trainings', [
            'foreignKey' => 'department_id',
            'targetForeignKey' => 'training_id',
            'joinTable' => 'departments_trainings'
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
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('mission')
            ->allowEmpty('mission');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

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
        $rules->add($rules->existsIn(['ministry_id'], 'Ministries'));

        return $rules;
    }
}
