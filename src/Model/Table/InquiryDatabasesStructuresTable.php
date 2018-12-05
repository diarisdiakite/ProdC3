<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InquiryDatabasesStructures Model
 *
 * @property \App\Model\Table\InquiryDatabasesTable|\Cake\ORM\Association\BelongsTo $InquiryDatabases
 * @property \App\Model\Table\StructuresTable|\Cake\ORM\Association\BelongsTo $Structures
 *
 * @method \App\Model\Entity\InquiryDatabasesStructure get($primaryKey, $options = [])
 * @method \App\Model\Entity\InquiryDatabasesStructure newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InquiryDatabasesStructure[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InquiryDatabasesStructure|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InquiryDatabasesStructure|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InquiryDatabasesStructure patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InquiryDatabasesStructure[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InquiryDatabasesStructure findOrCreate($search, callable $callback = null, $options = [])
 */
class InquiryDatabasesStructuresTable extends Table
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

        $this->setTable('inquiry_databases_structures');
        $this->setDisplayField('inquiry_database_id');
        $this->setPrimaryKey(['inquiry_database_id', 'structure_id']);

        $this->belongsTo('InquiryDatabases', [
            'foreignKey' => 'inquiry_database_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Structures', [
            'foreignKey' => 'structure_id',
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
        $rules->add($rules->existsIn(['inquiry_database_id'], 'InquiryDatabases'));
        $rules->add($rules->existsIn(['structure_id'], 'Structures'));

        return $rules;
    }
}
