<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Assistant Entity
 *
 * @property int $id
 * @property string $name
 * @property string $adress
 * @property int $tel
 * @property string $position
 * @property int $expert_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Expert $expert
 * @property \App\Model\Entity\User $user
 */
class Assistant extends Entity
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
        'name' => true,
        'adress' => true,
        'tel' => true,
        'position' => true,
        'expert_id' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'expert' => true,
        'user' => true
    ];
}
