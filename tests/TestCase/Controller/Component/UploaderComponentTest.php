<?php
namespace CakeFile\Test\TestCase\Controller\Component;

use CakeFile\Controller\Component\UploadComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeFile\Controller\Component\UploadComponent Test Case
 */
class UploaderComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeFile\Controller\Component\UploadComponent
     */
    public $Upload;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Upload = new UploaderComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Upload);

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
