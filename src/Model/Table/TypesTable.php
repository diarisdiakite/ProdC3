<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Types Model
 *
 * @property \App\Model\Table\InsertsTable|\Cake\ORM\Association\HasMany $Inserts
 * @property \App\Model\Table\ModesTable|\Cake\ORM\Association\HasMany $Modes
 * @property \App\Model\Table\PostsTable|\Cake\ORM\Association\HasMany $Posts
 * @property \App\Model\Table\ProjectActionsTable|\Cake\ORM\Association\HasMany $ProjectActions
 * @property \App\Model\Table\TrainingsTable|\Cake\ORM\Association\HasMany $Trainings
 *
 * @method \App\Model\Entity\Type get($primaryKey, $options = [])
 * @method \App\Model\Entity\Type newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Type[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Type|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Type|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Type patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Type[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Type findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TypesTable extends Table
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

        $this->setTable('types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Inserts', [
            'foreignKey' => 'type_id'
        ]);
        $this->hasMany('Modes', [
            'foreignKey' => 'type_id'
        ]);
        $this->hasMany('Posts', [
            'foreignKey' => 'type_id'
        ]);
        $this->hasMany('ProjectActions', [
            'foreignKey' => 'type_id'
        ]);
        $this->hasMany('Trainings', [
            'foreignKey' => 'type_id'
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
            ->boolean('approved')
            ->allowEmpty('approved');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        return $validator;
    }
}
