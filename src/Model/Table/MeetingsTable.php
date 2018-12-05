<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Meetings Model
 *
 * @property \App\Model\Table\ProgrammationsTable|\Cake\ORM\Association\BelongsTo $Programmations
 * @property \App\Model\Table\MeetingSubjectsTable|\Cake\ORM\Association\HasMany $MeetingSubjects
 * @property \App\Model\Table\DepartmentsTable|\Cake\ORM\Association\BelongsToMany $Departments
 * @property \App\Model\Table\ExpertsTable|\Cake\ORM\Association\BelongsToMany $Experts
 * @property \App\Model\Table\MinistriesTable|\Cake\ORM\Association\BelongsToMany $Ministries
 *
 * @method \App\Model\Entity\Meeting get($primaryKey, $options = [])
 * @method \App\Model\Entity\Meeting newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Meeting[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Meeting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Meeting|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Meeting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Meeting[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Meeting findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MeetingsTable extends Table
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

        $this->setTable('meetings');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Programmations', [
            'foreignKey' => 'programmation_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('MeetingSubjects', [
            'foreignKey' => 'meeting_id'
        ]);
        $this->belongsToMany('Departments', [
            'foreignKey' => 'meeting_id',
            'targetForeignKey' => 'department_id',
            'joinTable' => 'departments_meetings'
        ]);
        $this->belongsToMany('Experts', [
            'foreignKey' => 'meeting_id',
            'targetForeignKey' => 'expert_id',
            'joinTable' => 'experts_meetings'
        ]);
        $this->belongsToMany('Ministries', [
            'foreignKey' => 'meeting_id',
            'targetForeignKey' => 'ministry_id',
            'joinTable' => 'meetings_ministries'
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
        $rules->add($rules->existsIn(['programmation_id'], 'Programmations'));

        return $rules;
    }
}
