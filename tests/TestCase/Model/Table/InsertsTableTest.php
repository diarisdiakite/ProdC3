<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InsertsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InsertsTable Test Case
 */
class InsertsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InsertsTable
     */
    public $Inserts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inserts',
        'app.users',
        'app.structures',
        'app.planifications',
        'app.ministries',
        'app.composants',
        'app.expected_results',
        'app.project_actions',
        'app.types',
        'app.date_years',
        'app.realizations',
        'app.activations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Inserts') ? [] : ['className' => InsertsTable::class];
        $this->Inserts = TableRegistry::getTableLocator()->get('Inserts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Inserts);

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
