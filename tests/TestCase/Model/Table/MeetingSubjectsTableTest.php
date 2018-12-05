<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MeetingSubjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MeetingSubjectsTable Test Case
 */
class MeetingSubjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MeetingSubjectsTable
     */
    public $MeetingSubjects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.meeting_subjects',
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
        $config = TableRegistry::getTableLocator()->exists('MeetingSubjects') ? [] : ['className' => MeetingSubjectsTable::class];
        $this->MeetingSubjects = TableRegistry::getTableLocator()->get('MeetingSubjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MeetingSubjects);

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
