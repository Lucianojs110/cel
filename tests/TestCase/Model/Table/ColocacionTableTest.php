<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ColocacionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ColocacionTable Test Case
 */
class ColocacionTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ColocacionTable
     */
    public $Colocacion;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Colocacion',
        'app.Lineas',
        'app.Transfers',
        'app.Estatuses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Colocacion') ? [] : ['className' => ColocacionTable::class];
        $this->Colocacion = TableRegistry::getTableLocator()->get('Colocacion', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Colocacion);

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
