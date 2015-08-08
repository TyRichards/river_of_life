<?php

# Queue the style
function rol_login_css() {
	wp_enqueue_style( 'rol_login_css', get_template_directory_uri() . '/library/css/login.css', false );
}

# change logo link from wordpress.org to your site
function rol_login_url() {  return home_url(); }

# change the alt text on the logo to show your site name
function rol_login_title() { return get_option('blogname'); }

# calling it only on the login page
add_action('login_enqueue_scripts', 'rol_login_css', 10);
add_filter('login_headerurl', 'rol_login_url');
add_filter('login_headertitle', 'rol_login_title');

?>