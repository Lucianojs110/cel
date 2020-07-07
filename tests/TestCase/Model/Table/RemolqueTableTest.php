<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RemolqueTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RemolqueTable Test Case
 */
class RemolqueTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RemolqueTable
     */
    public $Remolque;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Remolque',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Remolque') ? [] : ['className' => RemolqueTable::class];
        $this->Remolque = TableRegistry::getTableLocator()->get('Remolque', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Remolque);

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
