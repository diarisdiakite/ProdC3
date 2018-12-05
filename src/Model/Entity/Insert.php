<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Insert Entity
 *
 * @property int $id
 * @property bool|null $approved
 * @property int $user_id
 * @property int $structure_id
 * @property int $planification_id
 * @property int $ministry_id
 * @property int $composant_id
 * @property int $expected_result_id
 * @property int $project_action_id
 * @property int $quantity
 * @property int $unity_price
 * @property int $type_id
 * @property int $date_year_id
 * @property int $amount
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Structure $structure
 * @property \App\Model\Entity\Planification $planification
 * @property \App\Model\Entity\Ministry $ministry
 * @property \App\Model\Entity\Composant $composant
 * @property \App\Model\Entity\ExpectedResult $expected_result
 * @property \App\Model\Entity\ProjectAction $project_action
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\DateYear $date_year
 * @property \App\Model\Entity\Realization[] $realizations
 * @property \App\Model\Entity\Activation[] $activations
 */
class Insert extends Entity
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
        'planification_id' => true,
        'ministry_id' => true,
        'composant_id' => true,
        'expected_result_id' => true,
        'project_action_id' => true,
        'quantity' => true,
        'unity_price' => true,
        'type_id' => true,
        'date_year_id' => true,
        'amount' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'structure' => true,
        'planification' => true,
        'ministry' => true,
        'composant' => true,
        'expected_result' => true,
        'project_action' => true,
        'type' => true,
        'date_year' => true,
        'realizations' => true,
        'activations' => true
    ];
}
