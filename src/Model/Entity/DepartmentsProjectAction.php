<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DepartmentsProjectAction Entity
 *
 * @property int $department_id
 * @property int $project_action_id
 *
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\ProjectAction $project_action
 */
class DepartmentsProjectAction extends Entity
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
        'department' => true,
        'project_action' => true
    ];
}
