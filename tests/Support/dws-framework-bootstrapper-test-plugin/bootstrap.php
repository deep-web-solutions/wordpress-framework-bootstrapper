<?php
/**
 * The DWS WordPress Framework Bootstrapper Test Plugin bootstrap file.
 *
 * @since               1.1.0
 * @version             2.0.0
 * @author              Antonius Hegyes
 * @license             GPL-3.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:         DWS Framework Bootstrapper Test Plugin
 * Description:         A WP plugin used to run automated tests against the DWS WP Framework Bootstrapper package.
 * Version:             2.0.0
 */

namespace DeepWebSolutions\Plugins;

\defined( 'ABSPATH' ) || exit;

// Register autoloader for testing dependencies.
\is_file( __DIR__ . '/vendor/autoload.php' ) && require_once __DIR__ . '/vendor/autoload.php';
if ( ! \defined( 'DeepWebSolutions\Framework\BOOTSTRAPPER_BASENAME' ) ) {
	define( 'DeepWebSolutions\Framework\WHITELABEL_AUTHOR_NAME', 'Whitelabel Name' );
	define( 'DeepWebSolutions\Framework\WHITELABEL_AUTHOR_LOGO_PATH', __FILE__ );

	define( 'DeepWebSolutions\Framework\WHITELABEL_SUPPORT_EMAIL', 'whitelabel-support@whitelabel-company.com' );
	define( 'DeepWebSolutions\Framework\WHITELABEL_SUPPORT_URL', 'whitelabel-company.com' );

	define( 'DeepWebSolutions\Framework\WHITELABEL_UPLOAD_SUBDIR', 'temp-dir-name' );

	require __DIR__ . '/vendor/deep-web-solutions/wp-framework-bootstrapper/bootstrap.php';
}
