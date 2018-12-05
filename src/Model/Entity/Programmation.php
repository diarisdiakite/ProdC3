<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Programmation Entity
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int $expert_id
 * @property \Cake\I18n\FrozenDate|null $debut
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Expert $expert
 * @property \App\Model\Entity\Meeting[] $meetings
 */
class Programmation extends Entity
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
        'title' => true,
        'description' => true,
        'expert_id' => true,
        'debut' => true,
        'created' => true,
        'modified' => true,
        'expert' => true,
        'meetings' => true
    ];
}
