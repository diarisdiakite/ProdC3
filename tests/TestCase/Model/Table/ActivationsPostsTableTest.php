<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActivationsPostsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActivationsPostsTable Test Case
 */
class ActivationsPostsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActivationsPostsTable
     */
    public $ActivationsPosts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.activations_posts',
        'app.activations',
        'app.posts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ActivationsPosts') ? [] : ['className' => ActivationsPostsTable::class];
        $this->ActivationsPosts = TableRegistry::getTableLocator()->get('ActivationsPosts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ActivationsPosts);

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
