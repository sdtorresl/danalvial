<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SocialsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SocialsTable Test Case
 */
class SocialsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SocialsTable
     */
    protected $Socials;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Socials',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Socials') ? [] : ['className' => SocialsTable::class];
        $this->Socials = TableRegistry::getTableLocator()->get('Socials', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Socials);

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
