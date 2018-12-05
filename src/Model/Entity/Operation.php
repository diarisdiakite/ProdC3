<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Operation Entity
 *
 * @property int $id
 * @property int $assignement_id
 * @property int|null $user_id
 * @property string $name
 * @property string|null $description
 * @property int|null $duration
 * @property string $scale
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Assignement $assignement
 * @property \App\Model\Entity\User $user
 */
class Operation extends Entity
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
        'assignement_id' => true,
        'user_id' => true,
        'name' => true,
        'description' => true,
        'duration' => true,
        'scale' => true,
        'created' => true,
        'modified' => true,
        'assignement' => true,
        'user' => true
    ];
}
