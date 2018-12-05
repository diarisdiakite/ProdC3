<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InquiryDatabases Model
 *
 * @property \App\Model\Table\DepartmentsTable|\Cake\ORM\Association\BelongsToMany $Departments
 * @property \App\Model\Table\StructuresTable|\Cake\ORM\Association\BelongsToMany $Structures
 *
 * @method \App\Model\Entity\InquiryDatabase get($primaryKey, $options = [])
 * @method \App\Model\Entity\InquiryDatabase newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InquiryDatabase[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InquiryDatabase|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InquiryDatabase|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InquiryDatabase patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InquiryDatabase[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InquiryDatabase findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InquiryDatabasesTable extends Table
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

        $this->setTable('inquiry_databases');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Departments', [
            'foreignKey' => 'inquiry_database_id',
            'targetForeignKey' => 'department_id',
            'joinTable' => 'departments_inquiry_databases'
        ]);
        $this->belongsToMany('Structures', [
            'foreignKey' => 'inquiry_database_id',
            'targetForeignKey' => 'structure_id',
            'joinTable' => 'inquiry_databases_structures'
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('total')
            ->allowEmpty('total');

        return $validator;
    }
}
