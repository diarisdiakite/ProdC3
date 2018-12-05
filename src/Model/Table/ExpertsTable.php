<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Experts Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TeamsTable|\Cake\ORM\Association\BelongsTo $Teams
 * @property \App\Model\Table\AssistantsTable|\Cake\ORM\Association\HasMany $Assistants
 * @property \App\Model\Table\FocalPointsTable|\Cake\ORM\Association\HasMany $FocalPoints
 * @property \App\Model\Table\MinistriesTable|\Cake\ORM\Association\HasMany $Ministries
 * @property \App\Model\Table\ProgrammationsTable|\Cake\ORM\Association\HasMany $Programmations
 * @property \App\Model\Table\AssignementsTable|\Cake\ORM\Association\BelongsToMany $Assignements
 * @property \App\Model\Table\MeetingsTable|\Cake\ORM\Association\BelongsToMany $Meetings
 *
 * @method \App\Model\Entity\Expert get($primaryKey, $options = [])
 * @method \App\Model\Entity\Expert newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Expert[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Expert|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Expert|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Expert patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Expert[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Expert findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExpertsTable extends Table
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

        $this->setTable('experts');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Teams', [
            'foreignKey' => 'team_id'
        ]);
        $this->hasMany('Assistants', [
            'foreignKey' => 'expert_id'
        ]);
        $this->hasMany('FocalPoints', [
            'foreignKey' => 'expert_id'
        ]);
        $this->hasMany('Ministries', [
            'foreignKey' => 'expert_id'
        ]);
        $this->hasMany('Programmations', [
            'foreignKey' => 'expert_id'
        ]);
        $this->belongsToMany('Assignements', [
            'foreignKey' => 'expert_id',
            'targetForeignKey' => 'assignement_id',
            'joinTable' => 'assignements_experts'
        ]);
        $this->belongsToMany('Meetings', [
            'foreignKey' => 'expert_id',
            'targetForeignKey' => 'meeting_id',
            'joinTable' => 'experts_meetings'
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('adress')
            ->maxLength('adress', 255)
            ->allowEmpty('adress');

        $validator
            ->integer('tel')
            ->requirePresence('tel', 'create')
            ->notEmpty('tel');

        $validator
            ->scalar('position')
            ->maxLength('position', 255)
            ->requirePresence('position', 'create')
            ->notEmpty('position');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->scalar('linkedin')
            ->maxLength('linkedin', 255)
            ->requirePresence('linkedin', 'create')
            ->notEmpty('linkedin');

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
        $rules->add($rules->existsIn(['team_id'], 'Teams'));

        return $rules;
    }
}
