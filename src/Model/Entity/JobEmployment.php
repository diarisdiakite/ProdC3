<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JobEmployment Entity
 *
 * @property int $id
 * @property bool|null $approved
 * @property int $leash_id
 * @property string $title
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Leash $leash
 * @property \App\Model\Entity\Training[] $trainings
 */
class JobEmployment extends Entity
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
        'approved' => true,
        'leash_id' => true,
        'title' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'leash' => true,
        'trainings' => true
    ];
}
