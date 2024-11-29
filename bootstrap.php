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
 * Plugin Name:         DWS WordPress Framework Bootstrapper
 * Description:         A set of related functions that help bootstrap and version the other DWS WordPress Framework components.
 * Version:             2.0.0
 * Requires at least:   6.7
 * Requires PHP:        5.3
 * License:             GPL-3.0+
 * License URI:         http://www.gnu.org/licenses/gpl-3.0.txt
 */

declare( strict_types=1 );
namespace DeepWebSolutions\Framework;

if ( ! \defined( 'ABSPATH' ) ) {
	return;
}

// Define component constants.
\function_exists( '\get_plugin_data' ) || require_once ABSPATH . 'wp-admin/includes/plugin.php';
\define( __NAMESPACE__ . '\BOOTSTRAPPER_METADATA', \get_plugin_data( __FILE__, false, false ) );
