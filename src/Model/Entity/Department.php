<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Department Entity
 *
 * @property int $id
 * @property int $ministry_id
 * @property string $title
 * @property string|null $mission
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Ministry $ministry
 * @property \App\Model\Entity\Planification[] $planifications
 * @property \App\Model\Entity\Realization[] $realizations
 * @property \App\Model\Entity\Structure[] $structures
 * @property \App\Model\Entity\InquiryDatabase[] $inquiry_databases
 * @property \App\Model\Entity\Meeting[] $meetings
 * @property \App\Model\Entity\ProjectAction[] $project_actions
 * @property \App\Model\Entity\Training[] $trainings
 */
class Department extends Entity
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
        'ministry_id' => true,
        'title' => true,
        'mission' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'ministry' => true,
        'planifications' => true,
        'realizations' => true,
        'structures' => true,
        'inquiry_databases' => true,
        'meetings' => true,
        'project_actions' => true,
        'trainings' => true
    ];
}
