<?php
function harmonic_scripts()
{
	wp_enqueue_script('wp-api');
	wp_localize_script('wp-api', 'wpApiSettings', array('root' => esc_url_raw(rest_url()), 'nonce' => wp_create_nonce('wp_rest')));

	/* Scripts */
	// wp_deregister_script('jquery');
	// wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.1.1.min.js');
	// wp_enqueue_script('jquery-migrate', 'https://code.jquery.com/jquery-migrate-3.0.0.min.js', array('jquery'), '1', true);
}
add_action('wp_enqueue_scripts', 'harmonic_scripts');
