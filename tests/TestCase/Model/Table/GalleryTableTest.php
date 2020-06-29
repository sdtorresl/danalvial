<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GalleryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GalleryTable Test Case
 */
class GalleryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GalleryTable
     */
    protected $Gallery;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Gallery',
        'app.Branches',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Gallery') ? [] : ['className' => GalleryTable::class];
        $this->Gallery = TableRegistry::getTableLocator()->get('Gallery', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Gallery);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
