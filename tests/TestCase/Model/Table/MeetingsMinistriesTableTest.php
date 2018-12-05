<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MeetingsMinistriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MeetingsMinistriesTable Test Case
 */
class MeetingsMinistriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MeetingsMinistriesTable
     */
    public $MeetingsMinistries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.meetings_ministries',
        'app.meetings',
        'app.ministries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MeetingsMinistries') ? [] : ['className' => MeetingsMinistriesTable::class];
        $this->MeetingsMinistries = TableRegistry::getTableLocator()->get('MeetingsMinistries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MeetingsMinistries);

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
