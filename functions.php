<?php

namespace DeepWebSolutions\Framework;

\defined( 'ABSPATH' ) || exit;

// region META

/**
 * Returns the bootstrapper component's basename.
 *
 * @since   2.0.0
 * @version 2.0.0
 *
 * @return  string
 */
function get_bootstrapper_basename() {
	$basename = \constant( __NAMESPACE__ . '\BOOTSTRAPPER_BASENAME' );
	\assert( \is_string( $basename ) );

	return $basename;
}

/**
 * Returns the bootstrapper component's directory path.
 *
 * @since   2.0.0
 * @version 2.0.0
 *
 * @return  string
 */
function get_bootstrapper_dir_path() {
	$dir_path = \constant( __NAMESPACE__ . '\BOOTSTRAPPER_DIR_PATH' );
	\assert( \is_string( $dir_path ) );

	return $dir_path;
}

/**
 * Returns the bootstrapper component's directory URL.
 *
 * @since   2.0.0
 * @version 2.0.0
 *
 * @return  string
 */
function get_bootstrapper_dir_url() {
	$dir_url = \constant( __NAMESPACE__ . '\BOOTSTRAPPER_DIR_URL' );
	\assert( \is_string( $dir_url ) );

	return $dir_url;
}

/**
 * Returns the bootstrapper component's metadata.
 *
 * @since   2.0.0
 * @version 2.0.0
 *
 * @phpstan-type PluginMetaData array{Name: string, PluginURI: string, Version: string, Description: string, Author: string, AuthorURI: string, TextDomain: string, DomainPath: string, Network: bool, Title: string, AuthorName: string, RequiresPHP: string, RequiresWP: string}
 * @template PluginMetaKey of key-of<PluginMetaData>
 *
 * @param   PluginMetaKey|null $property Optional. The property to return. Default returns all metadata.
 *
 * @return  ($property is null ? PluginMetaData : ($property is PluginMetaKey ? PluginMetaData[PluginMetaKey] : null))
 * @phpstan-ignore-next-line return.unusedType
 */
function get_bootstrapper_metadata( $property = null ) {
	return get_plugin_metadata( get_bootstrapper_basename(), $property );
}

/**
 * Returns the bootstrapper component's name.
 *
 * @since   2.0.0
 * @version 2.0.0
 *
 * @return  string
 */
function get_bootstrapper_name() {
	return \wp_sprintf(
		/* translators: %s: Author name */
		\__( '%s Framework Bootstrapper', 'dws-wp-framework-bootstrapper' ),
		get_whitelabel_author_name()
	);
}

/**
 * Returns the bootstrapper component's version.
 *
 * @since   2.0.0
 * @version 2.0.0
 *
 * @return  string
 */
function get_bootstrapper_version() {
	$version = get_bootstrapper_metadata( 'Version' );
	\assert( \is_string( $version ) );

	return $version;
}

/**
 * Returns any errors that occurred during the bootstrapper component's initialization.
 *
 * @since   2.0.0
 * @version 2.0.0
 *
 * @return  true|\WP_Error
 */
function get_bootstrapper_requirements_status() {
	$requirements = \constant( __NAMESPACE__ . '\BOOTSTRAPPER_REQUIREMENTS' );
	\assert( $requirements instanceof \WP_Error || true === $requirements );

	return $requirements;
}

/**
 * Returns whether the bootstrapper has managed to initialize successfully or not in the current environment.
 *
 * @since   2.0.0
 * @version 2.0.0
 *
 * @return  bool
 */
function is_bootstrapper_initialized() {
	return true === get_bootstrapper_requirements_status();
}

// endregion

// region OTHER

require_once __DIR__ . '/includes/requirements.php';
require_once __DIR__ . '/includes/whitelabel.php';

// endregion
