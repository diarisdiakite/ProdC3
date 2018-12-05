<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExpertsMeetings Model
 *
 * @property \App\Model\Table\ExpertsTable|\Cake\ORM\Association\BelongsTo $Experts
 * @property \App\Model\Table\MeetingsTable|\Cake\ORM\Association\BelongsTo $Meetings
 *
 * @method \App\Model\Entity\ExpertsMeeting get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExpertsMeeting newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ExpertsMeeting[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExpertsMeeting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExpertsMeeting|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExpertsMeeting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExpertsMeeting[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExpertsMeeting findOrCreate($search, callable $callback = null, $options = [])
 */
class ExpertsMeetingsTable extends Table
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

        $this->setTable('experts_meetings');
        $this->setDisplayField('experts_id');
        $this->setPrimaryKey(['experts_id', 'meeting_id']);

        $this->belongsTo('Experts', [
            'foreignKey' => 'experts_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Meetings', [
            'foreignKey' => 'meeting_id',
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
        $rules->add($rules->existsIn(['experts_id'], 'Experts'));
        $rules->add($rules->existsIn(['meeting_id'], 'Meetings'));

        return $rules;
    }
}
