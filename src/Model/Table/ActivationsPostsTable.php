<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ActivationsPosts Model
 *
 * @property \App\Model\Table\ActivationsTable|\Cake\ORM\Association\BelongsTo $Activations
 * @property \App\Model\Table\PostsTable|\Cake\ORM\Association\BelongsTo $Posts
 *
 * @method \App\Model\Entity\ActivationsPost get($primaryKey, $options = [])
 * @method \App\Model\Entity\ActivationsPost newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ActivationsPost[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ActivationsPost|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActivationsPost|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActivationsPost patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ActivationsPost[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ActivationsPost findOrCreate($search, callable $callback = null, $options = [])
 */
class ActivationsPostsTable extends Table
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

        $this->setTable('activations_posts');
        $this->setDisplayField('activation_id');
        $this->setPrimaryKey(['activation_id', 'post_id']);

        $this->belongsTo('Activations', [
            'foreignKey' => 'activation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Posts', [
            'foreignKey' => 'post_id',
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
        $rules->add($rules->existsIn(['activation_id'], 'Activations'));
        $rules->add($rules->existsIn(['post_id'], 'Posts'));

        return $rules;
    }
}
