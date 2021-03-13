<?php

namespace DeepWebSolutions\Framework\Bootstrapper\Tests\Integration;

use Codeception\TestCase\WPTestCase;
use WpunitTester;
use function DeepWebSolutions\Framework\dws_wp_framework_check_php_wp_requirements_met;
use function DeepWebSolutions\Framework\dws_wp_framework_get_bootstrapper_init_status;
use function DeepWebSolutions\Framework\dws_wp_framework_get_bootstrapper_min_php;
use function DeepWebSolutions\Framework\dws_wp_framework_get_bootstrapper_min_wp;

/**
 * Integration test for ensuring the environment checker works as expected.
 *
 * @since   1.0.0
 * @version 1.0.0
 * @author  Antonius Hegyes <a.hegyes@deep-web-solutions.com>
 * @package DeepWebSolutions\WP-Framework\Bootstrapper\Tests\Integration
 */
class RequirementsTest extends WPTestCase {
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
	 * Tests that the global PHP constants behave as expected. By definition, this should never fail.
	 *
	 * @since   1.0.0
	 * @version 1.0.0
	 */
	public function test_php_constant() {
		$php_version = PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION . '.' . PHP_RELEASE_VERSION . PHP_EXTRA_VERSION;
		$this->assertEquals( PHP_VERSION, $php_version );
	}

	/**
	 * Test for the lower-bound of the checker.
	 *
	 * @since   1.0.0
	 * @version 1.0.0
	 */
	public function test_current_environment() {
		$check_result = dws_wp_framework_check_php_wp_requirements_met( PHP_VERSION, $GLOBALS['wp_version'] );
		$this->assertEquals( true, $check_result );
	}

	/**
	 * Test for the next releases of PHP.
	 *
	 * @since   1.0.0
	 * @version 1.0.0
	 */
	public function test_future_php_environment() {
		$php_version  = PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION . '.' . ( PHP_RELEASE_VERSION + 1 );
		$check_result = dws_wp_framework_check_php_wp_requirements_met( $php_version, $GLOBALS['wp_version'] );
		$this->assertEquals( false, $check_result );

		$php_version  = PHP_MAJOR_VERSION . '.' . ( PHP_MINOR_VERSION + 1 ) . '.' . PHP_RELEASE_VERSION;
		$check_result = dws_wp_framework_check_php_wp_requirements_met( $php_version, $GLOBALS['wp_version'] );
		$this->assertEquals( false, $check_result );

		$php_version  = ( PHP_MAJOR_VERSION + 1 ) . '.' . PHP_MINOR_VERSION . '.' . PHP_RELEASE_VERSION;
		$check_result = dws_wp_framework_check_php_wp_requirements_met( $php_version, $GLOBALS['wp_version'] );
		$this->assertEquals( false, $check_result );
	}

	/**
	 * Test for the past releases of PHP.
	 *
	 * @since   1.0.0
	 * @version 1.0.0
	 */
	public function test_past_php_environment() {
		$php_version  = PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION . '.' . ( PHP_RELEASE_VERSION - 1 );
		$check_result = dws_wp_framework_check_php_wp_requirements_met( $php_version, $GLOBALS['wp_version'] );
		$this->assertEquals( true, $check_result );

		$php_version  = PHP_MAJOR_VERSION . '.' . ( PHP_MINOR_VERSION - 1 ) . '.' . PHP_RELEASE_VERSION;
		$check_result = dws_wp_framework_check_php_wp_requirements_met( $php_version, $GLOBALS['wp_version'] );
		$this->assertEquals( true, $check_result );

		$php_version  = ( PHP_MAJOR_VERSION - 1 ) . '.' . PHP_MINOR_VERSION . '.' . PHP_RELEASE_VERSION;
		$check_result = dws_wp_framework_check_php_wp_requirements_met( $php_version, $GLOBALS['wp_version'] );
		$this->assertEquals( true, $check_result );
	}

	/**
	 * Ensures both that the getters don't throw an error and also that the init status is set properly.
	 *
	 * @since   1.0.0
	 * @version 1.0.0
	 */
	public function test_plugin_requirements() {
		$check_result = dws_wp_framework_check_php_wp_requirements_met( dws_wp_framework_get_bootstrapper_min_php(), dws_wp_framework_get_bootstrapper_min_wp() );
		$this->assertEquals( $check_result, dws_wp_framework_get_bootstrapper_init_status() );
	}

	// endregion
}
