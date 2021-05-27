<?php
/**
 * A very early error message displayed if environment requirements are not met.
 *
 * @since   1.0.0
 * @version 1.2.0
 * @package DeepWebSolutions\WP-Framework\Bootstrapper\templates
 *
 * @see     dws_wp_framework_output_requirements_error
 *
 * @var     string $component_name
 * @var     string $component_version
 * @var     string $min_php_version
 * @var     string $min_wp_version
 * @var     array  $args
 */

defined( 'ABSPATH' ) || exit;
?>

<?php do_action( 'dws_wp_framework_requirements_error_before', $component_name, $component_version, $min_php_version, $min_wp_version, $args ); ?>

<div class="error notice dws-requirements-error">
	<?php do_action( 'dws_wp_framework_requirements_error_start', $component_name, $component_version, $min_php_version, $min_wp_version, $args ); ?>

	<p>
		<?php
		echo wp_kses(
			wp_sprintf(
				/* translators: 1. Component name, 2. Component version */
				__( '<strong>%1$s (%2$s)</strong> has encountered an error. Your environment doesn\'t meet all of the system requirements listed below:', 'dws-wp-framework-bootstrapper' ),
				$component_name,
				$component_version
			),
			array(
				'strong' => array(),
			)
		);
		?>
	</p>

	<ul class="ul-disc">
		<?php do_action( 'dws_wp_framework_requirements_error_list_before', $component_name, $component_version, $min_php_version, $min_wp_version, $args ); ?>

		<li>
			<strong>PHP <?php echo esc_html( $min_php_version ); ?>+</strong>
			<em><?php echo esc_html( wp_sprintf( /* translators: PHP version */ __( 'You\'re running version %s', 'dws-wp-framework-bootstrapper' ), PHP_VERSION ) ); ?></em>
		</li>
		<li>
			<strong>WordPress <?php echo esc_html( $min_wp_version ); ?>+</strong>
			<em><?php echo esc_html( wp_sprintf( /* translators: WordPress version */ __( 'You\'re running version %s', 'dws-wp-framework-bootstrapper' ), $GLOBALS['wp_version'] ) ); ?></em>
		</li>

		<?php do_action( 'dws_wp_framework_requirements_error_list_after', $component_name, $min_php_version, $min_wp_version, $args ); ?>
	</ul>

	<p>
		<?php
		echo wp_kses(
			__(
				'If you need to upgrade your version of PHP you can ask your hosting company for assistance, and if you need help upgrading WordPress you can refer to <a href="https://wordpress.org/support/article/updating-wordpress/" target="_blank">the Codex</a>.',
				'dws-wp-framework-bootstrapper'
			),
			array(
				'a' => array(
					'href'   => array(),
					'target' => array(),
				),
			)
		);
		?>
	</p>

	<?php do_action( 'dws_wp_framework_requirements_error_end', $component_name, $component_version, $min_php_version, $min_wp_version, $args ); ?>
</div>

<?php do_action( 'dws_wp_framework_requirements_error_after', $component_name, $component_version, $min_php_version, $min_wp_version, $args ); ?>
