<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\ReporteComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\ReporteComponent Test Case
 */
class ReporteComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\ReporteComponent
     */
    public $Reporte;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Reporte = new ReporteComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reporte);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
