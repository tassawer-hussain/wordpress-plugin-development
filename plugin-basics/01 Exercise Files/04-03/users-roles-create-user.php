<?php
/*
Plugin Name: Users and Roles: Create User
Description: Example demonstrating how to manage users and roles.
Plugin URI:  https://tassawer.com/
Author:      Tassawer Hussain
Version:     1.0
*/



// add top-level administrative menu
function create_user_add_toplevel_menu() {

	add_menu_page(
		esc_html__('Users and Roles: Create User', 'myplugin'),
		esc_html__('Create User', 'myplugin'),
		'manage_options',
		'myplugin',
		'create_user_display_settings_page',
		'dashicons-admin-generic',
		null
	);

}
add_action( 'admin_menu', 'create_user_add_toplevel_menu' );



// display the plugin settings page
function create_user_display_settings_page() {

	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;

	?>

	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form method="post">
			<h3><?php esc_html_e( 'Add New User', 'myplugin' ); ?></h3>
			<p>
				<label for="username"><?php esc_html_e( 'Username', 'myplugin' ); ?></label><br />
				<input class="regular-text" type="text" size="40" name="username" id="username">
			</p>
			<p>
				<label for="email"><?php esc_html_e( 'Email', 'myplugin' ); ?></label><br />
				<input class="regular-text" type="text" size="40" name="email" id="email">
			</p>
			<p>
				<label for="password"><?php esc_html_e( 'Password', 'myplugin' ); ?></label><br />
				<input class="regular-text" type="text" size="40" name="password" id="password">
			</p>

			<p><?php esc_html_e( 'The user will receive this information via email.', 'myplugin' ); ?></p>

			<input type="hidden" name="myplugin-nonce" value="<?php echo wp_create_nonce( 'myplugin-nonce' ); ?>">
			<input type="submit" class="button button-primary" value="<?php esc_html_e( 'Add User', 'myplugin' ); ?>">
		</form>
	</div>

<?php

}



// add new user
function create_user_add_user() {

	// check if nonce is valid
	if ( isset( $_POST['myplugin-nonce'] ) && wp_verify_nonce( $_POST['myplugin-nonce'], 'myplugin-nonce' ) ) {

		// check if user is allowed
		if ( ! current_user_can( 'manage_options' ) ) wp_die();

		// get submitted username
		if ( isset( $_POST['username'] ) && ! empty( $_POST['username'] ) ) {

			$username = sanitize_user( $_POST['username'] );

		} else {

			$username = '';

		}

		// get submitted email
		if ( isset( $_POST['email'] ) && ! empty( $_POST['email'] ) ) {

			$email = sanitize_email( $_POST['email'] );

		} else {

			$email = '';

		}

		// get submitted password
		if ( isset( $_POST['password'] ) && ! empty( $_POST['password'] ) ) {

			$password = $_POST['password']; // sanitized by wp_create_user()

		} else {

			$password = wp_generate_password();

		}

		// set user_id variable
		$user_id = '';

		// check if user exists
		$username_exists = username_exists( $username );
		$email_exists = email_exists( $email );

		if ( $username_exists || $email_exists ) {

			$user_id = esc_html__( 'The user already exists.', 'myplugin' );

		}

		// check non-empty values
		if ( empty( $username ) || empty( $email ) ) {

			$user_id = esc_html__( 'Required: username and email.', 'myplugin' );

		}

		// create the user
		if ( empty( $user_id ) ) {

			$user_id = wp_create_user( $username, $password, $email );

			if ( is_wp_error( $user_id ) ) {

				$user_id = $user_id->get_error_message();

			} else {

				// email password
				$subject = __( 'Welcome to WordPress!', 'myplugin' );
				$message = __( 'You can log in using your chosen username and this password: ', 'myplugin' ) . $password;

				wp_mail( $email, $subject, $message );

			}

		}

		$location = admin_url( 'admin.php?page=myplugin&result='. urlencode( $user_id ) );

		wp_redirect( $location );

		exit;

	}

}
add_action( 'admin_init', 'create_user_add_user' );



// create the admin notice
function create_user_admin_notices() {

	$screen = get_current_screen();

	if ( 'toplevel_page_myplugin' === $screen->id ) {

		if ( isset( $_GET['result'] ) ) {

			if ( is_numeric( $_GET['result'] ) ) : ?>

				<div class="notice notice-success is-dismissible">
					<p><strong><?php esc_html_e('User added successfully.', 'myplugin'); ?></strong></p>
				</div>

			<?php else : ?>

				<div class="notice notice-warning is-dismissible">
					<p><strong><?php echo esc_html( $_GET['result'] ); ?></strong></p>
				</div>

			<?php endif;

		}

	}

}
add_action( 'admin_notices', 'create_user_admin_notices' );


