<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FrequentQuestionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FrequentQuestionsTable Test Case
 */
class FrequentQuestionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FrequentQuestionsTable
     */
    protected $FrequentQuestions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.FrequentQuestions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FrequentQuestions') ? [] : ['className' => FrequentQuestionsTable::class];
        $this->FrequentQuestions = TableRegistry::getTableLocator()->get('FrequentQuestions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->FrequentQuestions);

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
