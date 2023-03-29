<?php
/*
Plugin Name: Random Post By Sudip
Plugin URI: http://littlesudip.github.io
Description: This Plugin Will Display Random Post Also Filtered By Catagory. 
Author: Sudip Ghose
Version: 1.0.0
Author URI: http://littlesudip.github.io
License: GPL2
*/


function random_products_shortcode($atts) {
    // Parse shortcode attributes
    $atts = shortcode_atts(array(
        'category' => ''
    ), $atts);
    
    // Query arguments for products
    $args = array(
        'post_type' => 'products',
        'posts_per_page' => 5,
        'orderby' => 'rand'
    );
    
    // Add category filter to query arguments if provided
    if (!empty($atts['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $atts['category']
            )
        );
    }
    
    // Query products
    $products = new WP_Query($args);
    
    // Output products
    if ($products->have_posts()) {
        $output = '<ul>';
        while ($products->have_posts()) {
            $products->the_post();
            $output .= '<li>';
            $output .= '<a href="' . get_permalink() . '">' . get_the_title() . '</a><br />';
            $output .= get_the_post_thumbnail();
            $output .= '<br />' . get_post_meta(get_the_ID(), 'product_price', true);
            $output .= '</li>';
        }
        $output .= '</ul>';
    } else {
        $output = 'No products found';
    }
    
    // Reset post data
    wp_reset_postdata();
    
    // Return output
    return $output;
}
add_shortcode('random_products', 'random_products_shortcode');
