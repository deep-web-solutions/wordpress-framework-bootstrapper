<?php
/**
 * The DWS WordPress Framework Bootstrapper bootstrap file.
 *
 * @since       1.0.0
 * @version     2.0.0
 * @package     DeepWebSolutions\Framework
 * @author      Antonius Hegyes
 * @license     GPL-3.0-or-later
 *
 * @noinspection    ALL
 *
 * @wordpress-plugin
 * Plugin Name:         Deep Web Solutions Framework Bootstrapper
 * Description:         A set of related functions that help bootstrap and version the other DWS WordPress Framework components.
 * Version:             2.0.0
 * Requires at least:   6.7
 * Requires PHP:        8.4
 * Author:              Antonius Hegyes
 * Author URI:          https://github.com/ahegyes
 * License:             GPL-3.0+
 * License URI:         http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:         dws-wp-framework-bootstrapper
 * Domain Path:         /languages
 */

namespace DeepWebSolutions\Framework;

if ( ! \defined( 'ABSPATH' ) ) {
	// Since this file is autoloaded by Composer, 'exit' breaks all external dev tools.
	return;
}

// Define component constants.
\define( __NAMESPACE__ . '\BOOTSTRAPPER_BASENAME', \plugin_basename( __FILE__ ) );
\define( __NAMESPACE__ . '\BOOTSTRAPPER_DIR_PATH', \plugin_dir_path( __FILE__ ) );
\define( __NAMESPACE__ . '\BOOTSTRAPPER_DIR_URL', \plugin_dir_url( __FILE__ ) );

// Load the rest of the bootstrapper.
require_once __DIR__ . '/functions.php';

// Load component translations, so they are available even for the error admin notices.
\add_action(
	'init',
	static function () {
		\load_plugin_textdomain(
			get_bootstrapper_metadata( 'TextDomain' ),
			false,
			\dirname( get_bootstrapper_basename() ) . get_bootstrapper_metadata( 'DomainPath' )
		);
	}
);

// Bootstrap the bootstrapper (maybe)!
\define( __NAMESPACE__ . '\BOOTSTRAPPER_REQUIREMENTS', validate_plugin_requirements( get_bootstrapper_basename() ) );
if ( true !== is_bootstrapper_initialized() ) {
	/* @phpstan-ignore argument.type */
	output_requirements_error( get_bootstrapper_name(), get_bootstrapper_version(), get_bootstrapper_requirements_status() );
}
