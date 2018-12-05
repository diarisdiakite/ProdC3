<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property int $group_id
 * @property string $email
 * @property string $password
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Activation[] $activations
 * @property \App\Model\Entity\Administrator[] $administrators
 * @property \App\Model\Entity\Assignement[] $assignements
 * @property \App\Model\Entity\Assistant[] $assistants
 * @property \App\Model\Entity\Composant[] $composants
 * @property \App\Model\Entity\Contact[] $contacts
 * @property \App\Model\Entity\ExpectedResult[] $expected_results
 * @property \App\Model\Entity\Expert[] $experts
 * @property \App\Model\Entity\FinancesResponsible[] $finances_responsibles
 * @property \App\Model\Entity\FocalPoint[] $focal_points
 * @property \App\Model\Entity\Insert[] $inserts
 * @property \App\Model\Entity\JobEmployment[] $job_employments
 * @property \App\Model\Entity\Leash[] $leashes
 * @property \App\Model\Entity\Ministry[] $ministries
 * @property \App\Model\Entity\Operation[] $operations
 * @property \App\Model\Entity\Planification[] $planifications
 * @property \App\Model\Entity\Post[] $posts
 * @property \App\Model\Entity\ProjectAction[] $project_actions
 * @property \App\Model\Entity\Realization[] $realizations
 * @property \App\Model\Entity\Secretary[] $secretaries
 * @property \App\Model\Entity\Sector[] $sectors
 * @property \App\Model\Entity\Structure[] $structures
 * @property \App\Model\Entity\Team[] $teams
 * @property \App\Model\Entity\Technical[] $technicals
 * @property \App\Model\Entity\Type[] $types
 */
class User extends Entity
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
        'group_id' => true,
        'email' => true,
        'password' => true,
        'created' => true,
        'modified' => true,
        'activations' => true,
        'administrators' => true,
        'assignements' => true,
        'assistants' => true,
        'composants' => true,
        'contacts' => true,
        'expected_results' => true,
        'experts' => true,
        'finances_responsibles' => true,
        'focal_points' => true,
        'inserts' => true,
        'job_employments' => true,
        'leashes' => true,
        'ministries' => true,
        'operations' => true,
        'planifications' => true,
        'posts' => true,
        'project_actions' => true,
        'realizations' => true,
        'secretaries' => true,
        'sectors' => true,
        'structures' => true,
        'teams' => true,
        'technicals' => true,
        'types' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}
