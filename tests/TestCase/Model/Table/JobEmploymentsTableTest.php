<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JobEmploymentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JobEmploymentsTable Test Case
 */
class JobEmploymentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JobEmploymentsTable
     */
    public $JobEmployments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.job_employments',
        'app.leashes',
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
        $config = TableRegistry::getTableLocator()->exists('JobEmployments') ? [] : ['className' => JobEmploymentsTable::class];
        $this->JobEmployments = TableRegistry::getTableLocator()->get('JobEmployments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JobEmployments);

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
