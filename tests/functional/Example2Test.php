<?php

namespace DeepWebSolutions\Framework\Bootstrapper\Tests\Functional;


class Example2Test extends \Codeception\TestCase\WPTestCase
{
    /**
     * @var \FunctionalTester
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
	    \DeepWebSolutions\Framework\dws_wp_framework_get_bootstrapper_min_php();

        $post = static::factory()->post->create_and_get();
        
        $this->assertInstanceOf(\WP_Post::class, $post);
    }
}
