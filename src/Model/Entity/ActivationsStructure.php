<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ActivationsStructure Entity
 *
 * @property int $activation_id
 * @property int $structure_id
 *
 * @property \App\Model\Entity\Activation $activation
 * @property \App\Model\Entity\Structure $structure
 */
class ActivationsStructure extends Entity
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
        'activation' => true,
        'structure' => true
    ];
}
