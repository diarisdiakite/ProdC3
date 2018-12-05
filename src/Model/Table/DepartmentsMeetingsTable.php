<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DepartmentsMeetings Model
 *
 * @property \App\Model\Table\DepartmentsTable|\Cake\ORM\Association\BelongsTo $Departments
 * @property \App\Model\Table\MeetingsTable|\Cake\ORM\Association\BelongsTo $Meetings
 *
 * @method \App\Model\Entity\DepartmentsMeeting get($primaryKey, $options = [])
 * @method \App\Model\Entity\DepartmentsMeeting newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DepartmentsMeeting[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentsMeeting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DepartmentsMeeting|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DepartmentsMeeting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentsMeeting[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentsMeeting findOrCreate($search, callable $callback = null, $options = [])
 */
class DepartmentsMeetingsTable extends Table
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

        $this->setTable('departments_meetings');
        $this->setDisplayField('department_id');
        $this->setPrimaryKey(['department_id', 'meeting_id']);

        $this->belongsTo('Departments', [
            'foreignKey' => 'department_id',
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
        $rules->add($rules->existsIn(['department_id'], 'Departments'));
        $rules->add($rules->existsIn(['meeting_id'], 'Meetings'));

        return $rules;
    }
}
