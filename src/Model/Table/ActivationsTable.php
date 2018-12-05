<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Activations Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\InsertsTable|\Cake\ORM\Association\BelongsToMany $Inserts
 * @property \App\Model\Table\PostsTable|\Cake\ORM\Association\BelongsToMany $Posts
 * @property \App\Model\Table\StructuresTable|\Cake\ORM\Association\BelongsToMany $Structures
 *
 * @method \App\Model\Entity\Activation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Activation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Activation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Activation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Activation|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Activation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Activation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Activation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ActivationsTable extends Table
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

        $this->setTable('activations');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Inserts', [
            'foreignKey' => 'activation_id',
            'targetForeignKey' => 'insert_id',
            'joinTable' => 'activations_inserts'
        ]);
        $this->belongsToMany('Posts', [
            'foreignKey' => 'activation_id',
            'targetForeignKey' => 'post_id',
            'joinTable' => 'activations_posts'
        ]);
        $this->belongsToMany('Structures', [
            'foreignKey' => 'activation_id',
            'targetForeignKey' => 'structure_id',
            'joinTable' => 'activations_structures'
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

        return $validator;
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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
