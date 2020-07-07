<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RemitenteTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RemitenteTable Test Case
 */
class RemitenteTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RemitenteTable
     */
    public $Remitente;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Remitente',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Remitente') ? [] : ['className' => RemitenteTable::class];
        $this->Remitente = TableRegistry::getTableLocator()->get('Remitente', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Remitente);

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
