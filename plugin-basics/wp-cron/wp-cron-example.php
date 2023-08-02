<?php
/**
 * How to setup Cron Jobs in WordPRess.
 *
 * @link              https://tassawer.com/
 * @since             1.0.0
 * @package           Plugin_Basics
 *
 * @wordpress-plugin
 * Plugin Name:       WP-Cron Example
 * Plugin URI:        https://tassawer.com/
 * Description:       Example demonstrating how to use the Cron API to schedule events.
 * Version:           1.0.0
 * Author:            Tassawer Hussain
 * Author URI:        https://tassawer.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */


/**
 * 
 * Steps to setup a Cron Job.
 * 
 * 1 - Register a new time interval using the 'cron_schedules' filter hook or use the existing one.
 * 2 - Schedule the event on plugin activation.
 * 		2a - First check wp_next_scheduled( $hook:string, $args:array ) is not exit.
 * 		2b - Then schedule it. wp_schedule_event( $timestamp:integer, $recurrence:string, $hook:string, $args:array, $wp_error:boolean )
 * 3 - Add the function using the cron hook. add_action( 'example_event', 'wpcron_example_event' );
 */

// add custom cron intervals
function wpcron_intervals( $schedules ) {

	// one minute
	$one_minute = array(
		'interval' => 60,
		'display' => 'One Minute'
	);
	$schedules[ 'one_minute' ] = $one_minute;

	// five minutes
	$five_minutes = array(
		'interval' => 300,
		'display' => 'Five Minutes'
	);
	$schedules[ 'five_minutes' ] = $five_minutes;

	// return data
	return $schedules;

}
add_filter( 'cron_schedules', 'wpcron_intervals' );


// add cron event
function wpcron_activation() {

	/**
	 * 
	 * Retrieve the next timestamo for an event
	 * wp_next_scheduled( $hook:string, $args:array )
	 * 
	 * Schedulte a recurring event
	 * wp_schedule_event( $timestamp:integer, $recurrence:string, $hook:string, $args:array, $wp_error:boolean )
	 */
	
	if ( ! wp_next_scheduled( 'example_event' ) ) {
		wp_schedule_event( time(), 'one_minute', 'example_event' );
	}

}
register_activation_hook( __FILE__, 'wpcron_activation' );


// cron event
function wpcron_example_event() {

	// Make sure this function only run when WordPress is doing the cron work.
	if ( ! defined( 'DOING_CRON' ) ) return;

	$option = get_option( 'wpcron_log' );

	if ( ! empty( $option ) && is_array( $option ) ) {
		$option[] = date( 'h:i:s A' );
	} else {
		$option = array( date( 'h:i:s A' ) );
	}

	update_option( 'wpcron_log', $option );

}
add_action( 'example_event', 'wpcron_example_event' );


// remove cron event
function wpcron_deactivation() {

	// Unscheduled all events attached to the hook with the specifiec arguments.
	// wp_clear_scheduled_hook( $hook:string, $args:array, $wp_error:boolean )
	wp_clear_scheduled_hook( 'example_event' );

	delete_option( 'wpcron_log' );

}
register_deactivation_hook( __FILE__, 'wpcron_deactivation' );


/* create the plugin page */

// add top-level administrative menu
function wpcron_add_toplevel_menu() {

	add_menu_page(
		'WP-Cron Example',
		'Cron API',
		'manage_options',
		'wpcron-example',
		'wpcron_display_settings_page',
		'dashicons-admin-generic',
		null
	);

}
add_action( 'admin_menu', 'wpcron_add_toplevel_menu' );


// display the plugin settings page
function wpcron_display_settings_page() {

	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;

	?>

	<div class="wrap">

		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

		<?php echo wpcron_log(); ?>

	</div>

<?php

}



// get cron log
function wpcron_log() {

	$option = get_option( 'wpcron_log' );

	echo '<p>Cron log for <code>example_event</code></p>';

	foreach ( $option as $key => $value ) {

		echo '<p>'. $key .' : '. $value .'</p>';

	}

}


