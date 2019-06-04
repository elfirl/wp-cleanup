<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/elfirl/
 * @since      1.0.0
 *
 * @package    Rr_Wp_Cbf
 * @subpackage Rr_Wp_Cbf/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Rr_Wp_Cbf
 * @subpackage Rr_Wp_Cbf/includes
 * @author     Mike <none@given.com>
 */
class Rr_Wp_Cbf_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'rr-wp-cbf',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
