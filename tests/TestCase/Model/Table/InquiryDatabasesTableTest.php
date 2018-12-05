<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InquiryDatabasesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InquiryDatabasesTable Test Case
 */
class InquiryDatabasesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InquiryDatabasesTable
     */
    public $InquiryDatabases;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inquiry_databases',
        'app.departments',
        'app.structures'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('InquiryDatabases') ? [] : ['className' => InquiryDatabasesTable::class];
        $this->InquiryDatabases = TableRegistry::getTableLocator()->get('InquiryDatabases', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InquiryDatabases);

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
}
