<?php

function get_all_ids() {
  $args = array( 'posts_per_page' => -1, 'post_type' => 'project');
  function get_id ($post) {
    return $post->ID;
  }
  return array_map('get_id', get_posts($args));
}

// Load theme scripts
function load_theme_scripts() {

  // Load Header Script
  wp_register_script('header', get_template_directory_uri()  . '/js/header.js', array(), '', false);
  wp_enqueue_script('header');

  wp_register_script('lodash', get_template_directory_uri()  . '/lib/lodash/lodash.min.js', array(), '', false);
  wp_enqueue_script('lodash');

  wp_register_script(
    'imagesLoaded',
    get_template_directory_uri()  . '/lib/imagesloaded/imagesloaded.pkgd.min.js',
    array('jquery', 'lodash'),
    '',
    false
  );
  wp_enqueue_script('imagesLoaded');

  wp_register_script(
    'getAppropriateSize',
    get_template_directory_uri()  . '/js/getAppropriateSize.js',
    array('jquery', 'lodash', 'imagesLoaded'),
    '',
    true
  );
  wp_enqueue_script( 'getAppropriateSize' );

  wp_register_script(
    'slideshow',
    get_template_directory_uri()  . '/js/slideshow.js',
    array('jquery', 'lodash', 'getAppropriateSize', 'imagesLoaded'),
    '',
    true
  );
  wp_enqueue_script( 'slideshow' );

  wp_register_script(
    'footer',
    get_template_directory_uri()  . '/js/footer.js',
    array('jquery', 'lodash', 'getAppropriateSize', 'slideshow', 'imagesLoaded'),
    '',
    true
  );
  wp_enqueue_script( 'footer' );

  if (is_front_page()) {
    $ids = get_all_ids();
  } else {
    $ids = array(
      get_the_id()
    );
  }
  function get_image_for_id ($id) {
    return new Image($id);
  }
  function filter_by_image_not_null ($image) {
    return $image->url !== null;
  }
  wp_localize_script( 'footer', 'CaitlinCordtzData', array(
    'images' => array_values(array_filter(
      array_map('get_image_for_id', $ids),
      "filter_by_image_not_null"
    ))
  ));
}

add_action( 'wp_enqueue_scripts', 'load_theme_scripts', 0);

?>