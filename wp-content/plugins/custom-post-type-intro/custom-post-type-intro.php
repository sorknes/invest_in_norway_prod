<?php

/*
Plugin Name: Post Type - Intro
Plugin URI: http://investinginnorway/
Description: Plugin for Custom Post Type - Intro
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
function posttype_intro_plugin_activation() {

    posttype_intro();

    //Flush rewrite rules to be able to use slug in the url's
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'posttype_intro_plugin_activation');

function posttype_intro_plugin_deactivation() {

    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'posttype_intro_plugin_deactivation');

/****************************************************************************
*
*	Function for creating the intro Custom Post Type
*
****************************************************************************/
    function posttype_intro() {
        $labels = array(
    		'name'               => _x( 'Intro', 'Intro' ),
    		'singular_name'      => _x( 'Intro', 'Intro' ),
    		'add_new'            => _x( 'Add new', 'Intro' ),
    		'add_new_item'       => __( 'Add new', 'Intro' ),
    		'edit_item'          => __( 'Edit' ),
    		'new_item'           => __( 'New' ),
    		'all_items'          => __( 'View all' ),
    		'view_item'          => __( 'View intro' ),
    		'search_items'       => __( 'Search Posts.' ),
    		'not_found'          => __( 'No posts found.' ),
    		'not_found_in_trash' => __( 'No posts found in bin.' ),
    		'parent_item_colon'  => '',
    		'menu_name'          => 'Intro'
        );

        $args = array(
            'labels'        => $labels,
            'description'   => 'Adds a jumbotron field with a bacground image, text and custom link button',
            'public'        => true,
            'menu_position' => 2,
            'menu_icon'		=> 'dashicons-format-image',
            'supports'      => array( 'title', 'thumbnail', 'editor'),
            'has_archive'   => false,
            'exclude_from_search' => true,
            'rewrite' 		=> array(
            	'slug'			=>'intro',
            	'with_front'	=> false,
            	'feed'			=> true,
            	'pages'			=> true
            ),
            'hierarchical'	=> false
        );
        register_post_type( 'intro', $args );
    }

    add_action( 'init', 'posttype_intro' );

/****************************************************************************
*
*	Functions for adding Meta Boxes
*
****************************************************************************/
	function add_pt_intro_metaboxes() {
		add_meta_box('pt_metabox_intro_extra', 'Add button?', 'pt_metabox_intro_extras', 'intro', 'normal', 'default');
	}
	add_action( 'add_meta_boxes', 'add_pt_intro_metaboxes' );

/****************************************************************************
	Functions for metabox
****************************************************************************/
	function pt_metabox_intro_extras($post){
		$link_text				= get_post_meta($post->ID, 'pt_link_text', true);
		$link 					= get_post_meta($post->ID, 'pt_link', true);

		echo '<input type="hidden" name="pt_metabox_intro_nonce" id="pt_metabox_intro_nonce" value="' .wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

		echo '<table class="form-table">';
		echo '<tr><th><label for="pt_link_text">Button text (optional)</label><p class="description">Add a custom text.</p></th><td><input type="text" class="regular-text" id="pt_link_text" name="pt_link_text" placeholder="Learn more" value="'.$link_text.'" /></td></tr>';
		echo '<tr><th><label for="pt_link">Link to (optional)</label><p class="description">Page you want the button to go to.</p></th><td><input type="text" class="regular-text" id="pt_link" name="pt_link" placeholder="http://investinginnorway.com/some-page" value="'.$link.'" /></td></tr>';
		echo '</table>';
	}

/****************************************************************************
*
*	Functions for SAVING Meta Box Data
*
****************************************************************************/
function save_pt_metabox_intro_contactinfo($post_id, $post) {
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['pt_metabox_intro_nonce'], plugin_basename(__FILE__) )) {
		return $post->ID;
	}
	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;
	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.
	$intro_meta['pt_link_text'] 		= $_POST['pt_link_text'];
	$intro_meta['pt_link'] 				= $_POST['pt_link'];

	// Add values of $events_meta as custom fields
	foreach ($intro_meta as $key => $value) { // Cycle through the $events_meta array!
		if( $post->post_type == 'revision' ) return; // Don't intro custom data twice
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}
}
add_action('save_post', 'save_pt_metabox_intro_contactinfo', 1, 2); // save the custom fields

?>
