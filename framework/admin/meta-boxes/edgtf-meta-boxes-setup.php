<?php

if ( ! function_exists( 'kvell_edge_meta_boxes_map_after_setup_theme' ) ) {
	function kvell_edge_meta_boxes_map_after_setup_theme() {
		/**
		 * Loades all meta-boxes by going through all folders that are placed directly in meta-boxes folder
		 * and loads map.php file in each.
		 *
		 * @see http://php.net/manual/en/function.glob.php
		 */
		do_action( 'kvell_edge_before_meta_boxes_map' );
		
		foreach ( glob( EDGE_FRAMEWORK_ROOT_DIR . '/admin/meta-boxes/*/map.php' ) as $meta_box_load ) {
			include_once $meta_box_load;
		}
		
		do_action( 'kvell_edge_meta_boxes_map' );
		
		do_action( 'kvell_edge_after_meta_boxes_map' );
	}
	
	add_action( 'after_setup_theme', 'kvell_edge_meta_boxes_map_after_setup_theme', 1 );
}

if ( ! function_exists( 'kvell_edge_meta_boxes_map_init' ) ) {
    function kvell_edge_meta_boxes_map_init() {

        do_action( 'kvell_edge_meta_boxes_map_on_init_action' );

    }

    add_action( 'init', 'kvell_edge_meta_boxes_map_init', 1 );
}