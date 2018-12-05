<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StructuresTrainingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StructuresTrainingsTable Test Case
 */
class StructuresTrainingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StructuresTrainingsTable
     */
    public $StructuresTrainings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.structures_trainings',
        'app.structures',
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
        $config = TableRegistry::getTableLocator()->exists('StructuresTrainings') ? [] : ['className' => StructuresTrainingsTable::class];
        $this->StructuresTrainings = TableRegistry::getTableLocator()->get('StructuresTrainings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StructuresTrainings);

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
