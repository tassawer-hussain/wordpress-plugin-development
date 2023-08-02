<?php
/**
 * How to enqueue scripts and styles in admin area.
 *
 * @link              https://tassawer.com/
 * @since             1.0.0
 * @package           Plugin_Basics
 *
 * @wordpress-plugin
 * Plugin Name:       Enqueue in Admin Area
 * Plugin URI:        https://tassawer.com/
 * Description:       Examples showing how to enqueue JavaScript and CSS in the Admin Area.
 * Version:           1.0.0
 * Author:            Tassawer Hussain
 * Author URI:        https://tassawer.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt 
 */

// enqueue admin style
function myplugin_enqueue_style_admin() {
	
	/*
		wp_enqueue_style(
			string           $handle,
			string           $src = '',
			array            $deps = array(),
			string|bool|null $ver = false,
			string           $media = 'all'
		)
	*/
	
	$src = plugin_dir_url( __FILE__ ) .'admin/css/example-admin.css';

	wp_enqueue_style( 'myplugin-admin', $src, array(), null, 'all' );

}
add_action( 'admin_enqueue_scripts', 'myplugin_enqueue_style_admin' );


// enqueue admin script
function myplugin_enqueue_script_admin() {
	
	/*
		wp_enqueue_script(
			string           $handle,
			string           $src = '',
			array            $deps = array(),
			string|bool|null $ver = false,
			bool             $in_footer = false
		)
	*/
	
	$src = plugin_dir_url( __FILE__ ) .'admin/js/example-admin.js';

	wp_enqueue_script( 'myplugin-admin', $src, array(), null, false );

}
add_action( 'admin_enqueue_scripts', 'myplugin_enqueue_script_admin' );




