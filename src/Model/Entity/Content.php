<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Content Entity
 *
 * @property int $id
 * @property string $identifier
 * @property string $title
 * @property string $text
 * @property string|null $primary_image
 * @property string|null $primary_image_dir
 * @property string|null $primary_image_size
 * @property string|null $primary_image_type
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
        'identifier' => true,
        'title' => true,
        'text' => true,
        'primary_image' => true,
        'primary_image_dir' => true,
        'primary_image_size' => true,
        'primary_image_type' => true,
        'created' => true,
        'modified' => true,
        'branch_id' => true,
    ];
}
