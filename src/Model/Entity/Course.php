<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Course Entity
 *
 * @property int $id
 * @property int $branch_id
 * @property string $title
 * @property string $short_description
 * @property string $long_description
 * @property string $category
 * @property string $type
 * @property string $schedule
 * @property string $medical_exam
 * @property string $requirements
 * @property int|null $price
 * @property string|null $image
 * @property string|null $image_dir
 * @property string|null $image_size
 * @property string|null $image_type
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\Contact[] $contacts
 */
class Course extends Entity
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
        'branch_id' => true,
        'title' => true,
        'short_description' => true,
        'long_description' => true,
        'category' => true,
        'type' => true,
        'schedule' => true,
        'medical_exam' => true,
        'requirements' => true,
        'price' => true,
        'image' => true,
        'image_dir' => true,
        'image_size' => true,
        'image_type' => true,
        'created' => true,
        'modified' => true,
        'branch' => true,
        'contacts' => true,
    ];
}
