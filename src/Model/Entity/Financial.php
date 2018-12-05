<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Financial Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int $technical_id
 * @property int $budget
 * @property int $finances_responsible_id
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Technical $technical
 * @property \App\Model\Entity\FinancesResponsible $finances_responsible
 */
class Financial extends Entity
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
        'created' => true,
        'technical_id' => true,
        'budget' => true,
        'finances_responsible_id' => true,
        'modified' => true,
        'technical' => true,
        'finances_responsible' => true
    ];
}
