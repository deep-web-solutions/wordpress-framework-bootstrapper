<?php
/**
 * The DWS WordPress Framework Bootstrapper Test Plugin bootstrap file.
 *
 * @since               1.1.0
 * @version             1.1.0
 * @package             DeepWebSolutions\WP-Framework\Bootstrapper\Tests
 * @author              Deep Web Solutions GmbH
 * @copyright           2021 Deep Web Solutions GmbH
 * @license             GPL-3.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:         DWS WordPress Framework Bootstrapper Test Plugin
 * Version:             1.0.0
 * Requires PHP:        5.3
 * Author:              Deep Web Solutions GmbH
 * Author URI:          https://www.deep-web-solutions.com
 * License:             GPL-3.0+
 * License URI:         http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace DeepWebSolutions\Plugins;

defined( 'ABSPATH' ) || exit;

// Register autoloader for testing dependencies.
file_exists( __DIR__ . '/vendor/autoload.php' ) && require_once __DIR__ . '/vendor/autoload.php';
if ( ! defined( 'DeepWebSolutions\Framework\DWS_WP_FRAMEWORK_BOOTSTRAPPER_NAME' ) ) {
	define( 'DeepWebSolutions\Framework\DWS_WP_FRAMEWORK_WHITELABEL_NAME', 'Whitelabel Name' );
	define( 'DeepWebSolutions\Framework\DWS_WP_FRAMEWORK_WHITELABEL_LOGO_PATH', 'Whitelabel Logo Path' );

	define( 'DeepWebSolutions\Framework\DWS_WP_FRAMEWORK_WHITELABEL_SUPPORT_EMAIL', 'whitelabel-support@whitelabel-company.com' );
	define( 'DeepWebSolutions\Framework\DWS_WP_FRAMEWORK_WHITELABEL_SUPPORT_URL', 'whitelabel-company.com' );

	define( 'DeepWebSolutions\Framework\DWS_WP_FRAMEWORK_TEMP_DIR_NAME', 'temp-dir-name' );
	define( 'DeepWebSolutions\Framework\DWS_WP_FRAMEWORK_TEMP_DIR_PATH', 'temp-dir-path/temp-dir-name' );
	define( 'DeepWebSolutions\Framework\DWS_WP_FRAMEWORK_TEMP_DIR_URL', 'temp-dir-url/temp-dir-name' );

	require __DIR__ . '/vendor/deep-web-solutions/wp-framework-bootstrapper/bootstrap.php';
}
