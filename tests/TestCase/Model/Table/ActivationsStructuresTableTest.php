<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActivationsStructuresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActivationsStructuresTable Test Case
 */
class ActivationsStructuresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActivationsStructuresTable
     */
    public $ActivationsStructures;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.activations_structures',
        'app.activations',
        'app.structures'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ActivationsStructures') ? [] : ['className' => ActivationsStructuresTable::class];
        $this->ActivationsStructures = TableRegistry::getTableLocator()->get('ActivationsStructures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ActivationsStructures);

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
