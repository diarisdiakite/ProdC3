<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InquiryDatabasesStructuresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InquiryDatabasesStructuresTable Test Case
 */
class InquiryDatabasesStructuresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InquiryDatabasesStructuresTable
     */
    public $InquiryDatabasesStructures;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inquiry_databases_structures',
        'app.inquiry_databases',
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
        $config = TableRegistry::getTableLocator()->exists('InquiryDatabasesStructures') ? [] : ['className' => InquiryDatabasesStructuresTable::class];
        $this->InquiryDatabasesStructures = TableRegistry::getTableLocator()->get('InquiryDatabasesStructures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InquiryDatabasesStructures);

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
