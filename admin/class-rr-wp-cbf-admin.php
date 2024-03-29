<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/elfirl/
 * @since      1.0.0
 *
 * @package    Rr_Wp_Cbf
 * @subpackage Rr_Wp_Cbf/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Rr_Wp_Cbf
 * @subpackage Rr_Wp_Cbf/admin
 * @author     Mike <none@given.com>
 */
class Rr_Wp_Cbf_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Rr_Wp_Cbf_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rr_Wp_Cbf_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/rr-wp-cbf-admin.css', array(), $this->version, 'all' );

		if( 'settings_page_rr-wp-cbf' == get_current_screen() -> id ) {
			// CSS stylesheet for Color Picker
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/rr-wp-cbf-admin.css', array( 'wp-color-picker' ), $this->version, 'all');
		}

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Rr_Wp_Cbf_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rr_Wp_Cbf_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/rr-wp-cbf-admin.js', array( 'jquery' ), $this->version, false );

		if( 'settings_page_rr-wp-cbf' == get_current_screen() -> id ) {
			wp_enqueue_media();
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/rr-wp-cbf-admin.js', array( 'jquery', 'wp-color-picker' ), $this->version, false );
		}

	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 * 
	 * @since 1.0.0
	 */
	public function add_plugin_admin_menu() {

		/*
		* Add a settings page for this plugin to the Settings menu.
		*/
		add_options_page( 'WP Cleanup and Base Options Functions Setup', 'WP Cleanup', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page') );

	}

	/**
	 * Add settings action link to the plugins page.
	 * 
	 * @since 1.0.0
	 */
	public function add_action_links( $links ) {

		$settings_link = array(
			'<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
		);
		return array_merge( $settings_link, $links );
	}

	/**
	 * Render the settings page for this plugin.
	 * 
	 * @since 1.0.0
	 */
	public function display_plugin_setup_page() {
		include_once( 'partials/rr-wp-cbf-admin-display.php' );
	}

	/**
	 * Saving and Updating
	 * 
	 * @since 1.0.0
	 */
	public function options_update() {
		register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
	}


	/**
	 * Validation for settings page
	 * 
	 * @since 1.0.0
	 */
	public function validate($input) {
		// All checkbox inputs
		$valid = array();

		// Cleanup
		$valid['cleanup'] = (isset($input['cleanup']) && !empty($input['cleanup'])) ? 1 : 0;
		$valid['comments_css_cleanup'] = (isset($input['comments_css_cleanup']) && !empty($input['comments_css_cleanup'])) ? 1: 0;
		$valid['gallery_css_cleanup'] = (isset($input['gallery_css_cleanup']) && !empty($input['gallery_css_cleanup'])) ? 1 : 0;
		$valid['body_class_slug'] = (isset($input['body_class_slug']) && !empty($input['body_class_slug'])) ? 1 : 0;
		$valid['jquery_cdn'] = (isset($input['jquery_cdn']) && !empty($input['jquery_cdn'])) ? 1 : 0;
		$valid['cdn_provider'] = esc_url($input['cdn_provider']);

		// Login Customization
		// First Color Picker
		

		return $valid;
	}

}
