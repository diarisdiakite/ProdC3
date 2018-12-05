<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DepartmentsInquiryDatabases Model
 *
 * @property \App\Model\Table\DepartmentsTable|\Cake\ORM\Association\BelongsTo $Departments
 * @property \App\Model\Table\InquiryDatabasesTable|\Cake\ORM\Association\BelongsTo $InquiryDatabases
 *
 * @method \App\Model\Entity\DepartmentsInquiryDatabase get($primaryKey, $options = [])
 * @method \App\Model\Entity\DepartmentsInquiryDatabase newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DepartmentsInquiryDatabase[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentsInquiryDatabase|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DepartmentsInquiryDatabase|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DepartmentsInquiryDatabase patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentsInquiryDatabase[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentsInquiryDatabase findOrCreate($search, callable $callback = null, $options = [])
 */
class DepartmentsInquiryDatabasesTable extends Table
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

        $this->setTable('departments_inquiry_databases');
        $this->setDisplayField('department_id');
        $this->setPrimaryKey(['department_id', 'inquiry_database_id']);

        $this->belongsTo('Departments', [
            'foreignKey' => 'department_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('InquiryDatabases', [
            'foreignKey' => 'inquiry_database_id',
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
        $rules->add($rules->existsIn(['inquiry_database_id'], 'InquiryDatabases'));

        return $rules;
    }
}
