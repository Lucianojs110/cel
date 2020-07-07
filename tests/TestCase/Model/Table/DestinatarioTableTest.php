<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DestinatarioTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DestinatarioTable Test Case
 */
class DestinatarioTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DestinatarioTable
     */
    public $Destinatario;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Destinatario',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Destinatario') ? [] : ['className' => DestinatarioTable::class];
        $this->Destinatario = TableRegistry::getTableLocator()->get('Destinatario', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Destinatario);

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
