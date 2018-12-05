<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Meeting Entity
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int $programmation_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Programmation $programmation
 * @property \App\Model\Entity\MeetingSubject[] $meeting_subjects
 * @property \App\Model\Entity\Department[] $departments
 * @property \App\Model\Entity\Expert[] $experts
 * @property \App\Model\Entity\Ministry[] $ministries
 */
class Meeting extends Entity
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
        'title' => true,
        'description' => true,
        'programmation_id' => true,
        'created' => true,
        'modified' => true,
        'programmation' => true,
        'meeting_subjects' => true,
        'departments' => true,
        'experts' => true,
        'ministries' => true
    ];
}
