<?php
/**
 * Usage of activation/deactivation/uninstalling hooks
 *
 * @link              https://tassawer.com/
 * @since             1.0.0
 * @package           Plugin_Basics
 *
 * @wordpress-plugin
 * Plugin Name:       Activate Deactivate
 * Plugin URI:        https://tassawer.com/
 * Description:       Example demonstrating activation, deactivation, and uninstall hooks.
 * Version:           1.0.0
 * Author:            Tassawer Hussain
 * Author URI:        https://tassawer.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       activate-deactivate
 */

/**
 * register_activation_hook() must be called from within the main plugin file.
 * register_activation_hook() must not be registered from within another hook (e.g., "plugins_loaded" or "init"), because such hooks are called before the plugin is activated.
 * 
 * If the activation callback function is located in any file other than the main plugin file, you can include the file before registering with the activation hook, for example:
 * include_once dirname( __FILE__ ) . '/includes/activation.php';
 * register_activation_hook( __FILE__, 'myplugin_activation_function' );
 * 
 * If building a plugin for WP Multisite, it is better to use the "admin_init" hook. More info:
 * https://core.trac.wordpress.org/ticket/14170#comment:68
 * 
 * Never echo/print anything for any of these three hooks:
 * - register_activation_hook()
 * - register_deactivation_hook()
 * - register_uninstall_hook()
 * 
 * Learn more about register_activation_hook():
 * - https://codex.wordpress.org/Function_Reference/register_activation_hook
 * = https://developer.wordpress.org/reference/functions/register_activation_hook/
 *
 */

 // do stuff on activation
function myplugin_on_activation() {

	if ( ! current_user_can( 'activate_plugins' ) ) return;

	add_option( 'myplugin_posts_per_page', 10 );
	add_option( 'myplugin_show_welcome_page', true );

}
register_activation_hook( __FILE__, 'myplugin_on_activation' );


// do stuff on deactivation
function myplugin_on_deactivation() {

	if ( ! current_user_can( 'activate_plugins' ) ) return;

	flush_rewrite_rules();

}
register_deactivation_hook( __FILE__, 'myplugin_on_deactivation' );


// do stuff on uninstall
function myplugin_on_uninstall() {

	if ( ! current_user_can( 'activate_plugins' ) ) return;

	delete_option( 'myplugin_posts_per_page', 10 );
	delete_option( 'myplugin_show_welcome_page', true );

}
register_uninstall_hook( __FILE__, 'myplugin_on_uninstall' );




