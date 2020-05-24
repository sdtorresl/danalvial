<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Branch Entity
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $image_dir
 * @property string $image_size
 * @property string $image_type
 * @property string $address
 * @property string $contact_number_1
 * @property string|null $contact_number_2
 * @property string $schedule
 * @property string $location
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Contact[] $contacts
 * @property \App\Model\Entity\Course[] $courses
 * @property \App\Model\Entity\Test[] $tests
 */
class Branch extends Entity
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
        'image' => true,
        'image_dir' => true,
        'image_size' => true,
        'image_type' => true,
        'address' => true,
        'contact_number_1' => true,
        'contact_number_2' => true,
        'schedule' => true,
        'location' => true,
        'created' => true,
        'modified' => true,
        'contacts' => true,
        'courses' => true,
        'tests' => true,
    ];
}
