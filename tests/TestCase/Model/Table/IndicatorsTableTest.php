<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IndicatorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IndicatorsTable Test Case
 */
class IndicatorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IndicatorsTable
     */
    public $Indicators;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.indicators',
        'app.months',
        'app.zones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Indicators') ? [] : ['className' => 'App\Model\Table\IndicatorsTable'];
        $this->Indicators = TableRegistry::get('Indicators', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Indicators);

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
