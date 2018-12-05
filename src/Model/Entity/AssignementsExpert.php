<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AssignementsExpert Entity
 *
 * @property int $assignement_id
 * @property int $expert_id
 *
 * @property \App\Model\Entity\Assignement $assignement
 * @property \App\Model\Entity\Expert $expert
 */
class AssignementsExpert extends Entity
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
        'assignement' => true,
        'expert' => true
    ];
}
