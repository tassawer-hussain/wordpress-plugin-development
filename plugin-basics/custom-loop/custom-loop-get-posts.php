<?php
/**
 * How to customize the WordPress Loop using get_posts().
 *
 * @link              https://tassawer.com/
 * @since             1.0.0
 * @package           Plugin_Basics
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Loops: get_posts()
 * Plugin URI:        https://tassawer.com/
 * Description:       Demonstrates how to customize the WordPress Loop using get_posts().
 * Version:           1.0.0
 * Author:            Tassawer Hussain
 * Author URI:        https://tassawer.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// custom loop shortcode: [get_posts_example posts_per_page="5" orderby="date"]
function custom_loop_shortcode_get_posts( $atts ) {
	
	// get global post variable
	global $post;
	
	// define shortcode variables
	extract( shortcode_atts( array( 
		
		'posts_per_page' => 5,
		'orderby' => 'date',
		
	), $atts ) );
	
	// define get_post parameters
	$args = array( 'posts_per_page' => $posts_per_page, 'orderby' => $orderby );
	
	// get the posts
	$posts = get_posts( $args );
	
	// begin output variable
	$output  = '<h3>Custom Loop Example: get_posts()</h3>';
	$output .= '<ul>';
	
	// loop thru posts
	foreach ( $posts as $post ) {
		
		// prepare post data
		setup_postdata( $post );
		
		// continue output variable
		$output .= '<li><a href="'. get_permalink() .'">'. get_the_title() .'</a></li>';
		
	}
	
	// reset post data
	wp_reset_postdata();
	
	// complete output variable
	$output .= '</ul>';
	
	// return output
	return $output;
	
}
// register shortcode function
add_shortcode( 'get_posts_example', 'custom_loop_shortcode_get_posts' );


