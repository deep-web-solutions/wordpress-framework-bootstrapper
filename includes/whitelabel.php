<?php

namespace DeepWebSolutions\Framework;

\defined( 'ABSPATH' ) || exit;

/**
 * Returns the whitelabel name of the plugin's author.
 *
 * @since   2.0.0
 * @version 2.0.0
 *
 * @return  string
 */
function get_whitelabel_author_name() {
	$author_name = 'Deep Web Solutions';

	if ( \defined( __NAMESPACE__ . '\WHITELABEL_AUTHOR_NAME' ) ) {
		$_author_name = \constant( __NAMESPACE__ . '\WHITELABEL_AUTHOR_NAME' );
		$_author_name = \is_string( $_author_name ) ? \trim( $_author_name ) : '';
		if ( '' !== $_author_name ) {
			$author_name = $_author_name;
		}
	}

	return $author_name;
}

/**
 * Returns the path to the whitelabel logo of the plugin's author.
 *
 * @since   2.0.0
 * @version 2.0.0
 *
 * @return  string
 */
function get_whitelabel_author_logo_path() {
	$author_logo_path = get_bootstrapper_dir_path() . '/assets/dws_logo.svg';

	if ( \defined( __NAMESPACE__ . '\WHITELABEL_AUTHOR_LOGO_PATH' ) ) {
		$_author_logo_path = \constant( __NAMESPACE__ . '\WHITELABEL_AUTHOR_LOGO_PATH' );
		$_author_logo_path = \is_string( $_author_logo_path ) ? \trim( $_author_logo_path ) : '';
		if ( \is_file( $_author_logo_path ) ) {
			$author_logo_path = $_author_logo_path;
		}
	}

	return wp_normalize_path( $author_logo_path );
}

/**
 * Returns the URL to the whitelabel logo of the plugin's author.
 *
 * @since   2.0.0
 * @version 2.0.0
 *
 * @return  string
 */
function get_whitelabel_author_logo_url() {
	$author_logo_path = get_whitelabel_author_logo_path();
	return \str_replace( WP_CONTENT_DIR, \content_url(), $author_logo_path );
}

/**
 * Returns the whitelabel support email of the plugin's author.
 *
 * @since   2.0.0
 * @version 2.0.0
 *
 * @return  string
 */
function get_whitelabel_support_email() {
	$support_email = 'support@deep-web-solutions.com';

	if ( \defined( __NAMESPACE__ . '\WHITELABEL_SUPPORT_EMAIL' ) ) {
		$_support_email = \constant( __NAMESPACE__ . '\WHITELABEL_SUPPORT_EMAIL' );
		$_support_email = \is_string( $_support_email ) ? \trim( $_support_email ) : '';
		if ( false !== \is_email( $_support_email ) ) {
			$support_email = $_support_email;
		}
	}

	return $support_email;
}

/**
 * Returns the whitelabel support URL of the plugin's author.
 *
 * @since   2.0.0
 * @version 2.0.0
 *
 * @return  string
 */
function get_whitelabel_support_url() {
	$support_url = 'https://www.deep-web-solutions.com/support/';

	if ( \defined( __NAMESPACE__ . '\WHITELABEL_SUPPORT_URL' ) ) {
		$_support_url = \constant( __NAMESPACE__ . '\WHITELABEL_SUPPORT_URL' );
		$_support_url = \is_string( $_support_url ) ? \trim( $_support_url ) : '';
		if ( '' !== $_support_url ) {
			$support_url = $_support_url;
		}
	}

	return $support_url;
}

/**
 * Returns the whitelabel upload subdirectory name.
 *
 * @since   2.0.0
 * @version 2.0.0
 *
 * @return  string
 */
function get_whitelabel_upload_subdir() {
	$upload_subdir = 'deep-web-solutions';

	if ( \defined( __NAMESPACE__ . '\WHITELABEL_UPLOAD_SUBDIR' ) ) {
		$_upload_subdir = \constant( __NAMESPACE__ . '\WHITELABEL_UPLOAD_SUBDIR' );
		$_upload_subdir = \is_string( $_upload_subdir ) ? \trim( $_upload_subdir ) : '';
		if ( '' !== $_upload_subdir ) {
			$upload_subdir = $_upload_subdir;
		}
	}

	return $upload_subdir;
}
