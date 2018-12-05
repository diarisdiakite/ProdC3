<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Financials Model
 *
 * @property \App\Model\Table\TechnicalsTable|\Cake\ORM\Association\BelongsTo $Technicals
 * @property \App\Model\Table\FinancesResponsiblesTable|\Cake\ORM\Association\BelongsTo $FinancesResponsibles
 *
 * @method \App\Model\Entity\Financial get($primaryKey, $options = [])
 * @method \App\Model\Entity\Financial newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Financial[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Financial|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Financial|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Financial patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Financial[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Financial findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FinancialsTable extends Table
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

        $this->setTable('financials');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Technicals', [
            'foreignKey' => 'technical_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('FinancesResponsibles', [
            'foreignKey' => 'finances_responsible_id',
            'joinType' => 'INNER'
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
            ->integer('budget')
            ->requirePresence('budget', 'create')
            ->notEmpty('budget');

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
        $rules->add($rules->existsIn(['technical_id'], 'Technicals'));
        $rules->add($rules->existsIn(['finances_responsible_id'], 'FinancesResponsibles'));

        return $rules;
    }
}
