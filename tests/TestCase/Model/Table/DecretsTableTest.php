<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DecretsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DecretsTable Test Case
 */
class DecretsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DecretsTable
     */
    public $Decrets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.decrets',
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
        $config = TableRegistry::getTableLocator()->exists('Decrets') ? [] : ['className' => DecretsTable::class];
        $this->Decrets = TableRegistry::getTableLocator()->get('Decrets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Decrets);

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
