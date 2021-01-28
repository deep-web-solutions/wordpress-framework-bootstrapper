<?php
/**
 * The DWS WordPress Framework Bootstrapper bootstrap file.
 *
 * @since               1.0.0
 * @version             1.0.0
 * @package             DeepWebSolutions\wordpress-framework-bootstrapper
 * @author              Deep Web Solutions GmbH
 * @copyright           2021 Deep Web Solutions GmbH
 * @license             GPL-3.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:         DWS WordPress Framework Bootstrapper
 * Description:         A set of related functions that help bootstrap and version the other DWS WordPress Framework components.
 * Version:             1.0.0
 * Author:              Deep Web Solutions GmbH
 * Author URI:          https://www.deep-web-solutions.de
 * License:             GPL-3.0+
 * License URI:         http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:         dws-wp-framework-bootstrapper
 * Domain Path:         /src/languages
 */

namespace DeepWebSolutions\Framework\Bootstrap;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Since this file is autoloaded by Composer, 'exit' breaks all external dev tools.
}

// Start by autoloading dependencies and defining a few functions for running the bootstrapper. The conditional check makes the whole thing compatible with Composer-based WP management.
file_exists( __DIR__ . '/vendor/autoload.php' ) && require_once __DIR__ . '/vendor/autoload.php';

// Define framework-level constants. These can usually be overwritten inside the main plugin.
require_once 'bootstrap-config.php';

// Define minimum environment requirements.
define( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_BOOTSTRAPPER_VERSION', 'v1.0.0' );
define( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_BOOTSTRAPPER_MIN_PHP', '7.4' );
define( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_BOOTSTRAPPER_MIN_WP', '5.6' );

/**
 * Registers the language files for the bootstrapper's textdomain.
 *
 * @since   1.0.0
 * @version 1.0.0
 */
\add_action(
	'init',
	function() {
		load_plugin_textdomain(
			'dws-wp-framework-bootstrapper',
			false,
			dirname( plugin_basename( __FILE__ ) ) . '/src/languages'
		);
	}
);

// region A few general-use functions for requirement checking.

/**
 * Checks if the system requirements are met.
 *
 * @since   1.0.0
 * @version 1.0.0
 *
 * @param   string  $min_php_version    The minimum PHP version required to run.
 * @param   string  $min_wp_version     The minimum WP version required to run.
 *
 * @return  bool
 */
function dws_wp_framework_check_php_wp_requirements_met( string $min_php_version, string $min_wp_version ): bool {
	if ( version_compare( PHP_VERSION, $min_php_version, '<' ) ) {
		return false;
	} elseif ( version_compare( $GLOBALS['wp_version'], $min_wp_version, '<' ) ) {
		return false;
	}

	return true;
}

/**
 * Prints an error that the system requirements weren't met.
 *
 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
 *
 * @since   1.0.0
 * @version 1.0.0
 *
 * @param   string  $component_name     The name of the component that wants to record the error.
 * @param   string  $component_version  The version of the component that wants to record the error.
 * @param   string  $min_php_version    The minimum PHP version required to run.
 * @param   string  $min_wp_version     The minimum WP version required to run.
 * @param   array   $args               Associative array of other variables that should be made available in the template's context.
 */
function dws_wp_framework_output_requirements_error( string $component_name, string $component_version, string $min_php_version, string $min_wp_version, array $args = array() ): void {
	if ( did_action( 'admin_notices' ) ) {
		_doing_it_wrong(
			__FUNCTION__,
			'The requirements error message cannot be outputted after the admin_notices action has been already executed.',
			'1.0.0'
		);
	} else {
		add_action(
			'admin_notices',
			function() use ( $component_name, $component_version, $min_php_version, $min_wp_version, $args ) {
				require_once __DIR__ . '/src/templates/requirements-error.php';
			}
		);
	}
}

// endregion

// region Bootstrap the bootstrapper (maybe)!

$dws_bootstrapper_version         = constant( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_BOOTSTRAPPER_VERSION' );
$dws_bootstrapper_min_php_version = constant( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_BOOTSTRAPPER_MIN_PHP' );
$dws_bootstrapper_min_wp_version  = constant( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_BOOTSTRAPPER_MIN_WP' );

if ( dws_wp_framework_check_php_wp_requirements_met( $dws_bootstrapper_min_php_version, $dws_bootstrapper_min_wp_version ) ) {
	define( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_BOOTSTRAPPER_INIT', true );
} else {
	define( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_BOOTSTRAPPER_INIT', false );
	dws_wp_framework_output_requirements_error( constant( __NAMESPACE__ . '\DWS_WP_FRAMEWORK_BOOTSTRAPPER_NAME' ), $dws_bootstrapper_version, $dws_bootstrapper_min_php_version, $dws_bootstrapper_min_wp_version );
}

// endregion
