<?php
/**
 * How to enqueue scripts and styles in public-facing pages.
 *
 * @link              https://tassawer.com/
 * @since             1.0.0
 * @package           Plugin_Basics
 *
 * @wordpress-plugin
 * Plugin Name:       Enqueue on Public Pages
 * Plugin URI:        https://tassawer.com/
 * Description:       Examples showing how to enqueue JavaScript and CSS on public-facing pages.
 * Version:           1.0.0
 * Author:            Tassawer Hussain
 * Author URI:        https://tassawer.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt 
 */

 // enqueue public style
function myplugin_enqueue_style_public() {

	/*
		wp_enqueue_style(
			string           $handle,
			string           $src = '',
			array            $deps = array(),
			string|bool|null $ver = false,
			string           $media = 'all'
		)
	*/

	$src = plugin_dir_url( __FILE__ ) .'public/css/example-public.css';

	wp_enqueue_style( 'myplugin-public', $src, array(), null, 'all' );

}
add_action( 'wp_enqueue_scripts', 'myplugin_enqueue_style_public' );


// enqueue public script
function myplugin_enqueue_script_public() {

	/*
		wp_enqueue_script(
			string           $handle,
			string           $src = '',
			array            $deps = array(),
			string|bool|null $ver = false,
			bool             $in_footer = false
		)
	*/

	$src = plugin_dir_url( __FILE__ ) .'public/js/example-public.js';

	wp_enqueue_script( 'myplugin-public', $src, array(), null, false );

}
add_action( 'wp_enqueue_scripts', 'myplugin_enqueue_script_public' );
