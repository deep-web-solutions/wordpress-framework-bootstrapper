<?php declare( strict_types=1 );

namespace Tests\Integration;

use lucatume\WPBrowser\TestCase\WPTestCase;

class RequirementsTest extends WPTestCase {
   public function test_is_wp_version_compatible() {
		$this->assertTrue( \DeepWebSolutions\Framework\is_wp_version_compatible( '5.0' ) );
        $this->assertFalse( \DeepWebSolutions\Framework\is_wp_version_compatible( '100.0' ) );
   }

   public function test_is_php_version_compatible() {
        $this->assertTrue( \DeepWebSolutions\Framework\is_php_version_compatible( '5.3' ) );
		$this->assertFalse( \DeepWebSolutions\Framework\is_php_version_compatible( '100.0' ) );
   }

	public function test_validate_plugin_requirements() {
		$result = \DeepWebSolutions\Framework\validate_plugin_requirements( 'dws-framework-bootstrapper-test-plugin/bootstrap.php' );
		if ( \DeepWebSolutions\Framework\is_wp_version_compatible( '6.7' ) && \DeepWebSolutions\Framework\is_php_version_compatible( '8.4' ) ) {
			$this->assertTrue( $result );
		} else {
			$this->assertTrue( is_wp_error( $result ) );
		}
	}
}
