<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MinistriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MinistriesTable Test Case
 */
class MinistriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MinistriesTable
     */
    public $Ministries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ministries',
        'app.users',
        'app.decrets',
        'app.teams',
        'app.experts',
        'app.departments',
        'app.focal_points',
        'app.inserts',
        'app.planifications',
        'app.structures',
        'app.trainings',
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
        $config = TableRegistry::getTableLocator()->exists('Ministries') ? [] : ['className' => MinistriesTable::class];
        $this->Ministries = TableRegistry::getTableLocator()->get('Ministries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ministries);

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
