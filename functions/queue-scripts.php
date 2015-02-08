<?php

// Load theme scripts
function load_theme_scripts() {

  // Load Header Script
  wp_register_script('header', get_template_directory_uri()  . '/js/header.js', array(), '', false);
  wp_enqueue_script('header');

  wp_register_script( 'footer', get_template_directory_uri()  . '/js/footer.js', array('jquery',), '', true);
  wp_enqueue_script( 'footer' );
}

add_action( 'wp_enqueue_scripts', 'load_theme_scripts', 0);

?>