<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return '';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Change Posts to Industries
 */
function edit_admin_menus() {
    global $menu;

    $menu[5][0] = 'Industries';
}
add_action( 'admin_menu', __NAMESPACE__ . '\\edit_admin_menus' );

/**
 * Add excerpt to pages
 */
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', __NAMESPACE__ . '\\my_add_excerpts_to_pages' );

/**
 * Exclude pages from search
 */
function jp_search_filter( $query ) {
 if ( ! $query->is_admin && $query->is_search && $query->is_main_query() ) {
   $query->set( 'post__not_in', array( 204,200,207,210,65,196,194,192,213 ) );
 }
}

add_action( 'pre_get_posts', __NAMESPACE__ . '\\jp_search_filter' );

// Add lead class to first paragraph
function first_paragraph($content){
	return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1);
}
add_filter('the_content', __NAMESPACE__ . '\\first_paragraph');

?>
