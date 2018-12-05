<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Assignement Entity
 *
 * @property int $id
 * @property int $group_id
 * @property int|null $user_id
 * @property int $post_id
 * @property string $title
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Post $post
 * @property \App\Model\Entity\Operation[] $operations
 * @property \App\Model\Entity\Expert[] $experts
 */
class Assignement extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'group_id' => true,
        'user_id' => true,
        'post_id' => true,
        'title' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'group' => true,
        'user' => true,
        'post' => true,
        'operations' => true,
        'experts' => true
    ];
}
