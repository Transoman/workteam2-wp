<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package ith
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ith_body_classes( $classes ) {
  // Adds a class of hfeed to non-singular pages.
  if ( ! is_singular() ) {
    $classes[] = 'hfeed';
  }

  // Adds a class of no-sidebar when there is no sidebar present.
  if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    $classes[] = 'no-sidebar';
  }

  return $classes;
}
add_filter( 'body_class', 'ith_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ith_pingback_header() {
  if ( is_singular() && pings_open() ) {
    printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
  }
}
add_action( 'wp_head', 'ith_pingback_header' );

function get_blog_posts($count = null) {
  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => $count ? $count : get_option('posts_per_page'),
    'paged' => $paged,
    'order' => 'ASC',
  );

  $blog_posts = new WP_Query( $args );

  return $blog_posts;
}

/**
 * Remove tag p in CF7
 */
add_filter( 'wpcf7_autop_or_not', '__return_false' );

function js_variables(){
  $variables = array (
    'ajax_url' => admin_url('admin-ajax.php'),
  );
  echo '<script type="text/javascript">window.wp_data = ' . json_encode($variables) . ';</script>';
}
add_action('wp_head','js_variables');

/**
 * Validate Phone Number CF7
 */
function custom_filter_wpcf7_is_tel( $result, $tel ) {
  $result = preg_match( '/\+[0-9]{1}\s\([0-9]{3}\)\s[0-9]{3}-[0-9]{2}-[0-9]{2}/', $tel );
  return $result;
}

add_filter( 'wpcf7_is_tel', 'custom_filter_wpcf7_is_tel', 10, 2 );