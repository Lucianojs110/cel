<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GeneralTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GeneralTable Test Case
 */
class GeneralTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GeneralTable
     */
    public $General;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.General',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('General') ? [] : ['className' => GeneralTable::class];
        $this->General = TableRegistry::getTableLocator()->get('General', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->General);

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
