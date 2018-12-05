<?php
namespace App\Test\TestCase\Controller;

use App\Controller\MinistriesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\MinistriesController Test Case
 */
class MinistriesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ministries',
        'app.users',
        'app.decrets',
        'app.teams',
        'app.experts',
        'app.departments',
        'app.focal_points',
        'app.inserts',
        'app.planifications',
        'app.structures',
        'app.trainings',
        'app.meetings',
        'app.meetings_ministries',
        'app.ministries_trainings'
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
