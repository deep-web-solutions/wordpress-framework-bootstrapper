<?php

class Example2Test extends \Codeception\TestCase\WPTestCase
{
    /**
     * @var \WpunitTester
     */
    protected $tester;
    
    public function setUp(): void
    {
        // Before...
        parent::setUp();

        // Your set up methods here.
    }

    public function tearDown(): void
    {
        // Your tear down methods here.

        // Then...
        parent::tearDown();
    }

    // Tests
    public function test_it_works()
    {
    	$this->assertEquals( true, isset( get_defined_constants()['DeepWebSolutions\Framework\DWS_WP_FRAMEWORK_BOOTSTRAPPER_NAME'] ) );
    	$this->assertEquals( true, function_exists( 'DeepWebSolutions\Framework\dws_wp_framework_get_bootstrapper_name' ) );
	    $this->assertEquals( 'test', \DeepWebSolutions\Framework\dws_wp_framework_get_bootstrapper_name() );
    }
}
