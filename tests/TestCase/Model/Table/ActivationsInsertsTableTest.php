<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActivationsInsertsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActivationsInsertsTable Test Case
 */
class ActivationsInsertsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActivationsInsertsTable
     */
    public $ActivationsInserts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.activations_inserts',
        'app.activations',
        'app.inserts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ActivationsInserts') ? [] : ['className' => ActivationsInsertsTable::class];
        $this->ActivationsInserts = TableRegistry::getTableLocator()->get('ActivationsInserts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ActivationsInserts);

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
