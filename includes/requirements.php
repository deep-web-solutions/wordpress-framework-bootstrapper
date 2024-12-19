<?php

namespace DeepWebSolutions\Framework;

\defined( 'ABSPATH' ) || exit;

/**
 * Returns a given plugin's metadata.
 *
 * @phpstan-type PluginMetaData array{Name: string, PluginURI: string, Version: string, Description: string, Author: string, AuthorURI: string, TextDomain: string, DomainPath: string, Network: bool, Title: string, AuthorName: string, RequiresPHP: string, RequiresWP: string}
 * @template PluginMetaKey of key-of<PluginMetaData>
 *
 * @param   string             $plugin_basename The path to the plugin file relative to the plugins' directory.
 * @param   PluginMetaKey|null $property        Optional. The property to return. Default is null.
 *
 * @return  ($property is null ? PluginMetaData : ($property is PluginMetaKey ? PluginMetaData[PluginMetaKey] : null))
 */
function get_plugin_metadata( $plugin_basename, $property = null ) {
	static $plugin_data = array();

	$can_translate = 0 < \did_action( 'init' );
	$translate_key = $can_translate ? 'translated' : 'raw';

	if ( ! isset( $plugin_data[ $plugin_basename ][ $translate_key ] ) ) {
		$plugin_file = WP_PLUGIN_DIR . '/' . $plugin_basename;
		if ( ! \function_exists( '\get_plugin_data' ) ) {
			/* @phpstan-ignore requireOnce.fileNotFound */
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$plugin_data[ $plugin_basename ][ $translate_key ] = \get_plugin_data( $plugin_file, false, $can_translate );
	}

	$metadata = $plugin_data[ $plugin_basename ][ $translate_key ];
	if ( null === $property ) {
		return $metadata;
	}

	if ( \is_string( $property ) && isset( $metadata[ $property ] ) ) {
		return $metadata[ $property ];
	}

	return null;
}

/**
 * Checks compatibility with the current WordPress version.
 *
 * @param   string $min_wp_version The minimum WP version required to run.
 *
 * @return  bool
 */
function is_wp_version_compatible( $min_wp_version ) {
	if ( ! \function_exists( '\is_wp_version_compatible' ) ) {
		return false;
	}

	\assert( \is_string( $min_wp_version ) );
	return \is_wp_version_compatible( $min_wp_version );
}

/**
 * Checks compatibility with the current PHP version.
 *
 * @param   string $min_php_version The minimum PHP version required to run.
 *
 * @return  bool
 */
function is_php_version_compatible( $min_php_version ) {
	if ( ! \function_exists( '\is_php_version_compatible' ) ) {
		return false;
	}

	\assert( \is_string( $min_php_version ) );
	return \is_php_version_compatible( $min_php_version );
}

/**
 * Validates the plugin requirements.
 *
 * @param   string $plugin_basename The path to the plugin file relative to the plugins directory.
 *
 * @return  true|\WP_Error
 */
function validate_plugin_requirements( $plugin_basename ) {
	$plugin_metadata = get_plugin_metadata( $plugin_basename );
	if ( ! isset( $plugin_metadata['RequiresPHP'] ) || '' === $plugin_metadata['RequiresPHP'] ) {
		$plugin_metadata['RequiresPHP'] = '8.4';
	}
	if ( ! isset( $plugin_metadata['RequiresWP'] ) || '' === $plugin_metadata['RequiresWP'] ) {
		$plugin_metadata['RequiresWP'] = '6.7';
	}

	$is_php_compatible = is_php_version_compatible( $plugin_metadata['RequiresPHP'] );
	$is_wp_compatible  = is_wp_version_compatible( $plugin_metadata['RequiresWP'] );

	$wp_error = new \WP_Error();
	if ( ! $is_wp_compatible ) {
		$wp_error->add( 'plugin_wp_incompatible', '', array( 'requires_wp' => $plugin_metadata['RequiresWP'] ) );
	}
	if ( ! $is_php_compatible ) {
		$wp_error->add( 'plugin_php_incompatible', '', array( 'requires_php' => $plugin_metadata['RequiresPHP'] ) );
	}

	return $wp_error->has_errors() ? $wp_error : true;
}

/**
 * Outputs an error that the system requirements weren't met.
 *
 * @param   string    $plugin_name    The name of the plugin that wants to record the error.
 * @param   string    $plugin_version The version of the plugin that wants to record the error.
 * @param   \WP_Error $error          The error message to display.
 *
 * @return  void
 */
function output_requirements_error( $plugin_name, $plugin_version, $error ) {
	\add_action(
		'admin_notices',
		static function () use ( $plugin_name, $plugin_version, $error ) {
			$requirements_error = \wp_sprintf(
				/* translators: 1: Plugin name, 2: Plugin version */
				\__( '<strong>%1$s (version %2$s)</strong> could not be initialized.', 'dws-wp-framework-bootstrapper' ),
				$plugin_name,
				$plugin_version
			);

			if ( $error->has_errors() ) {
				$requirements_error .= ' ' . \__( 'Your environment does not meet all the system requirements listed below:', 'dws-wp-framework-bootstrapper' );
				$requirements_error .= '<ul class="ul-disc">';

				foreach ( $error->get_error_codes() as $error_code ) {
					\assert( \is_string( $error_code ) || \is_int( $error_code ) );

					$error_data = $error->get_error_data( $error_code );
					if ( ! \is_array( $error_data ) ) {
						$error_data = array();
					}

					switch ( $error_code ) {
						case 'plugin_wp_incompatible':
							$error_message = \wp_sprintf(
								/* translators: 1: Current WP version, 2: Minimum WP version */
								\__( 'Current <em>WordPress version (%1$s)</em> does not meet minimum required version of %2$s.', 'dws-wp-framework-bootstrapper' ),
								\get_bloginfo( 'version' ),
								$error_data['requires_wp']
							);
							break;
						case 'plugin_php_incompatible':
							$error_message = \wp_sprintf(
								/* translators: 1: Current PHP version, 2: Minimum PHP version */
								\__( 'Current <em>PHP version (%1$s)</em> does not meet minimum required version of %2$s.', 'dws-wp-framework-bootstrapper' ),
								PHP_VERSION,
								$error_data['requires_php']
							);
							break;
						default:
							$error_message = $error->get_error_message( $error_code );
					}

					$requirements_error .= "<li>$error_message</li>";
				}

				$requirements_error .= '</ul>';
			}

			\wp_admin_notice( $requirements_error, array( 'type' => 'error' ) );
		}
	);
}
