<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DateYearsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DateYearsTable Test Case
 */
class DateYearsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DateYearsTable
     */
    public $DateYears;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.date_years',
        'app.inserts',
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
        $config = TableRegistry::getTableLocator()->exists('DateYears') ? [] : ['className' => DateYearsTable::class];
        $this->DateYears = TableRegistry::getTableLocator()->get('DateYears', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DateYears);

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
}
