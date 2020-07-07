<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LineaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LineaTable Test Case
 */
class LineaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LineaTable
     */
    public $Linea;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Linea',
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
        $config = TableRegistry::getTableLocator()->exists('Linea') ? [] : ['className' => LineaTable::class];
        $this->Linea = TableRegistry::getTableLocator()->get('Linea', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Linea);

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
