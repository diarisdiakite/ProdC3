<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LeashesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LeashesTable Test Case
 */
class LeashesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LeashesTable
     */
    public $Leashes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.leashes',
        'app.users',
        'app.sectors',
        'app.job_employments',
        'app.trainings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Leashes') ? [] : ['className' => LeashesTable::class];
        $this->Leashes = TableRegistry::getTableLocator()->get('Leashes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Leashes);

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
