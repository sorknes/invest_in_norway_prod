<?php

/*
Plugin Name: Post Type - Industry
Plugin URI: http://investinginnorway/
Description: Plugin for Custom Post Type - Industry
Version: 1.0
Author: Knut A. Sorknes
Author URI: http://push-media.no
License: GPL2
*/

/****************************************************************************
*
*	Function for plugin activation and deactivation
*
****************************************************************************/
function posttype_industry_plugin_activation() {

    my_custom_post_industry();

    //Flush rewrite rules to be able to use slug in the url's
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'posttype_industry_plugin_activation');

function posttype_industry_plugin_deactivation() {

    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'posttype_industry_plugin_deactivation');

/****************************************************************************
*
*	Function for creating the industri Custom Post Type
*
****************************************************************************/
function my_custom_post_industry() {
  $labels = array(
    'name'               => _x( 'Industries', 'post type general name' ),
    'singular_name'      => _x( 'Industry', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'post' ),
    'add_new_item'       => __( 'Add New Post' ),
    'edit_item'          => __( 'Edit Post' ),
    'new_item'           => __( 'New Post' ),
    'all_items'          => __( 'All Posts' ),
    'view_item'          => __( 'View Post' ),
    'search_items'       => __( 'Search Post' ),
    'not_found'          => __( 'No posts found' ),
    'not_found_in_trash' => __( 'No posts found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Industries'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our industry and industry specific data',
    'public'        => true,
    'menu_position' => 4,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    'has_archive'   => true,
  );
  register_post_type( 'industry', $args );
}
add_action( 'init', 'my_custom_post_industry' );

/****************************************************************************
*
*	Function for creating industri Categories
*
****************************************************************************/
function my_taxonomies_industry() {
  $labels = array(
    'name'              => _x( 'Industry Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Industry Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Industry Categories' ),
    'all_items'         => __( 'All Industries Categories' ),
    'parent_item'       => __( 'Parent Industry Category' ),
    'parent_item_colon' => __( 'Parent Industry Category:' ),
    'edit_item'         => __( 'Edit Industry Category' ),
    'update_item'       => __( 'Update Industry Category' ),
    'add_new_item'      => __( 'Add New Industry Category' ),
    'new_item_name'     => __( 'New Industry Category' ),
    'menu_name'         => __( 'Industry Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'product_category', 'industry', $args );
}
add_action( 'init', 'my_taxonomies_industry', 0 );

?>
