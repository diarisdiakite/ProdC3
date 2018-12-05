<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AssignementsExperts Model
 *
 * @property \App\Model\Table\AssignementsTable|\Cake\ORM\Association\BelongsTo $Assignements
 * @property \App\Model\Table\ExpertsTable|\Cake\ORM\Association\BelongsTo $Experts
 *
 * @method \App\Model\Entity\AssignementsExpert get($primaryKey, $options = [])
 * @method \App\Model\Entity\AssignementsExpert newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AssignementsExpert[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AssignementsExpert|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AssignementsExpert|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AssignementsExpert patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AssignementsExpert[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AssignementsExpert findOrCreate($search, callable $callback = null, $options = [])
 */
class AssignementsExpertsTable extends Table
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

        $this->setTable('assignements_experts');
        $this->setDisplayField('assignement_id');
        $this->setPrimaryKey(['assignement_id', 'expert_id']);

        $this->belongsTo('Assignements', [
            'foreignKey' => 'assignement_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Experts', [
            'foreignKey' => 'expert_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['assignement_id'], 'Assignements'));
        $rules->add($rules->existsIn(['expert_id'], 'Experts'));

        return $rules;
    }
}
