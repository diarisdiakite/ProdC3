<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepartmentsProjectActionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepartmentsProjectActionsTable Test Case
 */
class DepartmentsProjectActionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DepartmentsProjectActionsTable
     */
    public $DepartmentsProjectActions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.departments_project_actions',
        'app.departments',
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
        $config = TableRegistry::getTableLocator()->exists('DepartmentsProjectActions') ? [] : ['className' => DepartmentsProjectActionsTable::class];
        $this->DepartmentsProjectActions = TableRegistry::getTableLocator()->get('DepartmentsProjectActions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DepartmentsProjectActions);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
