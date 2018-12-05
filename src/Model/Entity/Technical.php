<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Technical Entity
 *
 * @property int $id
 * @property bool|null $approved
 * @property int $user_id
 * @property int $structure_id
 * @property int $project_action_id
 * @property int $quantity
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Structure $structure
 * @property \App\Model\Entity\ProjectAction $project_action
 * @property \App\Model\Entity\Financial[] $financials
 */
class Technical extends Entity
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
        'user_id' => true,
        'structure_id' => true,
        'project_action_id' => true,
        'quantity' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'structure' => true,
        'project_action' => true,
        'financials' => true
    ];
}
