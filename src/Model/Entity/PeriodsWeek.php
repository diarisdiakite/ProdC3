<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PeriodsWeek Entity
 *
 * @property int $Period_id
 * @property int $week_id
 *
 * @property \App\Model\Entity\Period $period
 * @property \App\Model\Entity\Week $week
 */
class PeriodsWeek extends Entity
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
        'period' => true,
        'week' => true
    ];
}
