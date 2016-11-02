<?php

/*
Plugin Name: Post Type - Industry Guide
Plugin URI: http://investinginnorway/
Description: Plugin for Custom Post Type - Industry Guide
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
function posttype_industry_guide_plugin_activation() {

    my_custom_post_industry_guide();

    //Flush rewrite rules to be able to use slug in the url's
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'posttype_industry_guide_plugin_activation');

function posttype_industry_guide_plugin_deactivation() {

    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'posttype_industry_guide_plugin_deactivation');

/****************************************************************************
*
*	Function for creating the industri Custom Post Type
*
****************************************************************************/
function my_custom_post_industry_guide() {
  $labels = array(
    'name'               => _x( 'Industry Guide', 'post type general name' ),
    'singular_name'      => _x( 'Industry Guide', 'post type singular name' ),
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
    'menu_name'          => 'Industry Guide (new)'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our Industry Guide and Industry Guide specific data',
    'public'        => true,
    'menu_position' => 4,
    'menu_icon'		=> 'dashicons-format-aside',
    'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail'),
    'has_archive'   => true,
    'taxonomies'    => array('post_tag')
  );
  register_post_type( 'industry_guide', $args );
}
add_action( 'init', 'my_custom_post_industry_guide' );

/****************************************************************************
*
*	Function for creating industri Categories
*
****************************************************************************/
function my_taxonomies_industry_guide() {
  $labels = array(
    'name'              => _x( 'Industry Guide Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Industry Guide Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Industry Guide Categories' ),
    'all_items'         => __( 'All Industry Guide Categories' ),
    'parent_item'       => __( 'Parent Industry Guide Category' ),
    'parent_item_colon' => __( 'Parent Industry Guide Category:' ),
    'edit_item'         => __( 'Edit Industry Guide Category' ),
    'update_item'       => __( 'Update Industry Guide Category' ),
    'add_new_item'      => __( 'Add New Industry Guide Category' ),
    'new_item_name'     => __( 'New Industry Guide Category' ),
    'menu_name'         => __( 'Industry Guide Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'industry-guide', 'industry_guide', $args );
}
add_action( 'init', 'my_taxonomies_industry_guide', 0 );

/****************************************************************************
*
*	Functions for adding Meta Boxes
*
****************************************************************************/
	function add_pt_people_metaboxes_industry_guide() {
		add_meta_box('pt_metabox_people_one_industry_guide', 'Kontaktperson 1', 'pt_metabox_people_one_industry_guide', 'industry_guide', 'normal', 'default');
        add_meta_box('pt_metabox_people_two_industry_guide', 'Kontaktperson 2', 'pt_metabox_people_two_industry_guide', 'industry_guide', 'normal', 'default');
        add_meta_box('pt_metabox_people_three_industry_guide', 'Kontaktperson 3', 'pt_metabox_people_three_industry_guide', 'industry_guide', 'normal', 'default');
	}
	add_action( 'add_meta_boxes', 'add_pt_people_metaboxes_industry_guide' );


/****************************************************************************
	Functions for metaboxes
************************************************/
	function pt_metabox_people_one_industry_guide($post){
		$pt_title = get_post_meta($post->ID, 'pt_title', true);
        $pt_phone = get_post_meta($post->ID, 'pt_phone', true);
        $pt_email = get_post_meta($post->ID, 'pt_email', true);

		echo '<input type="hidden" name="pt_metabox_pt_people_nonce" id="pt_metabox_pt_people_nonce" value="' .wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

		echo '<table class="form-table">';
		echo '<tr><th><label for="pt_title">Skriv inn navn</label></th><td><input type="text" class="regular-text" id="pt_title" name="pt_title" placeholder="Ola Normann" value="'.$pt_title.'"></td></tr>';
        echo '<tr><th><label for="pt_phone">Skriv inn telefonnummer</label></th><td><input type="text" class="regular-text" id="pt_phone" name="pt_phone" placeholder="920 00 000" value="'.$pt_phone.'"></td></tr>';
        echo '<tr><th><label for="pt_email">Skriv inn e-post adresse</label></th><td><input type="text" class="regular-text" id="pt_email" name="pt_email" placeholder="post@post.no" value="'.$pt_email.'"></td></tr>';
		echo '</table>';
	}

    function pt_metabox_people_two_industry_guide($post){
		$pt_title_two = get_post_meta($post->ID, 'pt_title_two', true);
        $pt_phone_two = get_post_meta($post->ID, 'pt_phone_two', true);
        $pt_email_two = get_post_meta($post->ID, 'pt_email_two', true);

		echo '<table class="form-table">';
		echo '<tr><th><label for="pt_title_two">Skriv inn navn</label></th><td><input type="text" class="regular-text" id="pt_title_two" name="pt_title_two" placeholder="Ola Normann" value="'.$pt_title_two.'"></td></tr>';
        echo '<tr><th><label for="pt_phone_two">Skriv inn telefonnummer</label></th><td><input type="text" class="regular-text" id="pt_phone_two" name="pt_phone_two" placeholder="920 00 000" value="'.$pt_phone_two.'"></td></tr>';
        echo '<tr><th><label for="pt_email_two">Skriv inn e-post adresse</label></th><td><input type="text" class="regular-text" id="pt_email_two" name="pt_email_two" placeholder="post@post.no" value="'.$pt_email_two.'"></td></tr>';
		echo '</table>';
	}

    function pt_metabox_people_three_industry_guide($post){
		$pt_title_three = get_post_meta($post->ID, 'pt_title_three', true);
        $pt_phone_three = get_post_meta($post->ID, 'pt_phone_three', true);
        $pt_email_three = get_post_meta($post->ID, 'pt_email_three', true);

		echo '<table class="form-table">';
		echo '<tr><th><label for="pt_title_three">Skriv inn navn</label></th><td><input type="text" class="regular-text" id="pt_title_three" name="pt_title_three" placeholder="Ola Normann" value="'.$pt_title_three.'"></td></tr>';
        echo '<tr><th><label for="pt_phone_three">Skriv inn telefonnummer</label></th><td><input type="text" class="regular-text" id="pt_phone_three" name="pt_phone_three" placeholder="920 00 000" value="'.$pt_phone_three.'"></td></tr>';
        echo '<tr><th><label for="pt_email_three">Skriv inn e-post adresse</label></th><td><input type="text" class="regular-text" id="pt_email_three" name="pt_email_three" placeholder="post@post.no" value="'.$pt_email_three.'"></td></tr>';
		echo '</table>';
	}

/****************************************************************************
*
*	Functions for SAVING Meta Box Data
*
****************************************************************************/
function save_pt_metabox_people_industry_guide($post_id, $post) {

	//ob_start();

	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times

	//if ( !isset($_POST['pt_metabox_pt_work_nonce']) || !wp_verify_nonce( $_POST['pt_metabox_pt_work_nonce'], basename(__FILE__) )) {
	if ( !wp_verify_nonce( $_POST['pt_metabox_pt_people_nonce'], plugin_basename(__FILE__) )) {
		return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;
	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.
	$people_meta['pt_title'] 				= $_POST['pt_title'];
	$people_meta['pt_phone'] 				= $_POST['pt_phone'];
	$people_meta['pt_email'] 				= $_POST['pt_email'];

    $people_meta['pt_title_two'] 				= $_POST['pt_title_two'];
	$people_meta['pt_phone_two'] 				= $_POST['pt_phone_two'];
	$people_meta['pt_email_two'] 				= $_POST['pt_email_two'];

    $people_meta['pt_title_three'] 				= $_POST['pt_title_three'];
	$people_meta['pt_phone_three'] 				= $_POST['pt_phone_three'];
	$people_meta['pt_email_three'] 				= $_POST['pt_email_three'];

	// Add values of $events_meta as custom fields
	foreach ($people_meta as $key => $value) { // Cycle through the $events_meta array!
		if( $post->post_type == 'revision' ) return; // Don't work custom data twice
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}
}
add_action('save_post', 'save_pt_metabox_people_industry_guide', 1, 2); // save the custom fields

?>
