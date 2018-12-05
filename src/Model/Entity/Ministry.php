<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ministry Entity
 *
 * @property int $id
 * @property int|null $approved
 * @property int $user_id
 * @property string $name
 * @property string $slug
 * @property int $decret_id
 * @property int $team_id
 * @property int|null $expert_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Decret $decret
 * @property \App\Model\Entity\Team $team
 * @property \App\Model\Entity\Expert $expert
 * @property \App\Model\Entity\Department[] $departments
 * @property \App\Model\Entity\FocalPoint[] $focal_points
 * @property \App\Model\Entity\Insert[] $inserts
 * @property \App\Model\Entity\Planification[] $planifications
 * @property \App\Model\Entity\Structure[] $structures
 * @property \App\Model\Entity\Training[] $trainings
 * @property \App\Model\Entity\Meeting[] $meetings
 */
class Ministry extends Entity
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
        'name' => true,
        'slug' => true,
        'decret_id' => true,
        'team_id' => true,
        'expert_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'decret' => true,
        'team' => true,
        'expert' => true,
        'departments' => true,
        'focal_points' => true,
        'inserts' => true,
        'planifications' => true,
        'structures' => true,
        'trainings' => true,
        'meetings' => true
    ];
}
