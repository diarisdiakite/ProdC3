<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepartmentsInquiryDatabasesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepartmentsInquiryDatabasesTable Test Case
 */
class DepartmentsInquiryDatabasesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DepartmentsInquiryDatabasesTable
     */
    public $DepartmentsInquiryDatabases;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.departments_inquiry_databases',
        'app.departments',
        'app.inquiry_databases'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DepartmentsInquiryDatabases') ? [] : ['className' => DepartmentsInquiryDatabasesTable::class];
        $this->DepartmentsInquiryDatabases = TableRegistry::getTableLocator()->get('DepartmentsInquiryDatabases', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DepartmentsInquiryDatabases);

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
