<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OperadorTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OperadorTable Test Case
 */
class OperadorTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OperadorTable
     */
    public $Operador;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Operador',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Operador') ? [] : ['className' => OperadorTable::class];
        $this->Operador = TableRegistry::getTableLocator()->get('Operador', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Operador);

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
