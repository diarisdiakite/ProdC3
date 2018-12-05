<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Planification Entity
 *
 * @property int $id
 * @property int|null $approved
 * @property int $user_id
 * @property int $ministry_id
 * @property int $department_id
 * @property int|null $date_year
 * @property string $title
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Ministry $ministry
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Insert[] $inserts
 */
class Planification extends Entity
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
        'approved' => true,
        'user_id' => true,
        'ministry_id' => true,
        'department_id' => true,
        'date_year' => true,
        'title' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'ministry' => true,
        'department' => true,
        'inserts' => true
    ];
}
