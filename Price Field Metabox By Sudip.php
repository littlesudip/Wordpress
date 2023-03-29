<?php

/*
Plugin Name: Price Field By Sudip
Plugin URI: http://littlesudip.github.io
Description: This Plugin Will Create Price Field For Products Custom Post Type. 
Author: Sudip Ghose
Version: 1.0.0
Author URI: http://littlesudip.github.io
License: GPL2
*/

function products_price_metabox() {
	
	add_meta_box( "price-page-id", "Price Metabox", "products_price_function", "products", "normal", "high" );
	
	}
	
    add_action("add_meta_boxes", "products_price_metabox");