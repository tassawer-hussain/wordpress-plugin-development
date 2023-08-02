<?php
/**
 * How to enqueue scripts and styles in Login page.
 *
 * @link              https://tassawer.com/
 * @since             1.0.0
 * @package           Plugin_Basics
 *
 * @wordpress-plugin
 * Plugin Name:       Enqueue on Login Page
 * Plugin URI:        https://tassawer.com/
 * Description:       Examples showing how to enqueue JavaScript and CSS on the Login Page.
 * Version:           1.0.0
 * Author:            Tassawer Hussain
 * Author URI:        https://tassawer.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt 
 */


// enqueue login style
function myplugin_enqueue_style_login() {

	$src = plugin_dir_url( __FILE__ ) .'admin/css/example-admin.css';

	wp_enqueue_style( 'myplugin-login', $src, array(), null, 'all' );

}
add_action( 'login_enqueue_scripts', 'myplugin_enqueue_style_login' );





// enqueue login script
function myplugin_enqueue_script_login() {

	$src = plugin_dir_url( __FILE__ ) .'admin/js/example-admin.js';

	wp_enqueue_script( 'myplugin-login', $src, array(), null, false );

}
add_action( 'login_enqueue_scripts', 'myplugin_enqueue_script_login' );
