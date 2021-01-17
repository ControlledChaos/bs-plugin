<?php
/**
 * BS Plugin
 *
 * A basic starter plugin for ClassicPress, WordPress, and the antibrand system.
 *
 * @package     BS_Plugin
 * @version     1.0.0
 * @link        https://github.com/ControlledChaos/bs-plugin
 *
 * Plugin Name:  BS Plugin
 * Plugin URI:   https://github.com/ControlledChaos/bs-plugin
 * Description:  A basic starter plugin for ClassicPress, WordPress, and the antibrand system.
 * Version:      1.0.0
 * Author:       Controlled Chaos Design
 * Author URI:   http://ccdzine.com/
 * Text Domain:  bs-plugin
 * Domain Path:  /languages
 * Tested up to: 5.6.0
 */

namespace BS_Plugin;

// Alias namespaces.
use BS_Plugin\Classes\Activate as Activate;

/**
 * License & Warranty
 *
 * BS Plugin is free software. It can be redistributed and/or modified
 * ad libidum. There is no license distributed with this product.
 *
 * BS Plugin is distributed WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * Renaming the plugin
 *
 * First change the name of this file to reflect the new name of your plugin.
 * Or leave the name since it clearly describes the purpose of the plugin.
 *
 * Next change the information above in the plugin header and either change
 * the plugin name in the License & Warranty notice or remove it.
 *
 * Following is a list of strings to find and replace in all plugin files.
 *
 * 1. Plugin name
 *    Find `BS Plugin` and replace with your plugin name.
 *
 * 2. Package
 *    Find `BS_Plugin` and replace with your plugin name, include
 *    underscores between words. This will change the package name
 *    in file headers.
 *
 * 3. Namespace
 *    Find `BS_Plugin` and replace with something unique to your plugin name.
 *
 * 4. Text domain
 *    Find `bs-plugin` and replace with the new name of your
 *    primary plugin file (this file). It is standard to match the domain
 *    with the file name but this is not required to run the code.
 *
 * 5. Admin page slug
 *    Find `bs-plugin` and replace with the new base slug of your
 *    plugin's admin pages.
 *
 * 6. Constants prefix
 *    Find `BS` and replace with something unique to your plugin name. Use
 *    only uppercase letters.
 *
 * 7. General prefix
 *    Find `bs` and replace with something unique to your plugin name. Use
 *    only lowercase letters. This will change the prefix of all filters and
 *    settings, and the prefix of functions outside of a class.
 *
 * 8. Author
 *    Find `Greg Sweet <greg@ccdzine.com>` and replace with your name and
 *    email address or those of your organization.
 *
 * 9. Constants
 *    See the `includes/config.php` file to change developer/agency details,
 *    plugin name & URL, plus more personal or white-label constants.
 *
 * 10. Edit the README file in the root directory as needed, or delete it.
 *
 * 11. Finally, remember to modify or remove the instructional information in
 * admin pages, including contextual help tabs. Remove these renaming
 * instructions as desired.
 */

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Constant: Plugin base name
 *
 * @since 1.0.0
 * @var   string The base name of this plugin file.
 */
define( 'BS_BASENAME', plugin_basename( __FILE__ ) );

// Get the PHP version class.
require_once plugin_dir_path( __FILE__ ) . 'includes/classes/class-php-version.php';

// Get plugin configuration file.
require plugin_dir_path( __FILE__ ) . 'config.php';

/**
 * Activation & deactivation
 *
 * The activation & deactivation methods run here before the check
 * for PHP version which otherwise disables the functionality of
 * the plugin.
 */

// Get the plugin activation class.
include_once BS_PATH . 'activate/classes/class-activate.php';

// Get the plugin deactivation class.
include_once BS_PATH . 'activate/classes/class-deactivate.php';

/**
 * Register the activaction & deactivation hooks
 *
 * The namspace of this file must remain escaped by use of the
 * backslash (`\`) prepending the acivation hooks and corresponding
 * functions.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
\register_activation_hook( __FILE__, __NAMESPACE__ . '\activate_plugin' );
\register_deactivation_hook( __FILE__, __NAMESPACE__ . '\deactivate_plugin' );

/**
 * Run activation class
 *
 * The code that runs during plugin activation.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function activate_plugin() {
	Activate\activation_class();
}
activate_plugin();

/**
 * Run daactivation class
 *
 * The code that runs during plugin deactivation.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function deactivate_plugin() {
	Activate\deactivation_class();
}
deactivate_plugin();

/**
 * Disable plugin for PHP version
 *
 * Stop here if the minimum PHP version is not met.
 * Prevents breaking sites running older PHP versions.
 *
 * @since  1.0.0
 * @return void
 */
if ( ! Classes\bs_php()->version() ) {
	return;
}

// Get the plugin initialization file.
require_once BS_PATH . 'init.php';
