<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DepartmentsProjectActions Model
 *
 * @property \App\Model\Table\DepartmentsTable|\Cake\ORM\Association\BelongsTo $Departments
 * @property \App\Model\Table\ProjectActionsTable|\Cake\ORM\Association\BelongsTo $ProjectActions
 *
 * @method \App\Model\Entity\DepartmentsProjectAction get($primaryKey, $options = [])
 * @method \App\Model\Entity\DepartmentsProjectAction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DepartmentsProjectAction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentsProjectAction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DepartmentsProjectAction|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DepartmentsProjectAction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentsProjectAction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentsProjectAction findOrCreate($search, callable $callback = null, $options = [])
 */
class DepartmentsProjectActionsTable extends Table
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

        $this->setTable('departments_project_actions');
        $this->setDisplayField('department_id');
        $this->setPrimaryKey(['department_id', 'project_action_id']);

        $this->belongsTo('Departments', [
            'foreignKey' => 'department_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ProjectActions', [
            'foreignKey' => 'project_action_id',
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
        $rules->add($rules->existsIn(['project_action_id'], 'ProjectActions'));

        return $rules;
    }
}
