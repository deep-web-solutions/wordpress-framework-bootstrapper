<?php

namespace DeepWebSolutions\Framework\Bootstrapper\Tests\Integration;

use Codeception\TestCase\WPTestCase;
use WpunitTester;
use function DeepWebSolutions\Framework\dws_wp_framework_get_bootstrapper_name;
use function DeepWebSolutions\Framework\dws_wp_framework_get_whitelabel_name;
use function DeepWebSolutions\Framework\dws_wp_framework_get_whitelabel_logo_path;
use function DeepWebSolutions\Framework\dws_wp_framework_get_whitelabel_support_email;
use function DeepWebSolutions\Framework\dws_wp_framework_get_whitelabel_support_url;
use function DeepWebSolutions\Framework\dws_wp_framework_get_temp_dir_name;
use function DeepWebSolutions\Framework\dws_wp_framework_get_temp_dir_path;
use function DeepWebSolutions\Framework\dws_wp_framework_get_temp_dir_url;

/**
 * Integration test for whitelabel functionality.
 *
 * @since   1.0.0
 * @version 1.0.0
 * @author  Antonius Hegyes <a.hegyes@deep-web-solutions.com>
 * @package DeepWebSolutions\WP-Framework\Bootstrapper\Tests\Integration
 */
class WhitelabelTest extends WPTestCase {
	// region FIELDS AND CONSTANTS

	/**
	 * Instance of the default WP actor.
	 *
	 * @since   1.0.0
	 * @version 1.0.0
	 *
	 * @access  protected
	 * @var     WpunitTester
	 */
	protected $tester;

	// endregion

	// region TESTS

	/**
	 * Test that the whitelabel name and logo path constants have been successfully overwritten.
	 *
	 * @since   1.0.0
	 * @version 1.0.0
	 */
	public function test_name_and_logo() {
		$this->assertEquals( 'Whitelabel Name', dws_wp_framework_get_whitelabel_name() );
		$this->assertEquals( 'Whitelabel Name: Framework Bootstrapper', dws_wp_framework_get_bootstrapper_name() );
		$this->assertEquals( 'Whitelabel Logo Path', dws_wp_framework_get_whitelabel_logo_path() );
	}

	/**
	 * Test that the support constants have been successfully overwritten.
	 *
	 * @since   1.0.0
	 * @version 1.0.0
	 */
	public function test_support() {
		$this->assertEquals( 'whitelabel-support@whitelabel-company.com', dws_wp_framework_get_whitelabel_support_email() );
		$this->assertEquals( 'whitelabel-company.com', dws_wp_framework_get_whitelabel_support_url() );
	}

	/**
	 * Test that the temp directory constants have been successfully overwritten.
	 *
	 * @since   1.0.0
	 * @version 1.0.0
	 */
	public function test_temp_directory() {
		$this->assertEquals( 'temp-dir-name', dws_wp_framework_get_temp_dir_name() );
		$this->assertEquals( 'temp-dir-path/temp-dir-name', dws_wp_framework_get_temp_dir_path() );
		$this->assertEquals( 'temp-dir-url/temp-dir-name', dws_wp_framework_get_temp_dir_url() );
	}

	// endregion
}
