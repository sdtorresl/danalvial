<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Content Entity
 *
 * @property int $id
 * @property string $key
 * @property string $title
 * @property string $text
 * @property string|null $primary_image
 * @property string|null $primary_image_dir
 * @property string|null $primary_image_size
 * @property string|null $primary_image_type
 * @property string|null $secondary_image
 * @property string|null $secondary_image_dir
 * @property string|null $secondary_image_size
 * @property string|null $secondary_image_type
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Content extends Entity
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
        'key' => true,
        'title' => true,
        'text' => true,
        'primary_image' => true,
        'primary_image_dir' => true,
        'primary_image_size' => true,
        'primary_image_type' => true,
        'secondary_image' => true,
        'secondary_image_dir' => true,
        'secondary_image_size' => true,
        'secondary_image_type' => true,
        'created' => true,
        'modified' => true,
    ];
}
