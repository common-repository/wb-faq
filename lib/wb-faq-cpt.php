<?php
// Custom Post Type Setup
function wb_faq_post_type() {
	$labels = array(
		'name' => __('All FAQs', 'wb-faq'),
		'singular_name' => __('WB FAQ', 'wb-faq'),
		'add_new' => __('Add New FAQ', 'wb-faq'),
		'all_items' => __('All FAQs', 'wb-faq' ),
		'add_new_item' => __('Add New FAQ', 'wb-faq'),
		'edit_item' => __('Edit FAQ', 'wb-faq'),
		'new_item' => __('New FAQ', 'wb-faq'),
		'view_item' => __('View FAQ', 'wb-faq'),
		'search_items' => __('Search FAQ', 'wb-faq'),
		'not_found' => __('No FAQ', 'wb-faq'),
		'not_found_in_trash' => __('No FAQ found in Trash', 'wb-faq'),
		'parent_item_colon' => '',
		'menu_name' => __('WB FAQ', 'wb-faq') // this name will be shown on the menu
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => true,
		'publicly_queryable' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 5,
		'menu_icon' =>'dashicons-editor-help',
		'supports' => array('title','editor','thumbnail', 'page-attributes')
	);
	register_post_type('wb-faq', $args);
}
 add_action( 'init', 'wb_faq_post_type' );

// Adding a taxonomy for the FAQ post type

function wb_faq_taxonomy() {
		$args = array('hierarchical' => true);
		register_taxonomy( 'wb_category', 'wb-faq', $args );
	}
 add_action( 'init', 'wb_faq_taxonomy', 0 );
