<?php

/**
 * Harmonic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Harmonic
 */


if (!function_exists('harmonic_setup')) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function harmonic_setup()
{
	require get_template_directory() . '/functions/helpers.php';
	require get_template_directory() . '/functions/scripts-styles.php';
	require get_template_directory() . '/functions/navigation.php';
	require get_template_directory() . '/functions/post-types.php';
	foreach (glob(dirname(__FILE__) . "/functions/custom/*.php") as $filename) {
		include $filename;
	}

}

endif;
add_action('after_setup_theme', 'harmonic_setup');
add_action('init', 'harmonic_session', 1);
function harmonic_session()
{
	if (!session_id()) {
		session_start();
	}
}


/**
 * Places HNM Logo in WordPress Login Page
 */
function harmonic_login_image() {
echo "
<style>
body.login #login h1 a {
background: url('".get_template_directory_uri()."/img/hnm_logo.png') 8px 0 no-repeat transparent;
height:100px;
width:320px; }

#wp-submit {

	background:#73a3f8;
	border:none;
}
#wp-submit:hover {
	background:#78a7fc;
}
.login .message {
	border-color:#5788e4;
}
</style>
";
}
add_action("login_head", "harmonic_login_image");

add_action('wp_dashboard_setup', 'harmonic_support_widget');

function harmonic_support_widget() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'Need Help?', 'custom_dashboard_help');
}

function custom_dashboard_help() {
echo '<img src="'.get_template_directory_uri().'/img/WP-Admin.png" style="max-width:100%; height:auto;">';
echo '<p>Welcome to the dashboard. If you experience any problems or have any questions please contact us using the details below or <a href="mailto:support@harmonicnewmedia.com">send us an email</a>.</p><ul><li><strong>Call:</strong> +61 8 9227 0003</li><li><strong>Website:</strong> <a href="http://harmonicnewmedia.com">harmonicnewmedia.com</a></li></ul>';
}

function harmonic_admin_styles() {
  echo "
  <style>
    body {
      background: url('".get_template_directory_uri()."/img/bird-bg.png') bottom right no-repeat;
      background-size:420px 420px;
    }
    #wpadminbar #wp-admin-bar-site-name > a:before{
    	content:''!important;
		background-image: url('".get_template_directory_uri()."/img/bird-bg.png')!important;
		background-size:20px 20px;
		background-repeat:no-repeat;
		background-position:center center;
		width:20px;
		height: 20px;
	}
  </style>
  ";
 }

 add_action('admin_head', 'harmonic_admin_styles');

 function remove_wp_logo() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
}
add_action( 'wp_before_admin_bar_render', 'remove_wp_logo' );
