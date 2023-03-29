<?php
/*
Plugin Name: Products PostType By Sudip
Plugin URI: http://littlesudip.github.io
Description: This Plugin Will Create A Products Custom Post Type. 
Author: Sudip Ghose
Version: 1.0.0
Author URI: http://littlesudip.github.io
License: GPL2
*/

function products() {

//labels array added inside the function and precedes args array

$labels = array(
'name' => _x( 'Products', 'post type general name' ),
'singular_name' => _x( 'Product', 'post type singular name' ),
'add_new' => _x( 'Add New', 'Product' ),
'add_new_item' => __( 'Add New Product' ),
'edit_item' => __( 'Edit Product' ),
'new_item' => __( 'New Product' ),
'all_items' => __( 'All Products' ),
'view_item' => __( 'View Product' ),
'search_items' => __( 'Search Products' ),
'not_found' => __( 'No Products found' ),
'not_found_in_trash' => __( 'No Products found in the Trash' ),
'parent_item_colon' => '',
'menu_name' => 'Products'
);

// args array

$args = array(
'labels' => $labels,
'description' => 'Displays Products and their details',
'public' => true,
'menu_position' => 4,
'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
'has_archive' => true,
);

register_post_type( 'products', $args );
}

add_action( 'init', 'Products' );