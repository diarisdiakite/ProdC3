<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Technicals Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\StructuresTable|\Cake\ORM\Association\BelongsTo $Structures
 * @property \App\Model\Table\ProjectActionsTable|\Cake\ORM\Association\BelongsTo $ProjectActions
 * @property \App\Model\Table\FinancialsTable|\Cake\ORM\Association\HasMany $Financials
 *
 * @method \App\Model\Entity\Technical get($primaryKey, $options = [])
 * @method \App\Model\Entity\Technical newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Technical[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Technical|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Technical|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Technical patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Technical[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Technical findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TechnicalsTable extends Table
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

        $this->setTable('technicals');
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
        $this->belongsTo('ProjectActions', [
            'foreignKey' => 'project_action_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Financials', [
            'foreignKey' => 'technical_id'
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
        $rules->add($rules->existsIn(['project_action_id'], 'ProjectActions'));

        return $rules;
    }
}
