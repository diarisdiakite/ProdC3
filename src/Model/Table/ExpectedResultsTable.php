<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExpectedResults Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ComposantsTable|\Cake\ORM\Association\BelongsTo $Composants
 * @property \App\Model\Table\InsertsTable|\Cake\ORM\Association\HasMany $Inserts
 * @property \App\Model\Table\ProjectActionsTable|\Cake\ORM\Association\HasMany $ProjectActions
 *
 * @method \App\Model\Entity\ExpectedResult get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExpectedResult newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ExpectedResult[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExpectedResult|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExpectedResult|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExpectedResult patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExpectedResult[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExpectedResult findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExpectedResultsTable extends Table
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

        $this->setTable('expected_results');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Composants', [
            'foreignKey' => 'composant_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Inserts', [
            'foreignKey' => 'expected_result_id'
        ]);
        $this->hasMany('ProjectActions', [
            'foreignKey' => 'expected_result_id'
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
        $rules->add($rules->existsIn(['composant_id'], 'Composants'));

        return $rules;
    }
}
