<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SecretariesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SecretariesTable Test Case
 */
class SecretariesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SecretariesTable
     */
    public $Secretaries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.secretaries',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Secretaries') ? [] : ['className' => SecretariesTable::class];
        $this->Secretaries = TableRegistry::getTableLocator()->get('Secretaries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Secretaries);

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
