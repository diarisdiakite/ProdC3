<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JobEmployments Model
 *
 * @property \App\Model\Table\LeashesTable|\Cake\ORM\Association\BelongsTo $Leashes
 * @property \App\Model\Table\TrainingsTable|\Cake\ORM\Association\HasMany $Trainings
 *
 * @method \App\Model\Entity\JobEmployment get($primaryKey, $options = [])
 * @method \App\Model\Entity\JobEmployment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JobEmployment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JobEmployment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JobEmployment|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JobEmployment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JobEmployment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JobEmployment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class JobEmploymentsTable extends Table
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

        $this->setTable('job_employments');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Leashes', [
            'foreignKey' => 'leash_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Trainings', [
            'foreignKey' => 'job_employment_id'
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
            ->boolean('approved')
            ->allowEmpty('approved');

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
        $rules->add($rules->existsIn(['leash_id'], 'Leashes'));

        return $rules;
    }
}
