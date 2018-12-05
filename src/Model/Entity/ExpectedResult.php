<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExpectedResult Entity
 *
 * @property int $id
 * @property int|null $approved
 * @property int $user_id
 * @property int|null $num
 * @property int $composant_id
 * @property string $title
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Composant $composant
 * @property \App\Model\Entity\Insert[] $inserts
 * @property \App\Model\Entity\ProjectAction[] $project_actions
 */
class ExpectedResult extends Entity
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
        'num' => false,
        'composant_id' => true,
        'title' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'composant' => true,
        'inserts' => true,
        'project_actions' => true
    ];
}
