<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contact Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $message
 * @property string $telephone
 * @property int $course_id
 * @property int $branch_id
 * @property \Cake\I18n\FrozenTime $created
 * @property int $viewed
 *
 * @property \App\Model\Entity\Course $course
 * @property \App\Model\Entity\Branch $branch
 */
class Contact extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'message' => true,
        'telephone' => true,
        'course_id' => true,
        'branch_id' => true,
        'created' => true,
        'viewed' => true,
        'course' => true,
        'branch' => true,
    ];
}
