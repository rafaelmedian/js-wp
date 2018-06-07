<?php

if ( ! function_exists( 'kvell_edge_set_header_standard_type_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function kvell_edge_set_header_standard_type_global_option( $header_types ) {
		$header_types['header-standard'] = array(
			'image' => EDGE_FRAMEWORK_HEADER_TYPES_ROOT . '/header-standard/assets/img/header-standard.png',
			'label' => esc_html__( 'Standard', 'kvell' )
		);
		
		return $header_types;
	}
	
	add_filter( 'kvell_edge_header_type_global_option', 'kvell_edge_set_header_standard_type_global_option' );
}

if ( ! function_exists( 'kvell_edge_set_header_standard_type_as_global_option' ) ) {
	/**
	 * This function set default header type value for global header option map
	 */
	function kvell_edge_set_header_standard_type_as_global_option( $header_type ) {
		$header_type = 'header-standard';
		
		return $header_type;
	}
	
	add_filter( 'kvell_edge_default_header_type_global_option', 'kvell_edge_set_header_standard_type_as_global_option' );
}

if ( ! function_exists( 'kvell_edge_set_header_standard_type_meta_boxes_option' ) ) {
	/**
	 * This function set header type value for header meta boxes map
	 */
	function kvell_edge_set_header_standard_type_meta_boxes_option( $header_type_options ) {
		$header_type_options['header-standard'] = esc_html__( 'Standard', 'kvell' );
		
		return $header_type_options;
	}
	
	add_filter( 'kvell_edge_header_type_meta_boxes', 'kvell_edge_set_header_standard_type_meta_boxes_option' );
}

if ( ! function_exists( 'kvell_edge_set_hide_dep_options_header_standard' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this header type is selected
	 */
	function kvell_edge_set_hide_dep_options_header_standard( $hide_dep_options ) {
		$hide_dep_options[] = 'header-standard';
		
		return $hide_dep_options;
	}
	
	// header global panel options
	add_filter( 'kvell_edge_header_logo_area_hide_global_option', 'kvell_edge_set_hide_dep_options_header_standard' );
	
	// header global panel meta boxes
	add_filter( 'kvell_edge_header_logo_area_hide_meta_boxes', 'kvell_edge_set_hide_dep_options_header_standard' );
	
	// header types panel options
	add_filter( 'kvell_edge_header_centered_hide_global_option', 'kvell_edge_set_hide_dep_options_header_standard' );
	add_filter( 'kvell_edge_full_screen_menu_hide_global_option', 'kvell_edge_set_hide_dep_options_header_standard' );
	add_filter( 'kvell_edge_header_vertical_hide_global_option', 'kvell_edge_set_hide_dep_options_header_standard' );
	add_filter( 'kvell_edge_header_vertical_menu_hide_global_option', 'kvell_edge_set_hide_dep_options_header_standard' );
	add_filter( 'kvell_edge_header_vertical_closed_hide_global_option', 'kvell_edge_set_hide_dep_options_header_standard' );
	add_filter( 'kvell_edge_header_vertical_sliding_hide_global_option', 'kvell_edge_set_hide_dep_options_header_standard' );
	
	// header types panel meta boxes
	add_filter( 'kvell_edge_header_centered_hide_meta_boxes', 'kvell_edge_set_hide_dep_options_header_standard' );
	add_filter( 'kvell_edge_header_vertical_hide_meta_boxes', 'kvell_edge_set_hide_dep_options_header_standard' );
}