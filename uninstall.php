<?php
/**
 * Fired when the plugin is uninstalled
 *
 * @package    BS_Plugin
 * @since      1.0.0
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
