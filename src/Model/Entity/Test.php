<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Test Entity
 *
 * @property int $id
 * @property int $branch_id
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\Question[] $questions
 */
class Test extends Entity
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
        'name' => true,
        'description' => true,
        'created' => true,
        'branch' => true,
        'questions' => true,
    ];
}
