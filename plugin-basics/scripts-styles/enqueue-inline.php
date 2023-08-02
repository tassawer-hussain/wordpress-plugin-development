<?php
/**
 * How to enqueue inline JavaScript and CSS in public-facing page.
 *
 * @link              https://tassawer.com/
 * @since             1.0.0
 * @package           Plugin_Basics
 *
 * @wordpress-plugin
 * Plugin Name:       Enqueue Inline
 * Plugin URI:        https://tassawer.com/
 * Description:       Examples showing how to enqueue inline JavaScript and CSS.
 * Version:           1.0.0
 * Author:            Tassawer Hussain
 * Author URI:        https://tassawer.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt 
 */

/** ENQUEUE IN PUBLIC-FACING PAGES */

// enqueue public inline style
function myplugin_inline_style_public() {

	// Step 1 - First enqueue CSS file.
	$src = plugin_dir_url( __FILE__ ) .'public/css/example-public.css';
	wp_enqueue_style( 'myplugin-public', $src, array(), null, 'all' );

	// Step 2 - add inline CSS using the CSS file handle.
	$css = 'body { color: red !important; }';
	wp_add_inline_style( 'myplugin-public', $css );

}
add_action( 'wp_enqueue_scripts', 'myplugin_inline_style_public' );


// enqueue public inline script
function myplugin_inline_script_public() {

	// Step 1 - First enqueue JS file.
	$src = plugin_dir_url( __FILE__ ) .'public/js/example-public.js';
	wp_enqueue_script( 'myplugin-public', $src, array(), null, false );

	// Step 2 - add inline JavaScript using the JS file handle.
	$js = 'alert("Hello world!");';
	wp_add_inline_script( 'myplugin-public', $js );

	/**
	 * NOTE:
	 * 
	 * WordPress Versions 4.5 and earlier
	 * Use: wp_add_inline_script()
	 * 
	 * WordPress Versions 4.5 and later
	 * Use: wp_localize_script()
	 * 
	 */

}
add_action( 'wp_enqueue_scripts', 'myplugin_inline_script_public' );


/** ENQUEUE IN ADMIN PAGES */

// enqueue admin style
function myplugin_enqueue_style_admin() {
	
	// Step 1 - First enqueue CSS file.
	$src = plugin_dir_url( __FILE__ ) .'admin/css/example-admin.css';
	wp_enqueue_style( 'myplugin-admin', $src, array(), null, 'all' );

	// Step 2 - add inline CSS using the CSS file handle.
	$css = 'body { color: red !important; }';
	wp_add_inline_style( 'myplugin-admin', $css );

}
add_action( 'admin_enqueue_scripts', 'myplugin_enqueue_style_admin' );


// enqueue admin script
function myplugin_enqueue_script_admin() {
	
	// Step 1 - First enqueue JS file.
	$src = plugin_dir_url( __FILE__ ) .'admin/js/example-admin.js';
	wp_enqueue_script( 'myplugin-admin', $src, array(), null, false );

	// Step 2 - add inline JavaScript using the JS file handle.
	$js = 'alert("Hello world!");';
	wp_add_inline_script( 'myplugin-admin', $js );

	/**
	 * NOTE:
	 * 
	 * WordPress Versions 4.5 and earlier
	 * Use: wp_add_inline_script()
	 * 
	 * WordPress Versions 4.5 and later
	 * Use: wp_localize_script()
	 * 
	 */

}
add_action( 'admin_enqueue_scripts', 'myplugin_enqueue_script_admin' );




