<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Composants Model
 *
 * @property \App\Model\Table\ExpectedResultsTable|\Cake\ORM\Association\HasMany $ExpectedResults
 * @property \App\Model\Table\InsertsTable|\Cake\ORM\Association\HasMany $Inserts
 *
 * @method \App\Model\Entity\Composant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Composant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Composant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Composant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Composant|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Composant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Composant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Composant findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ComposantsTable extends Table
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

        $this->setTable('composants');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ExpectedResults', [
            'foreignKey' => 'composant_id'
        ]);
        $this->hasMany('Inserts', [
            'foreignKey' => 'composant_id'
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
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        return $validator;
    }
}
