<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property int $type_id
 * @property int $user_id
 * @property string $title
 * @property string|null $body
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Assignement[] $assignements
 * @property \App\Model\Entity\Media[] $medias
 * @property \App\Model\Entity\Activation[] $activations
 */
class Post extends Entity
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
        'type_id' => true,
        'user_id' => true,
        'title' => true,
        'body' => true,
        'created' => true,
        'modified' => true,
        'type' => true,
        'user' => true,
        'assignements' => true,
        'medias' => true,
        'activations' => true
    ];
}
