<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Inserts Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\StructuresTable|\Cake\ORM\Association\BelongsTo $Structures
 * @property \App\Model\Table\PlanificationsTable|\Cake\ORM\Association\BelongsTo $Planifications
 * @property \App\Model\Table\MinistriesTable|\Cake\ORM\Association\BelongsTo $Ministries
 * @property \App\Model\Table\ComposantsTable|\Cake\ORM\Association\BelongsTo $Composants
 * @property \App\Model\Table\ExpectedResultsTable|\Cake\ORM\Association\BelongsTo $ExpectedResults
 * @property \App\Model\Table\ProjectActionsTable|\Cake\ORM\Association\BelongsTo $ProjectActions
 * @property \App\Model\Table\TypesTable|\Cake\ORM\Association\BelongsTo $Types
 * @property \App\Model\Table\DateYearsTable|\Cake\ORM\Association\BelongsTo $DateYears
 * @property \App\Model\Table\RealizationsTable|\Cake\ORM\Association\HasMany $Realizations
 * @property \App\Model\Table\ActivationsTable|\Cake\ORM\Association\BelongsToMany $Activations
 *
 * @method \App\Model\Entity\Insert get($primaryKey, $options = [])
 * @method \App\Model\Entity\Insert newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Insert[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Insert|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Insert|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Insert patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Insert[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Insert findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InsertsTable extends Table
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

        $this->setTable('inserts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Structures', [
            'foreignKey' => 'structure_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Planifications', [
            'foreignKey' => 'planification_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Ministries', [
            'foreignKey' => 'ministry_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Composants', [
            'foreignKey' => 'composant_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ExpectedResults', [
            'foreignKey' => 'expected_result_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ProjectActions', [
            'foreignKey' => 'project_action_id',
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
        $this->hasMany('Realizations', [
            'foreignKey' => 'insert_id'
        ]);
        $this->belongsToMany('Activations', [
            'foreignKey' => 'insert_id',
            'targetForeignKey' => 'activation_id',
            'joinTable' => 'activations_inserts'
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
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

        $validator
            ->integer('unity_price')
            ->requirePresence('unity_price', 'create')
            ->notEmpty('unity_price');

        $validator
            ->integer('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

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
        $rules->add($rules->existsIn(['structure_id'], 'Structures'));
        $rules->add($rules->existsIn(['planification_id'], 'Planifications'));
        $rules->add($rules->existsIn(['ministry_id'], 'Ministries'));
        $rules->add($rules->existsIn(['composant_id'], 'Composants'));
        $rules->add($rules->existsIn(['expected_result_id'], 'ExpectedResults'));
        $rules->add($rules->existsIn(['project_action_id'], 'ProjectActions'));
        $rules->add($rules->existsIn(['type_id'], 'Types'));
        $rules->add($rules->existsIn(['date_year_id'], 'DateYears'));

        return $rules;
    }
}
