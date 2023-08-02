<?php
/**
 * Usage of nonce in admin forms
 *
 * @link              https://tassawer.com/
 * @since             1.0.0
 * @package           Plugin_Basics
 *
 * @wordpress-plugin
 * Plugin Name:       Security Example: Nonces
 * Plugin URI:        https://tassawer.com/
 * Description:       Example demonstrating nonce security.
 * Version:           1.0.0
 * Author:            Tassawer Hussain
 * Author URI:        https://tassawer.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       security-example-nonces
 */

// add top-level admin menu
function security_example_nonces_add_toplevel_menu() {

	add_menu_page(
		'Security Example: Nonces', // Page Title
		'Nonce Security', // Menu Title
		'manage_options', // Capability
		'security-example-nonces', // Menu Slug
		'security_example_nonces_display_settings_page', // Callback
		'dashicons-admin-generic', // Icon
		null
	);

}
add_action( 'admin_menu', 'security_example_nonces_add_toplevel_menu' );

// display the plugin settings page
function security_example_nonces_display_settings_page() {

	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;
	?>

	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<?php myplugin_form_favorite_music(); ?>
		<?php myplugin_process_favorite_music(); ?>
	</div>
<?php
}

// display form
function myplugin_form_favorite_music() {
	?>

	<form method="post">
		<p><label for="music">What is your favorite music?</label></p>
		<p><input id="music" type="text" name="favorite-music"></p>
		<p><input type="submit" value="Submit Form"></p>
		<?php wp_nonce_field( 'nonce_form_action', 'my_nonce_field', false ); ?>
	</form>

<?php
}

// process submitted form
function myplugin_process_favorite_music() {

	// get the nonce
	$nonce = isset( $_POST['my_nonce_field'] ) ? $_POST['my_nonce_field'] : false;

	// process form
	if ( isset( $_POST['favorite-music'] ) ) {
		
		// verify nonce
		if ( ! wp_verify_nonce( $nonce, 'nonce_form_action' ) ) {
			wp_die( 'Incorrect nonce!' );
		} else {
			$fav_music = sanitize_text_field( $_POST[ 'favorite-music' ] );
			if ( ! empty( $fav_music ) ) {
				echo '<p>Your favorite music is '. $fav_music .'.</p>';
			} else {
				echo '<p>Please enter your favorite music!</p>';
			}
		}
	}
}