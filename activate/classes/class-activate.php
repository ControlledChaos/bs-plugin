<?php
/**
 * Plugin activation class
 *
 * The minimum PHP version is not included in the
 * plugin header because the admin notices here are
 * more elegant than the native `die()` screen
 * proveded by the management system.
 *
 * @package    BS_Plugin
 * @subpackage Classes
 * @category   Activate
 * @since      1.0.0
 */

namespace BS_Plugin\Classes\Activate;

// Alias namespaces.
use BS_Plugin\Classes as Classes;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class Activate {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		// Add notice(s) if the PHP version is insufficient.
		if ( ! Classes\bs_php()->version() ) {

			// Add notice to plugin row.
			add_action( 'after_plugin_row_' . BS_BASENAME, [ $this, 'php_deactivate_notice_row' ], 5, 3 );

			// Add notice to admin header, uncomment to implement.
			// add_action( 'admin_notices', [ $this, 'php_deactivate_notice_header' ] );
		}
	}

	/**
	 * Add & update options
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function options() {

		// Add site options.
		// add_option( 'option_name', 'default_value' );

		// Add network options.
		if ( is_multisite() ) {
			// add_network_option( get_current_network_id(), 'option_name', 'default_value' );
		}
	}

	/**
	 * PHP deactivation notice: after plugin row
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns the markup of the plugin row notice.
	 */
	public function php_deactivate_notice_row( $plugin_file, $plugin_data, $status ) {

		$colspan = 4;

		// If WP  version< 5.5.
		if ( version_compare( $GLOBALS['wp_version'], '5.5', '<' ) ) {
			$colspan = 3;
		}

		?>
		<style>
			.plugins tr[data-plugin='<?php echo BS_BASENAME; ?>'] th,
			.plugins tr[data-plugin='<?php echo BS_BASENAME; ?>'] td {
				box-shadow: none;
			}

			<?php if ( isset( $plugin_data['update'] ) && ! empty( $plugin_data['update'] ) ) : ?>

				.plugins tr.<?php echo 'bs-plugin'; ?>-plugin-tr td {
					box-shadow: none ! important;
				}

				.plugins tr.<?php echo 'bs-plugin'; ?>-plugin-tr .update-message {
					margin-bottom: 0;
				}

			<?php endif; ?>
		</style>

		<tr id="plugin-php-notice" class="plugin-update-tr active <?php echo 'bs-plugin'; ?>-plugin-tr">
			<td colspan="<?php echo $colspan; ?>" class="plugin-update colspanchange">
				<div class="update-message notice inline notice-error notice-alt">
					<?php echo sprintf(
						'<p>%s %s %s %s %s %s</p>',
						__( 'Functionality of the', 'bs-plugin' ),
						BS_NAME,
						__( 'plugin has been disabled because it requires PHP version', 'bs-plugin' ),
						Classes\bs_php()->minimum(),
						__( 'or greater. Your system is running PHP version', 'bs-plugin' ),
						phpversion()
					); ?>
				</div>
			</td>
		</tr>
		<?php
	}

	/**
	 * PHP deactivation notice: admin header
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns the markup of the admin notice.
	 */
	public function php_deactivate_notice_header() {

	?>
		<div id="plugin-php-notice" class="notice notice-error is-dismissible">
			<?php echo sprintf(
				'<p>%s %s %s %s %s %s</p>',
				__( 'Functionality of the', 'bs-plugin' ),
				BS_NAME,
				__( 'plugin has been disabled because it requires PHP version', 'bs-plugin' ),
				bs_php()->minimum(),
				__( 'or greater. Your system is running PHP version', 'bs-plugin' ),
				phpversion()
			); ?>
		</div>
	<?php

	}
}
