<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ministries Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\DecretsTable|\Cake\ORM\Association\BelongsTo $Decrets
 * @property \App\Model\Table\TeamsTable|\Cake\ORM\Association\BelongsTo $Teams
 * @property \App\Model\Table\ExpertsTable|\Cake\ORM\Association\BelongsTo $Experts
 * @property \App\Model\Table\DepartmentsTable|\Cake\ORM\Association\HasMany $Departments
 * @property \App\Model\Table\FocalPointsTable|\Cake\ORM\Association\HasMany $FocalPoints
 * @property \App\Model\Table\InsertsTable|\Cake\ORM\Association\HasMany $Inserts
 * @property \App\Model\Table\PlanificationsTable|\Cake\ORM\Association\HasMany $Planifications
 * @property \App\Model\Table\StructuresTable|\Cake\ORM\Association\HasMany $Structures
 * @property \App\Model\Table\TrainingsTable|\Cake\ORM\Association\HasMany $Trainings
 * @property \App\Model\Table\MeetingsTable|\Cake\ORM\Association\BelongsToMany $Meetings
 * @property \App\Model\Table\TrainingsTable|\Cake\ORM\Association\BelongsToMany $Trainings
 *
 * @method \App\Model\Entity\Ministry get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ministry newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ministry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ministry|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ministry|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ministry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ministry[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ministry findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MinistriesTable extends Table
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

        $this->setTable('ministries');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Decrets', [
            'foreignKey' => 'decret_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Teams', [
            'foreignKey' => 'team_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Experts', [
            'foreignKey' => 'expert_id'
        ]);
        $this->hasMany('Departments', [
            'foreignKey' => 'ministry_id'
        ]);
        $this->hasMany('FocalPoints', [
            'foreignKey' => 'ministry_id'
        ]);
        $this->hasMany('Inserts', [
            'foreignKey' => 'ministry_id'
        ]);
        $this->hasMany('Planifications', [
            'foreignKey' => 'ministry_id'
        ]);
        $this->hasMany('Structures', [
            'foreignKey' => 'ministry_id'
        ]);
        $this->hasMany('Trainings', [
            'foreignKey' => 'ministry_id'
        ]);
        $this->belongsToMany('Meetings', [
            'foreignKey' => 'ministry_id',
            'targetForeignKey' => 'meeting_id',
            'joinTable' => 'meetings_ministries'
        ]);
        $this->belongsToMany('Trainings', [
            'foreignKey' => 'ministry_id',
            'targetForeignKey' => 'training_id',
            'joinTable' => 'ministries_trainings'
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
            ->integer('approved')
            ->allowEmpty('approved');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

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
        $rules->add($rules->existsIn(['decret_id'], 'Decrets'));
        $rules->add($rules->existsIn(['team_id'], 'Teams'));
        $rules->add($rules->existsIn(['expert_id'], 'Experts'));

        return $rules;
    }

    // L'argument $query est une instance de \Cake\ORM\Query.
    // Le tableau $options contiendra les tags que nous avons passé à find('tagged')
    // dans l'action de notre Controller
    public function findChoice(Query $query, array $options)
    {
        $ministries = $this->find()
        ->select(['id', 'sector_id', 'leash_id', 'job_employment_id', 'description']);
        if (empty($options['trainings'])) {
        $ministries
        ->leftJoinWith('trainings')
        ->where(['Trainings.description IS' => null]);
        } else {
        $ministries
        ->innerJoinWith('Trainings')
        ->where(['Trainings.description IN ' => $options['trainings']]);
        }
        return $ministries->group(['Ministries.id']);
    }
}
