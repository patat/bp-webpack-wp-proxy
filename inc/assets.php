<?php // ==== ASSETS ==== //

// Enqueue front-end scripts and styles
function enqueue_assets() {

  // Load && parse webpack `manifest.json` file to map hashed asset paths
  // Use some defaults in dev
  $manifest = [
    'main.css' => null,
    'main.js' => 'main.js'
  ];
  if ($manifest_json = file_get_contents('./dist/manifest.json')) {
    $manifest = json_decode($manifest_json, true);
  }

  // ======= CDN SCRIPTS ======== //
  // wp_enqueue_script( 'bootstrap-modal-mgr', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js', array('jquery'), fasle, true );

  // ======= Local Scripts ======= //
  wp_enqueue_script(
    'mainjs',
    get_stylesheet_directory_uri() . 'dist/' . $manifest['main.js'],
    array('jquery', 'owl-carousel2', 'moment'),
    false,
    true
  );

  // ======= CDN Styles & Fonts ======= //
  wp_register_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style( 'font-awesome' );

  // ======= MAIN Stylesheet ======= //
  wp_register_style(
    'maincss',
    get_stylesheet_directory_uri() . 'dist/' . $manifest['main.css'],
  );
  wp_enqueue_style( 'maincss' );


  // ====== Localize variables ====== //
  wp_localize_script( 'mainjs', 'ajax_posts', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' )
  ));

}

add_action( 'wp_enqueue_scripts', 'enqueue_assets' );
