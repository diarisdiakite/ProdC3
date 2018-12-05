<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepartmentsMeetingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepartmentsMeetingsTable Test Case
 */
class DepartmentsMeetingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DepartmentsMeetingsTable
     */
    public $DepartmentsMeetings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.departments_meetings',
        'app.departments',
        'app.meetings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DepartmentsMeetings') ? [] : ['className' => DepartmentsMeetingsTable::class];
        $this->DepartmentsMeetings = TableRegistry::getTableLocator()->get('DepartmentsMeetings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DepartmentsMeetings);

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
