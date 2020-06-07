<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdvantagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdvantagesTable Test Case
 */
class AdvantagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdvantagesTable
     */
    protected $Advantages;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Advantages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Advantages') ? [] : ['className' => AdvantagesTable::class];
        $this->Advantages = TableRegistry::getTableLocator()->get('Advantages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Advantages);

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
}
