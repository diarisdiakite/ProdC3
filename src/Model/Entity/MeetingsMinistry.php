<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MeetingsMinistry Entity
 *
 * @property int $meeting_id
 * @property int $ministry_id
 *
 * @property \App\Model\Entity\Meeting $meeting
 * @property \App\Model\Entity\Ministry $ministry
 */
class MeetingsMinistry extends Entity
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
        'meeting' => true,
        'ministry' => true
    ];
}
