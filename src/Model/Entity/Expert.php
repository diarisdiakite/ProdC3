<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Expert Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $adress
 * @property int $tel
 * @property string $position
 * @property bool|null $active
 * @property string $linkedin
 * @property int $user_id
 * @property int|null $team_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Team $team
 * @property \App\Model\Entity\Assistant[] $assistants
 * @property \App\Model\Entity\FocalPoint[] $focal_points
 * @property \App\Model\Entity\Ministry[] $ministries
 * @property \App\Model\Entity\Programmation[] $programmations
 * @property \App\Model\Entity\Assignement[] $assignements
 * @property \App\Model\Entity\Meeting[] $meetings
 */
class Expert extends Entity
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
        'active' => true,
        'linkedin' => true,
        'user_id' => true,
        'team_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'team' => true,
        'assistants' => true,
        'focal_points' => true,
        'ministries' => true,
        'programmations' => true,
        'assignements' => true,
        'meetings' => true
    ];
}
