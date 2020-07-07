<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LineasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LineasTable Test Case
 */
class LineasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LineasTable
     */
    public $Lineas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Lineas',
        'app.Colocacion',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Lineas') ? [] : ['className' => LineasTable::class];
        $this->Lineas = TableRegistry::getTableLocator()->get('Lineas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Lineas);

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
