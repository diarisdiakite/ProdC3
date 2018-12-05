<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExpectedResultsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExpectedResultsTable Test Case
 */
class ExpectedResultsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExpectedResultsTable
     */
    public $ExpectedResults;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.expected_results',
        'app.users',
        'app.composants',
        'app.inserts',
        'app.project_actions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ExpectedResults') ? [] : ['className' => ExpectedResultsTable::class];
        $this->ExpectedResults = TableRegistry::getTableLocator()->get('ExpectedResults', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ExpectedResults);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
