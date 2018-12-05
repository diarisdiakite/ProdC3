<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ExpertsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ExpertsController Test Case
 */
class ExpertsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.experts',
        'app.users',
        'app.teams',
        'app.assistants',
        'app.focal_points',
        'app.ministries',
        'app.programmations',
        'app.assignements',
        'app.meetings',
        'app.assignements_experts',
        'app.experts_meetings'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
