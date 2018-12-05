<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DateYears Model
 *
 * @property \App\Model\Table\InsertsTable|\Cake\ORM\Association\HasMany $Inserts
 * @property \App\Model\Table\TrainingsTable|\Cake\ORM\Association\HasMany $Trainings
 *
 * @method \App\Model\Entity\DateYear get($primaryKey, $options = [])
 * @method \App\Model\Entity\DateYear newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DateYear[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DateYear|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DateYear|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DateYear patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DateYear[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DateYear findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DateYearsTable extends Table
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

        $this->setTable('date_years');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Inserts', [
            'foreignKey' => 'date_year_id'
        ]);
        $this->hasMany('Trainings', [
            'foreignKey' => 'date_year_id'
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
            ->integer('year')
            ->allowEmpty('year');

        return $validator;
    }
}
