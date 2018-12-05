<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MeetingsMinistries Model
 *
 * @property \App\Model\Table\MeetingsTable|\Cake\ORM\Association\BelongsTo $Meetings
 * @property \App\Model\Table\MinistriesTable|\Cake\ORM\Association\BelongsTo $Ministries
 *
 * @method \App\Model\Entity\MeetingsMinistry get($primaryKey, $options = [])
 * @method \App\Model\Entity\MeetingsMinistry newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MeetingsMinistry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MeetingsMinistry|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MeetingsMinistry|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MeetingsMinistry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MeetingsMinistry[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MeetingsMinistry findOrCreate($search, callable $callback = null, $options = [])
 */
class MeetingsMinistriesTable extends Table
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

        $this->setTable('meetings_ministries');
        $this->setDisplayField('meeting_id');
        $this->setPrimaryKey(['meeting_id', 'ministry_id']);

        $this->belongsTo('Meetings', [
            'foreignKey' => 'meeting_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Ministries', [
            'foreignKey' => 'ministry_id',
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
        $rules->add($rules->existsIn(['meeting_id'], 'Meetings'));
        $rules->add($rules->existsIn(['ministry_id'], 'Ministries'));

        return $rules;
    }
}
