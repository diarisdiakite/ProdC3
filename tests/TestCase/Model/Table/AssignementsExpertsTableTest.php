<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AssignementsExpertsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AssignementsExpertsTable Test Case
 */
class AssignementsExpertsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AssignementsExpertsTable
     */
    public $AssignementsExperts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.assignements_experts',
        'app.assignements',
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
        $config = TableRegistry::getTableLocator()->exists('AssignementsExperts') ? [] : ['className' => AssignementsExpertsTable::class];
        $this->AssignementsExperts = TableRegistry::getTableLocator()->get('AssignementsExperts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AssignementsExperts);

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
