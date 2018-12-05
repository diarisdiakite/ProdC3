<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActivationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActivationsTable Test Case
 */
class ActivationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActivationsTable
     */
    public $Activations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.activations',
        'app.users',
        'app.inserts',
        'app.posts',
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
        $config = TableRegistry::getTableLocator()->exists('Activations') ? [] : ['className' => ActivationsTable::class];
        $this->Activations = TableRegistry::getTableLocator()->get('Activations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Activations);

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
