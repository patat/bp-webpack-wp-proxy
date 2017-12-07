<?php // ==== FUNCTIONS ==== //

// Front-end assets loading
require_once( trailingslashit( get_stylesheet_directory() ) . 'inc/assets.php' );

// Hide the admin bar on the client-side
add_filter( 'show_admin_bar', '__return_false' );

// CDNify jQuery
function modify_jquery() {
  if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-2.2.4.min.js', false, '2.2.0');
    wp_enqueue_script('jquery');
  }
}
add_action('init', 'modify_jquery');