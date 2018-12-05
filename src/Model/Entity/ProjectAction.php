<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectAction Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $num
 * @property int $type_id
 * @property int $expected_result_id
 * @property string $title
 * @property string|null $description
 * @property bool|null $approved
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\ExpectedResult $expected_result
 * @property \App\Model\Entity\Insert[] $inserts
 * @property \App\Model\Entity\Technical[] $technicals
 * @property \App\Model\Entity\Training[] $trainings
 * @property \App\Model\Entity\Department[] $departments
 */
class ProjectAction extends Entity
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
        'user_id' => true,
        'num' => true,
        'type_id' => true,
        'expected_result_id' => true,
        'title' => true,
        'description' => true,
        'approved' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'type' => true,
        'expected_result' => true,
        'inserts' => true,
        'technicals' => true,
        'trainings' => true,
        'departments' => true
    ];
}
