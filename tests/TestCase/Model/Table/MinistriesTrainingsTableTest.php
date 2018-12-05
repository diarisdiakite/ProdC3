<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MinistriesTrainingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MinistriesTrainingsTable Test Case
 */
class MinistriesTrainingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MinistriesTrainingsTable
     */
    public $MinistriesTrainings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ministries_trainings',
        'app.ministries',
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
        $config = TableRegistry::getTableLocator()->exists('MinistriesTrainings') ? [] : ['className' => MinistriesTrainingsTable::class];
        $this->MinistriesTrainings = TableRegistry::getTableLocator()->get('MinistriesTrainings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MinistriesTrainings);

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
