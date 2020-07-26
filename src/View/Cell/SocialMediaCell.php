<?php
declare(strict_types=1);

namespace App\View\Cell;

use Cake\View\Cell;
use Cake\ORM\TableRegistry;

/**
 * SocialMedia cell
 */
class SocialMediaCell extends Cell
{
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize(): void
    {
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $socialsTable = TableRegistry::getTableLocator()->get('Socials');
        $social = $socialsTable->find('all');
        $social = $social->toArray();

        $this->set(compact('social'));
    }
}
