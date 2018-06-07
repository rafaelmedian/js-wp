<?php

if ( ! function_exists( 'kvell_edge_admin_map_init' ) ) {
	function kvell_edge_admin_map_init() {
		do_action( 'kvell_edge_before_options_map' );
		
		require_once EDGE_FRAMEWORK_ROOT_DIR . '/admin/options/fonts/map.php';
		require_once EDGE_FRAMEWORK_ROOT_DIR . '/admin/options/general/map.php';
		require_once EDGE_FRAMEWORK_ROOT_DIR . '/admin/options/page/map.php';
		require_once EDGE_FRAMEWORK_ROOT_DIR . '/admin/options/social/map.php';
		require_once EDGE_FRAMEWORK_ROOT_DIR . '/admin/options/reset/map.php';
		
		do_action( 'kvell_edge_options_map' );
		
		do_action( 'kvell_edge_after_options_map' );
	}
	
	add_action( 'after_setup_theme', 'kvell_edge_admin_map_init', 1 );
}