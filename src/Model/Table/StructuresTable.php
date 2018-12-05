<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Structures Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\FocalPointsTable|\Cake\ORM\Association\BelongsTo $FocalPoints
 * @property \App\Model\Table\MinistriesTable|\Cake\ORM\Association\BelongsTo $Ministries
 * @property \App\Model\Table\DepartmentsTable|\Cake\ORM\Association\BelongsTo $Departments
 * @property \App\Model\Table\InsertsTable|\Cake\ORM\Association\HasMany $Inserts
 * @property \App\Model\Table\TechnicalsTable|\Cake\ORM\Association\HasMany $Technicals
 * @property \App\Model\Table\ActivationsTable|\Cake\ORM\Association\BelongsToMany $Activations
 * @property \App\Model\Table\InquiryDatabasesTable|\Cake\ORM\Association\BelongsToMany $InquiryDatabases
 * @property \App\Model\Table\TrainingsTable|\Cake\ORM\Association\BelongsToMany $Trainings
 *
 * @method \App\Model\Entity\Structure get($primaryKey, $options = [])
 * @method \App\Model\Entity\Structure newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Structure[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Structure|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Structure|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Structure patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Structure[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Structure findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StructuresTable extends Table
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

        $this->setTable('structures');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('FocalPoints', [
            'foreignKey' => 'focal_point_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Ministries', [
            'foreignKey' => 'ministry_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Departments', [
            'foreignKey' => 'department_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Inserts', [
            'foreignKey' => 'structure_id'
        ]);
        $this->hasMany('Technicals', [
            'foreignKey' => 'structure_id'
        ]);
        $this->belongsToMany('Activations', [
            'foreignKey' => 'structure_id',
            'targetForeignKey' => 'activation_id',
            'joinTable' => 'activations_structures'
        ]);
        $this->belongsToMany('InquiryDatabases', [
            'foreignKey' => 'structure_id',
            'targetForeignKey' => 'inquiry_database_id',
            'joinTable' => 'inquiry_databases_structures'
        ]);
        $this->belongsToMany('Trainings', [
            'foreignKey' => 'structure_id',
            'targetForeignKey' => 'training_id',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('responsible')
            ->maxLength('responsible', 255)
            ->requirePresence('responsible', 'create')
            ->notEmpty('responsible');

        $validator
            ->integer('contact')
            ->requirePresence('contact', 'create')
            ->notEmpty('contact');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

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
        $rules->add($rules->existsIn(['focal_point_id'], 'FocalPoints'));
        $rules->add($rules->existsIn(['ministry_id'], 'Ministries'));
        $rules->add($rules->existsIn(['department_id'], 'Departments'));

        return $rules;
    }
}
