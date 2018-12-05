<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExpertsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExpertsTable Test Case
 */
class ExpertsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExpertsTable
     */
    public $Experts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.experts',
        'app.users',
        'app.teams',
        'app.assistants',
        'app.focal_points',
        'app.ministries',
        'app.programmations',
        'app.assignements',
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
        $config = TableRegistry::getTableLocator()->exists('Experts') ? [] : ['className' => ExpertsTable::class];
        $this->Experts = TableRegistry::getTableLocator()->get('Experts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Experts);

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
