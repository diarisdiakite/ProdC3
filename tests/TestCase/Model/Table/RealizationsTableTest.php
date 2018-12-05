<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RealizationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RealizationsTable Test Case
 */
class RealizationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RealizationsTable
     */
    public $Realizations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.realizations',
        'app.users',
        'app.departments',
        'app.inserts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Realizations') ? [] : ['className' => RealizationsTable::class];
        $this->Realizations = TableRegistry::getTableLocator()->get('Realizations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Realizations);

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
