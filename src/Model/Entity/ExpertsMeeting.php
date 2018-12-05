<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExpertsMeeting Entity
 *
 * @property int $experts_id
 * @property int $meeting_id
 *
 * @property \App\Model\Entity\Expert $expert
 * @property \App\Model\Entity\Meeting $meeting
 */
class ExpertsMeeting extends Entity
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
        'expert' => true,
        'meeting' => true
    ];
}
