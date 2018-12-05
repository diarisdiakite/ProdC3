<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExpertsMeetingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExpertsMeetingsTable Test Case
 */
class ExpertsMeetingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExpertsMeetingsTable
     */
    public $ExpertsMeetings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.experts_meetings',
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
        $config = TableRegistry::getTableLocator()->exists('ExpertsMeetings') ? [] : ['className' => ExpertsMeetingsTable::class];
        $this->ExpertsMeetings = TableRegistry::getTableLocator()->get('ExpertsMeetings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ExpertsMeetings);

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
