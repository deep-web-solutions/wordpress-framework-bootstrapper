<?php declare( strict_types=1 );

namespace Tests;

use lucatume\WPBrowser\TestCase\WPTestCase;

class RequirementsTest extends WPTestCase {
   public function test_is_wp_version_compatible() {
	   $this->assertTrue( is_wp_version_compatible( '5.0' ) );
	    $this->assertFalse( is_wp_version_compatible( '10.0' ) );
   }
}
