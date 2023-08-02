<?php
/**
 * How to customize the WordPress Loop using pre_get_posts hook.
 *
 * @link              https://tassawer.com/
 * @since             1.0.0
 * @package           Plugin_Basics
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Loops: pre_get_posts
 * Plugin URI:        https://tassawer.com/
 * Description:       Demonstrates how to customize the WordPress Loop using pre_get_posts.
 * Version:           1.0.0
 * Author:            Tassawer Hussain
 * Author URI:        https://tassawer.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

 function custom_loop_pre_get_posts( $query ) {

	if ( ! is_admin() && $query->is_main_query() ) {

		$query->set( 'posts_per_page', 1 );
		// $query->set( 'prder', 'ASC' ); // Change post order
		// $query->set( 'cat', '-9, -10' ); // exclude posts from these cat IDs.

	}

}
add_action( 'pre_get_posts', 'custom_loop_pre_get_posts' );

