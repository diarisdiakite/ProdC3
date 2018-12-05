<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AssignementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AssignementsTable Test Case
 */
class AssignementsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AssignementsTable
     */
    public $Assignements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.assignements',
        'app.groups',
        'app.users',
        'app.posts',
        'app.operations',
        'app.experts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Assignements') ? [] : ['className' => AssignementsTable::class];
        $this->Assignements = TableRegistry::getTableLocator()->get('Assignements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Assignements);

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
