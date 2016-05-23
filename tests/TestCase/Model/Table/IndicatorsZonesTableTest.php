<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IndicatorsZonesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IndicatorsZonesTable Test Case
 */
class IndicatorsZonesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IndicatorsZonesTable
     */
    public $IndicatorsZones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.indicators_zones',
        'app.indicators',
        'app.months',
        'app.zones',
        'app.users',
        'app.categories',
        'app.current_month'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('IndicatorsZones') ? [] : ['className' => 'App\Model\Table\IndicatorsZonesTable'];
        $this->IndicatorsZones = TableRegistry::get('IndicatorsZones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IndicatorsZones);

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
