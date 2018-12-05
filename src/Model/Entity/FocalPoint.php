<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FocalPoint Entity
 *
 * @property int $id
 * @property string $name
 * @property string $adress
 * @property int $tel
 * @property string $position
 * @property int $user_id
 * @property int $expert_id
 * @property int $ministry_id
 * @property bool|null $active
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Expert $expert
 * @property \App\Model\Entity\Ministry $ministry
 * @property \App\Model\Entity\FinancesResponsible[] $finances_responsibles
 * @property \App\Model\Entity\Structure[] $structures
 */
class FocalPoint extends Entity
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
        'name' => true,
        'adress' => true,
        'tel' => true,
        'position' => true,
        'user_id' => true,
        'expert_id' => true,
        'ministry_id' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'expert' => true,
        'ministry' => true,
        'finances_responsibles' => true,
        'structures' => true
    ];
}
