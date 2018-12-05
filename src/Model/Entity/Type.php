<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Type Entity
 *
 * @property int $id
 * @property bool|null $approved
 * @property string $name
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Insert[] $inserts
 * @property \App\Model\Entity\Mode[] $modes
 * @property \App\Model\Entity\Post[] $posts
 * @property \App\Model\Entity\ProjectAction[] $project_actions
 * @property \App\Model\Entity\Training[] $trainings
 */
class Type extends Entity
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
        'name' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'inserts' => true,
        'modes' => true,
        'posts' => true,
        'project_actions' => true,
        'trainings' => true
    ];
}
