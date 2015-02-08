<?php

  // Add post thumbnail support and declare image sizes
  add_theme_support('post-thumbnails');

  // Clean up the <head>
  function removeHeadLinks() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
  }
  add_action('init', 'removeHeadLinks');
  remove_action('wp_head', 'wp_generator');

  // Clean up the title and meta title tags in the head
  function custom_title( $title, $sep ) {
    global $paged, $page;
    if ( is_feed() )
      return $title;
    $title .= get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
      $title = "$title $sep $site_description";
    if ( $paged >= 2 || $page >= 2 )
      $title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );
    return $title;
  }
  add_filter( 'wp_title', 'custom_title', 10, 2 );

  // Add RSS links to <head> section
  add_theme_support( 'automatic-feed-links' );

  /*
   * Remove unused menu pages
   */

  add_action( 'admin_menu', 'my_remove_menu_pages' );

  function my_remove_menu_pages() {
    remove_menu_page('link-manager.php');
    // remove_menu_page('edit-comments.php');
  }

  /*
   * Thumbnails
   */

  if (function_exists( 'add_theme_support' ) ) {
    // Add post thumbnail support and declare image sizes
    add_theme_support('post-thumbnails');
    add_image_size('size-500', 500, 500);
    add_image_size('size-700', 700, 700);
    add_image_size('size-900', 900, 900);
    add_image_size('size-1200', 1200, 1200);
    add_image_size('size-1500', 1500, 1500);
    add_image_size('size-1800', 1800, 1800);
    add_image_size('size-2100', 2100, 2100);
  }

  /*
   * Menus
   */

  register_nav_menus( array(
    'main_menu' => 'Main Menu'
  ));

  /**
   * Incrase Upload Size
   */

  @ini_set( 'upload_max_size' , '64M' );
  @ini_set( 'post_max_size', '64M');
  @ini_set( 'max_execution_time', '300' );

?>