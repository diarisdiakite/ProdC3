<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PeriodsWeeks Model
 *
 * @property \App\Model\Table\PeriodsTable|\Cake\ORM\Association\BelongsTo $Periods
 * @property \App\Model\Table\WeeksTable|\Cake\ORM\Association\BelongsTo $Weeks
 *
 * @method \App\Model\Entity\PeriodsWeek get($primaryKey, $options = [])
 * @method \App\Model\Entity\PeriodsWeek newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PeriodsWeek[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PeriodsWeek|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PeriodsWeek|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PeriodsWeek patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PeriodsWeek[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PeriodsWeek findOrCreate($search, callable $callback = null, $options = [])
 */
class PeriodsWeeksTable extends Table
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

        $this->setTable('periods_weeks');
        $this->setDisplayField('Period_id');
        $this->setPrimaryKey(['Period_id', 'week_id']);

        $this->belongsTo('Periods', [
            'foreignKey' => 'Period_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Weeks', [
            'foreignKey' => 'week_id',
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
        $rules->add($rules->existsIn(['Period_id'], 'Periods'));
        $rules->add($rules->existsIn(['week_id'], 'Weeks'));

        return $rules;
    }
}
