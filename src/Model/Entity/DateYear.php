<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DateYear Entity
 *
 * @property int $id
 * @property int|null $year
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Insert[] $inserts
 * @property \App\Model\Entity\Training[] $trainings
 */
class DateYear extends Entity
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
        'year' => true,
        'created' => true,
        'modified' => true,
        'inserts' => true,
        'trainings' => true
    ];
}
