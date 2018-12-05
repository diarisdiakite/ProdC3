<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Leash Entity
 *
 * @property int $id
 * @property bool|null $approved
 * @property int $user_id
 * @property int $sector_id
 * @property string $title
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Sector $sector
 * @property \App\Model\Entity\JobEmployment[] $job_employments
 * @property \App\Model\Entity\Training[] $trainings
 */
class Leash extends Entity
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
        'sector_id' => true,
        'title' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'sector' => true,
        'job_employments' => true,
        'trainings' => true
    ];
}
