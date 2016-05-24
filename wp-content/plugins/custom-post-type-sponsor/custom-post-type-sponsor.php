<?php

/*
Plugin Name: Post Type - Sponsor
Plugin URI: http://investinginnorway/
Description: Plugin for Custom Post Type - Sponsor
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
function posttype_sponsor_plugin_activation() {

    my_custom_post_sponsor();

    //Flush rewrite rules to be able to use slug in the url's
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'posttype_sponsor_plugin_activation');

function posttype_sponsor_plugin_deactivation() {

    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'posttype_sponsor_plugin_deactivation');

/****************************************************************************
*
*	Function for creating the industri Custom Post Type
*
****************************************************************************/
function my_custom_post_sponsor() {
  $labels = array(
    'name'               => _x( 'Sponsor', 'post type general name' ),
    'singular_name'      => _x( 'Sponsor', 'post type singular name' ),
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
    'menu_name'          => 'Sponsors'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our sponsors and sponsor specific data',
    'public'        => true,
    'menu_position' => 4,
    'menu_icon'		=> 'dashicons-format-gallery',
    'supports'      => array( 'title', 'thumbnail'),
    'has_archive'   => true,
  );
  register_post_type( 'sponsor', $args );
}
add_action( 'init', 'my_custom_post_sponsor' );

/****************************************************************************
*
*	Function for creating industri Categories
*
****************************************************************************/
function my_taxonomies_sponsor() {
  $labels = array(
    'name'              => _x( 'Sponsor Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Sponsor Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Sponsor Categories' ),
    'all_items'         => __( 'All Industries Categories' ),
    'parent_item'       => __( 'Parent Sponsor Category' ),
    'parent_item_colon' => __( 'Parent Sponsor Category:' ),
    'edit_item'         => __( 'Edit Sponsor Category' ),
    'update_item'       => __( 'Update Sponsor Category' ),
    'add_new_item'      => __( 'Add New Sponsor Category' ),
    'new_item_name'     => __( 'New Sponsor Category' ),
    'menu_name'         => __( 'Sponsor Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'sponsor_category', 'sponsor', $args );
}
add_action( 'init', 'my_taxonomies_sponsor', 0 );

?>
