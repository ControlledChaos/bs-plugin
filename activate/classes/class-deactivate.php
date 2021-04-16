<?php
/**
 * Plugin deactivation class
 *
 * @package    BS_Plugin
 * @subpackage Classes
 * @category   Activate
 * @since      1.0.0
 */

namespace BS_Plugin\Classes\Activate;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class Deactivate {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {
		// Add actions & filters.
	}
}
