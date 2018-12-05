<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectActionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectActionsTable Test Case
 */
class ProjectActionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectActionsTable
     */
    public $ProjectActions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.project_actions',
        'app.users',
        'app.types',
        'app.expected_results',
        'app.inserts',
        'app.technicals',
        'app.trainings',
        'app.departments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProjectActions') ? [] : ['className' => ProjectActionsTable::class];
        $this->ProjectActions = TableRegistry::getTableLocator()->get('ProjectActions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectActions);

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
