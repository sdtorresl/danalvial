<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gallery Entity
 *
 * @property int $id
 * @property int $branch_id
 * @property string $title
 * @property string $image
 * @property string $image_dir
 * @property string $image_size
 * @property string $image_type
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Branch $branch
 */
class Gallery extends Entity
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
        'image' => true,
        'image_dir' => true,
        'image_size' => true,
        'image_type' => true,
        'created' => true,
        'modified' => true,
        'branch' => true,
    ];
}
