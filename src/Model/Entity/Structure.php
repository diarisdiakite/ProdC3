<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Structure Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $responsible
 * @property int $contact
 * @property int $focal_point_id
 * @property int $ministry_id
 * @property int $department_id
 * @property bool|null $active
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\FocalPoint $focal_point
 * @property \App\Model\Entity\Ministry $ministry
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Insert[] $inserts
 * @property \App\Model\Entity\Technical[] $technicals
 * @property \App\Model\Entity\Activation[] $activations
 * @property \App\Model\Entity\InquiryDatabase[] $inquiry_databases
 * @property \App\Model\Entity\Training[] $trainings
 */
class Structure extends Entity
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
        'user_id' => true,
        'name' => true,
        'responsible' => true,
        'contact' => true,
        'focal_point_id' => true,
        'ministry_id' => true,
        'department_id' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'focal_point' => true,
        'ministry' => true,
        'department' => true,
        'inserts' => true,
        'technicals' => true,
        'activations' => true,
        'inquiry_databases' => true,
        'trainings' => true
    ];
}
