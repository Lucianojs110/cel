<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CartaporteTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CartaporteTable Test Case
 */
class CartaporteTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CartaporteTable
     */
    public $Cartaporte;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Cartaporte',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cartaporte') ? [] : ['className' => CartaporteTable::class];
        $this->Cartaporte = TableRegistry::getTableLocator()->get('Cartaporte', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cartaporte);

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
