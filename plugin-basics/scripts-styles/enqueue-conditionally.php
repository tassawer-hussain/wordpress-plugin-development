<?php
/**
 * How to enqueue script and style conditionally.
 *
 * @link              https://tassawer.com/
 * @since             1.0.0
 * @package           Plugin_Basics
 *
 * @wordpress-plugin
 * Plugin Name:       Enqueue Conditionally Examples
 * Plugin URI:        https://tassawer.com/
 * Description:       More examples of JavaScript and CSS enqueue functions to conditionally add script and styles base on hook.
 * Version:           1.0.0
 * Author:            Tassawer Hussain
 * Author URI:        https://tassawer.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt 
 */


// enqueue admin style on specific page
function myplugin_enqueue_style_admin_page( $hook ) {
	
	// wp_die( $hook );
	if ( 'settings_page_dashboard_widgets_suite' === $hook ) {
		$src = plugin_dir_url( __FILE__ ) .'admin/css/example-admin.css';
		wp_enqueue_style( 'myplugin-admin-page', $src, array(), null, 'all' );
	}

}
add_action( 'admin_enqueue_scripts', 'myplugin_enqueue_style_admin_page' );

/**
 * NOTE:
 * 
 * admin_enqueue_scripts
 * This passess a $hook parameter indicating the current page.
 * 
 */


// enqueue admin style on specific page type
function myplugin_enqueue_style_admin_pages( $hook ) {

	// wp_die( $hook );
	if ( 'edit.php' === $hook ) {
		$src = plugin_dir_url( __FILE__ ) .'admin/css/example-admin.css';
		wp_enqueue_style( 'myplugin-admin-pages', $src, array(), null, 'all' );
	}

}
add_action( 'admin_enqueue_scripts', 'myplugin_enqueue_style_admin_pages' );


// dependency example: admin
function myplugin_enqueue_jquery_admin( $hook ) {

	// wp_die( $hook );
	$src = plugin_dir_url( __FILE__ ) .'admin/js/example-admin.js';
	wp_enqueue_script( 'myplugin-admin', $src, array( 'jquery' ), '1.0' );

}
add_action( 'admin_enqueue_scripts', 'myplugin_enqueue_jquery_admin' );


// dependency example: public
function myplugin_enqueue_jquery_public() {

	$src = plugin_dir_url( __FILE__ ) .'public/js/example-public.js';
	wp_enqueue_script( 'myplugin-public', $src, array( 'jquery' ), '1.0' );

}
add_action( 'wp_enqueue_scripts', 'myplugin_enqueue_jquery_public' );




/**
 * NOTE:
 * 
 * wp_register_script()
 * Registers a script to be enqueued later using the wp_enqueue_script() function.
 * 
 * Register a script file but not actually include it.
 * We can include it using the wp_enqueue_script( 'FILE-HANDLE' ); on pages where needed to improve the site performance by adding necessary files on the specific pages only.
 * 
 * wp_register_style()
 * This function register the script file.
 * 
 */