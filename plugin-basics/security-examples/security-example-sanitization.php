<?php
/**
 * Usage of Data Sanitization in admin forms
 *
 * @link              https://tassawer.com/
 * @since             1.0.0
 * @package           Plugin_Basics
 *
 * @wordpress-plugin
 * Plugin Name:       Security Example: Data Sanitization
 * Plugin URI:        https://tassawer.com/
 * Description:       Example demonstrating data sanitization.
 * Version:           1.0.0
 * Author:            Tassawer Hussain
 * Author URI:        https://tassawer.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       security-example-sanitization
 */

// add top-level administrative menu
function security_example_sanitization_add_toplevel_menu() {

	add_menu_page(
		'Security Example: Data Sanitization', // Page Title
		'Data Sanitization', // Menu Title.
		'manage_options', // Capability
		'security-example-sanitization', // Menu SLug
		'security_example_sanitization_display_settings_page', // Callback
		'dashicons-admin-generic', // icon
		null // position
	);

}
add_action( 'admin_menu', 'security_example_sanitization_add_toplevel_menu' );

// display the plugin settings page
function security_example_sanitization_display_settings_page() {

	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;
	?>

	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<?php myplugin_form_favorite_movie(); ?>
		<?php myplugin_process_favorite_movie(); ?>
	</div>

<?php
}

 // display form
function myplugin_form_favorite_movie() {
	?>

	<form method="post">
		<p><label for="movie">What is your favorite movie?</label></p>
		<p><input id="movie" type="text" name="favorite-movie"></p>
		<p><input type="submit" value="Submit Form"></p>
	</form>

<?php
}

// process submitted form
function myplugin_process_favorite_movie() {

	if ( isset( $_POST['favorite-movie'] ) ) {

		$fav_movie = sanitize_text_field( $_POST[ 'favorite-movie' ] );

		if ( ! empty( $fav_movie ) ) {
			echo '<p>Your favorite movie is '. $fav_movie .'.</p>';
		} else {
			echo '<p>Please enter your favorite movie!</p>';
		}

	}

}