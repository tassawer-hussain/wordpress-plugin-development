<?php
/**
 * How to override the pluggable functions in theme or plugin.
 *
 * @link              https://tassawer.com/
 * @since             1.0.0
 * @package           Plugin_Basics
 *
 * @wordpress-plugin
 * Plugin Name:       Pluggable Functions
 * Plugin URI:        https://tassawer.com/
 * Description:       Basic example demonstrating pluggable functions.
 * Version:           1.0.0
 * Author:            Tassawer Hussain
 * Author URI:        https://tassawer.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pluggable-functions
 */

// pluggable function
// This function is defined in the wp-includes/pluggable.php file on line 652.
function wp_logout() {
	wp_destroy_current_session();
	wp_clear_auth_cookie();

	myplugin_custom_logout();

	/**
	 * Fires after a user is logged-out.
	 *
	 * @since 1.5.0
	 */
	do_action( 'wp_logout' );
}



// customize logout function
function myplugin_custom_logout() {

	// do something when the user logs out..

}
// add_action( 'wp_logout', 'myplugin_custom_logout' );