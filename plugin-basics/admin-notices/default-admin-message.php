<?php


// display admin notices
function myplugin_admin_notices() {
	
	settings_errors();
	
}
add_action( 'admin_notices', 'myplugin_admin_notices' );


