<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProgrammationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProgrammationsTable Test Case
 */
class ProgrammationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProgrammationsTable
     */
    public $Programmations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.programmations',
        'app.experts',
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
        $config = TableRegistry::getTableLocator()->exists('Programmations') ? [] : ['className' => ProgrammationsTable::class];
        $this->Programmations = TableRegistry::getTableLocator()->get('Programmations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Programmations);

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
