<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Groups
 * @property \App\Model\Table\ActivationsTable|\Cake\ORM\Association\HasMany $Activations
 * @property \App\Model\Table\AdministratorsTable|\Cake\ORM\Association\HasMany $Administrators
 * @property \App\Model\Table\AssignementsTable|\Cake\ORM\Association\HasMany $Assignements
 * @property \App\Model\Table\AssistantsTable|\Cake\ORM\Association\HasMany $Assistants
 * @property \App\Model\Table\ComposantsTable|\Cake\ORM\Association\HasMany $Composants
 * @property \App\Model\Table\ContactsTable|\Cake\ORM\Association\HasMany $Contacts
 * @property \App\Model\Table\ExpectedResultsTable|\Cake\ORM\Association\HasMany $ExpectedResults
 * @property \App\Model\Table\ExpertsTable|\Cake\ORM\Association\HasMany $Experts
 * @property \App\Model\Table\FinancesResponsiblesTable|\Cake\ORM\Association\HasMany $FinancesResponsibles
 * @property \App\Model\Table\FocalPointsTable|\Cake\ORM\Association\HasMany $FocalPoints
 * @property \App\Model\Table\InsertsTable|\Cake\ORM\Association\HasMany $Inserts
 * @property \App\Model\Table\JobEmploymentsTable|\Cake\ORM\Association\HasMany $JobEmployments
 * @property \App\Model\Table\LeashesTable|\Cake\ORM\Association\HasMany $Leashes
 * @property \App\Model\Table\MinistriesTable|\Cake\ORM\Association\HasMany $Ministries
 * @property \App\Model\Table\OperationsTable|\Cake\ORM\Association\HasMany $Operations
 * @property \App\Model\Table\PlanificationsTable|\Cake\ORM\Association\HasMany $Planifications
 * @property \App\Model\Table\PostsTable|\Cake\ORM\Association\HasMany $Posts
 * @property \App\Model\Table\ProjectActionsTable|\Cake\ORM\Association\HasMany $ProjectActions
 * @property \App\Model\Table\RealizationsTable|\Cake\ORM\Association\HasMany $Realizations
 * @property \App\Model\Table\SecretariesTable|\Cake\ORM\Association\HasMany $Secretaries
 * @property \App\Model\Table\SectorsTable|\Cake\ORM\Association\HasMany $Sectors
 * @property \App\Model\Table\StructuresTable|\Cake\ORM\Association\HasMany $Structures
 * @property \App\Model\Table\TeamsTable|\Cake\ORM\Association\HasMany $Teams
 * @property \App\Model\Table\TechnicalsTable|\Cake\ORM\Association\HasMany $Technicals
 * @property \App\Model\Table\TypesTable|\Cake\ORM\Association\HasMany $Types
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('email');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Activations', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Administrators', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Assignements', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Assistants', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Composants', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Contacts', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('ExpectedResults', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Experts', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('FinancesResponsibles', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('FocalPoints', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Inserts', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('JobEmployments', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Leashes', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Ministries', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Operations', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Planifications', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Posts', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('ProjectActions', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Realizations', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Secretaries', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Sectors', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Structures', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Teams', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Technicals', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Types', [
            'foreignKey' => 'user_id'
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
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['group_id'], 'Groups'));

        return $rules;
    }
}
