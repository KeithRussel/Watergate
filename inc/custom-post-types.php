<?php

/**
* Registration of custom post types.
*
*
* @package watergate
* @subpackage inc/custon-post-types.php
* @version 0.0.1
* @author Keith Russel
*/

// Actions that we need to hook in to.
add_action('init', 'watergate_cpt');

if( ! function_exists('watergate_cpt') ) {
	/**
	* Watergate custom post types.
	*
	* @return void
	* @hook init
	*/

	// EVENTS
	function watergate_cpt() {
		add_theme_support( 'post-thumbnails' );

		register_post_type( 'rooms',
			array(
				'labels'		=> array(
				'name'			=> __( 'Rooms' ),
				'singular_name'	=> __( 'room' )
				),
				'public'		=> true,
				'has_archive'	=> true,
				'menu_icon'		=> 'dashicons-admin-home',
				'rewrite'		=> array('slug' => 'rooms'),
				'supports'		=> array( 'title', 'editor', 'thumbnail', 'excerpt' ),
				'capability_type' => 'post',
				'taxonomies'          => array(),
				'publicly_queryable' => true
			)
		);

		register_post_type( 'careers',
			array(
				'labels'		=> array(
				'name'			=> __( 'Careers' ),
				'singular_name'	=> __( 'career' )
				),
				'public'		=> true,
				'has_archive'	=> true,
				'menu_icon'		=> 'dashicons-businessman',
				'rewrite'		=> array('slug' => 'careers'),
				'supports'		=> array( 'title', 'editor', 'thumbnail', 'excerpt' ),
				'capability_type' => 'post',
				'taxonomies'          => array(),
				'publicly_queryable' => true
			)
		);

		register_post_type( 'galleries',
			array(
				'labels'		=> array(
				'name'			=> __( 'Galleries' ),
				'singular_name'	=> __( 'gallery' )
				),
				'public'		=> true,
				'has_archive'	=> true,
				'menu_icon'		=> 'dashicons-images-alt',
				'rewrite'		=> array('slug' => 'galleries'),
				'supports'		=> array( 'title', 'editor', 'thumbnail', 'excerpt' ),
				'capability_type' => 'post',
				'taxonomies'          => array(),
				'publicly_queryable' => true
			)
		);

		//TESTIMONIAL
		register_post_type( 'testimonials',
			array(
				'labels'		=> array(
					'name'                => __( 'Testimonials'),
			        'singular_name'       => __( 'Testimonial'),
			        'menu_name'           => __( 'Testimonial'),
			        'parent_item_colon'   => __( 'Parent Testimonial'),
			        'all_items'           => __( 'All Testimonials'),
			        'view_item'           => __( 'View Testimonial'),
			        'add_new_item'        => __( 'Add New Testimonial'),
			        'add_new'             => __( 'Add New'),
			        'edit_item'           => __( 'Edit Testimonial'),
			        'update_item'         => __( 'Update Testimonial'),
			        'search_items'        => __( 'Search Testimonial'),
			        'not_found'           => __( 'Not Found'),
			        'not_found_in_trash'  => __( 'Not found in Trash'),
				),
				'public'		=> true,
				'has_archive'	=> true,
				'menu_icon'		=> 'dashicons-format-status',
				'rewrite'		=> array('slug' => 'testimonial'),
				'supports'		=> array( 'title', 'editor', 'thumbnail', 'excerpt' ),
				'capability_type' => 'post',
				'taxonomies'          => array(),
				'publicly_queryable' => true
			)
		);
	}
}

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_topics_hierarchical_taxonomy', 0 );
 
//create a custom taxonomy name it topics for your posts
 
function create_topics_hierarchical_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'all_items' => __( 'All Types' ),
    'parent_item' => __( 'Parent Type' ),
    'parent_item_colon' => __( 'Parent Type:' ),
    'edit_item' => __( 'Edit Type' ), 
    'update_item' => __( 'Update Type' ),
    'add_new_item' => __( 'Add New Type' ),
    'new_item_name' => __( 'New Type Name' ),
    'menu_name' => __( 'Types' ),
  );
 
// Now register the taxonomy
 
  register_taxonomy('types',array('galleries'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type' ),
  ));
 
}