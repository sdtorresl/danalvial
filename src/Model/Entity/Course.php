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
 * @property string $profile
 * @property string $category
 * @property string $schedule
 * @property string $requirements
 * @property |null $image
 * @property string|null $image_dir
 * @property string|null $image_size
 * @property string|null $image_type
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int $practical_time
 * @property int $theoretical_time
 * @property int $workshop_time
 * @property string $schedule_dir
 * @property string $schedule_size
 * @property string $schedule_type
 * @property string $curriculum
 * @property string $curriculum_dir
 * @property string $curriculum_size
 * @property string $curriculum_type
 * @property $curriculum_content
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
        'profile' => true,
        'category' => true,
        'schedule' => true,
        'requirements' => true,
        'image' => true,
        'image_dir' => true,
        'image_size' => true,
        'image_type' => true,
        'created' => true,
        'modified' => true,
        'practical_time' => true,
        'theoretical_time' => true,
        'workshop_time' => true,
        'branch' => true,
        'contacts' => true,
        'schedule_dir' => true,
        'schedule_size' => true,
        'schedule_type' => true,
        'curriculum' => true,
        'curriculum_dir' => true,
        'curriculum_size' => true,
        'curriculum_type' => true,
        'curriculum_content' => true,
    ];
}
