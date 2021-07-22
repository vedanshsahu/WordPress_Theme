<?php
    /*
        Plugin Name: Rubico1 - Post Types
        Plugin URI: 
        Description: Adds a new Post Type into WordPress
        Version: 1.0
        Author: RubicoIT PVT. LTD.
        Author URI: https://www.rubicoit.com/
        Text Domain: rubico1
    */

    if(!defined('ABSPATH')) die();


// Register new Custom Post Type
function rubico_Project_post_type() {

	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'rubico' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'rubico' ),
		'menu_name'             => __( 'Projects', 'rubico' ),
		'name_admin_bar'        => __( 'Projects', 'rubico' ),
		'archives'              => __( 'Archive', 'rubico' ),
		'attributes'            => __( 'Attributes', 'rubico' ),
		'parent_item_colon'     => __( 'Parent Project', 'rubico' ),
		'all_items'             => __( 'All Projects', 'rubico' ),
		'add_new_item'          => __( 'Add Project', 'rubico' ),
		'add_new'               => __( 'Add Project', 'rubico' ),
		'new_item'              => __( 'New Project', 'rubico' ),
		'edit_item'             => __( 'Edit Project', 'rubico' ),
		'update_item'           => __( 'Update Project', 'rubico' ),
		'view_item'             => __( 'View Project', 'rubico' ),
		'view_items'            => __( 'View Project', 'rubico' ),
		'search_items'          => __( 'Search Project', 'rubico' ),
		'not_found'             => __( 'Not found', 'rubico' ),
		'not_found_in_trash'    => __( 'Not found in trash', 'rubico' ),
		'featured_image'        => __( 'Featured Image', 'rubico' ),
		'set_featured_image'    => __( 'Save Featured Image', 'rubico' ),
		'remove_featured_image' => __( 'Remove Featured Image', 'rubico' ),
		'use_featured_image'    => __( 'Use as Featured Image', 'rubico' ),
		'insert_into_item'      => __( 'Insert in Project', 'rubico' ),
		'uploaded_to_this_item' => __( 'Add in Project', 'rubico' ),
		'items_list'            => __( 'Projects List', 'rubico' ),
		'items_list_navigation' => __( 'Navigate to Projects', 'rubico' ),
		'filter_items_list'     => __( 'Filter Projects', 'rubico' ),
	);
	$args = array(
		'label'                 => __( 'Project', 'rubico' ),
		'description'           => __( 'Projects for rubico Website', 'rubico' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false, // False = posts - No child posts
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-welcome-learn-more',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
        'capability_type'       => 'page'
	);
	register_post_type( 'rubico_projects', $args );

}
add_action( 'init', 'rubico_project_post_type', 0 );



// Register post type for Developers
function rubico_developers() {

$labels = array(
	'name'                  => _x( 'Developers', 'Post Type General Name', 'rubico' ),
	'singular_name'         => _x( 'Developer', 'Post Type Singular Name', 'rubico' ),
	'menu_name'             => __( 'Developers', 'rubico' ),
	'name_admin_bar'        => __( 'Developer', 'rubico' ),
	'archives'              => __( 'Archive', 'rubico' ),
	'attributes'            => __( 'Attributes', 'rubico' ),
	'parent_item_colon'     => __( 'Parent Developer', 'rubico' ),
	'all_items'             => __( 'All Developers', 'rubico' ),
	'add_new_item'          => __( 'Add Developer', 'rubico' ),
	'add_new'               => __( 'Add Developer', 'rubico' ),
	'new_item'              => __( 'New Developer', 'rubico' ),
	'edit_item'             => __( 'Edit Developer', 'rubico' ),
	'update_item'           => __( 'Update Developer', 'rubico' ),
	'view_item'             => __( 'View Developer', 'rubico' ),
	'view_items'            => __( 'View Developers', 'rubico' ),
	'search_items'          => __( 'Search Developer', 'rubico' ),
	'not_found'             => __( 'Not Found', 'rubico' ),
	'not_found_in_trash'    => __( 'Not Found in Trash', 'rubico' ),
	'featured_image'        => __( 'Featured Image', 'rubico' ),
	'set_featured_image'    => __( 'Save Featured Image', 'rubico' ),
	'remove_featured_image' => __( 'Remove Featured Image', 'rubico' ),
	'use_featured_image'    => __( 'Use as Featured Image', 'rubico' ),
	'insert_into_item'      => __( 'Insert in Developer', 'rubico' ),
	'uploaded_to_this_item' => __( 'Add in Developer', 'rubico' ),
	'items_list'            => __( 'List Developers', 'rubico' ),
	'items_list_navigation' => __( 'Navigate to Developers', 'rubico' ),
	'filter_items_list'     => __( 'Filter Developers', 'rubico' ),
);
$args = array(
	'label'                 => __( 'Developers', 'rubico' ),
	'description'           => __( 'Developers for website', 'rubico' ),
	'labels'                => $labels,
	'supports'              => array( 'title', 'editor', 'thumbnail' ),
	'hierarchical'          => false,
	'public'                => true,
	'show_ui'               => true,
	'show_in_menu'          => true,
	'menu_position'         => 7,
	'menu_icon'             => 'dashicons-admin-users',
	'show_in_admin_bar'     => true,
	'show_in_nav_menus'     => true,
	'can_export'            => true,
	'has_archive'           => false,
	'exclude_from_search'   => false,
	'publicly_queryable'    => true,
	'capability_type'       => 'page',
);
register_post_type( 'developers', $args );

}
add_action( 'init', 'rubico_developers', 0 );