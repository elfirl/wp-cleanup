<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/elfirl/
 * @since             1.0.0
 * @package           Rr_Wp_Cbf
 *
 * @wordpress-plugin
 * Plugin Name:       WP Cleanup and Base Functions
 * Plugin URI:        https://github.com/elfirl/wp-cleanup
 * Description:       Head section cleanup and many usual custom settings used on every website setup such as image settings, privacy, and basic admin tweaks.
 * Version:           1.0.0
 * Author:            Mike
 * Author URI:        https://github.com/elfirl/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rr-wp-cbf
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'RR_WP_CBF_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-rr-wp-cbf-activator.php
 */
function activate_rr_wp_cbf() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rr-wp-cbf-activator.php';
	Rr_Wp_Cbf_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-rr-wp-cbf-deactivator.php
 */
function deactivate_rr_wp_cbf() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rr-wp-cbf-deactivator.php';
	Rr_Wp_Cbf_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_rr_wp_cbf' );
register_deactivation_hook( __FILE__, 'deactivate_rr_wp_cbf' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-rr-wp-cbf.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_rr_wp_cbf() {

	$plugin = new Rr_Wp_Cbf();
	$plugin->run();

}
run_rr_wp_cbf();
