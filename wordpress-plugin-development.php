<?php
/**
 * WordPress Plugin Development Tutorial
 *
 * @link              https://tassawer.com/
 * @since             1.0.0
 * @package           WordPress_Plugin_Development
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Plugin Development
 * Plugin URI:        https://tassawer.com/
 * Description:       How to create WordPress plugin step by step guide.
 * Version:           1.0.0
 * Author:            Tassawer Hussain
 * Author URI:        https://tassawer.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wordpress-plugin-development
 * Domain Path:       /languages
 */


/**
 * Hire me for your next WordPress plugin development from one of the following.
 * 
 * @link https://tassawer.com/?action=hire-me#hire-me
 * @link https://www.upwork.com/freelancers/~012ab22cc4a4c31988
 * @link https://fiverr.com/tassawer
 * 
 */

 // exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// load text domain
function mylearning_load_textdomain() {
	
	load_plugin_textdomain( 'wordpress-plugin-development', false, plugin_dir_path( __FILE__ ) . 'languages/' );
	
}
add_action( 'plugins_loaded', 'mylearning_load_textdomain' );


// default plugin options
function mylearning_options_default() {

	return array(
		'custom_url'     => 'https://wordpress.org/',
		'custom_title'   => esc_html__('Powered by WordPress', 'wordpress-plugin-development'),
		'custom_style'   => 'disable',
		'custom_message' => '<p class="custom-message">'. esc_html__('My custom message', 'wordpress-plugin-development') .'</p>',
		'custom_footer'  => esc_html__('Special message for users', 'wordpress-plugin-development'),
		'custom_toolbar' => false,
		'custom_scheme'  => 'default',
	);

}


// if admin area
if ( is_admin() ) {

	// include dependencies.
	require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callbacks.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-validate.php';
}

// include plugin dependencies: admin and public
require_once plugin_dir_path( __FILE__ ) . 'includes/core-functions.php';


/*
// remove options on uninstall
function mylearning_on_uninstall() {

	if ( ! current_user_can( 'activate_plugins' ) ) return;

	delete_option( 'mylearning_options' );

}
register_uninstall_hook( __FILE__, 'mylearning_on_uninstall' );
*/



