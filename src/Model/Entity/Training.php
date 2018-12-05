<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Training Entity
 *
 * @property int $id
 * @property int $project_action_id
 * @property string|null $description
 * @property int $ministry_id
 * @property int $sector_id
 * @property int $leash_id
 * @property int $job_employment_id
 * @property int $type_id
 * @property int $date_year_id
 * @property int|null $effectif
 * @property \Cake\I18n\FrozenDate|null $beginning
 * @property int|null $duration
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\ProjectAction $project_action
 * @property \App\Model\Entity\Ministry[] $ministries
 * @property \App\Model\Entity\Sector $sector
 * @property \App\Model\Entity\Leash $leash
 * @property \App\Model\Entity\JobEmployment $job_employment
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\DateYear $date_year
 * @property \App\Model\Entity\Department[] $departments
 * @property \App\Model\Entity\Structure[] $structures
 */
class Training extends Entity
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
        'project_action_id' => true,
        'description' => true,
        'ministry_id' => true,
        'sector_id' => true,
        'leash_id' => true,
        'job_employment_id' => true,
        'type_id' => true,
        'date_year_id' => true,
        'effectif' => true,
        'beginning' => true,
        'duration' => true,
        'created' => true,
        'modified' => true,
        'project_action' => true,
        'ministries' => true,
        'sector' => true,
        'leash' => true,
        'job_employment' => true,
        'type' => true,
        'date_year' => true,
        'departments' => true,
        'structures' => true
    ];
}
