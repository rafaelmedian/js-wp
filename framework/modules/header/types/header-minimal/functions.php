<?php

if ( ! function_exists( 'kvell_edge_register_header_minimal_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function kvell_edge_register_header_minimal_type( $header_types ) {
		$header_type = array(
			'header-minimal' => 'Kvell\Modules\Header\Types\HeaderMinimal'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'kvell_edge_init_register_header_minimal_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function kvell_edge_init_register_header_minimal_type() {
		add_filter( 'kvell_edge_register_header_type_class', 'kvell_edge_register_header_minimal_type' );
	}
	
	add_action( 'kvell_edge_before_header_function_init', 'kvell_edge_init_register_header_minimal_type' );
}

if ( ! function_exists( 'kvell_edge_include_header_minimal_full_screen_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function kvell_edge_include_header_minimal_full_screen_menu( $menus ) {
		$menus['popup-navigation'] = esc_html__( 'Full Screen Navigation', 'kvell' );
		
		return $menus;
	}
	
	if ( kvell_edge_check_is_header_type_enabled( 'header-minimal' ) ) {
		add_filter( 'kvell_edge_register_headers_menu', 'kvell_edge_include_header_minimal_full_screen_menu' );
	}
}

if ( ! function_exists( 'kvell_edge_get_fullscreen_menu_icon_class' ) ) {
	/**
	 * Loads full screen menu icon class
	 */
	function kvell_edge_get_fullscreen_menu_icon_class() {

		$fullscreen_menu_icon_source = kvell_edge_options()->getOptionValue( 'fullscreen_menu_icon_source' );

		$fullscreen_menu_icon_class_array = array(
			'edgtf-fullscreen-menu-opener'
		);

		$fullscreen_menu_icon_class_array[] = $fullscreen_menu_icon_source == 'icon_pack' ? 'edgtf-fullscreen-menu-opener-icon-pack' : 'edgtf-fullscreen-menu-opener-svg-path';

		return $fullscreen_menu_icon_class_array;
	}
}

if ( ! function_exists( 'kvell_edge_get_fullscreen_menu_icon_html' ) ) {
	/**
	 * Loads fullscreen menu icon HTML
	 */
	function kvell_edge_get_fullscreen_menu_icon_html() {

		$fullscreen_menu_icon_source	= kvell_edge_options()->getOptionValue( 'fullscreen_menu_icon_source' );
		$fullscreen_menu_icon_pack		= kvell_edge_options()->getOptionValue( 'fullscreen_menu_icon_pack' );
		$fullscreen_menu_icon_svg_path 	= kvell_edge_options()->getOptionValue( 'fullscreen_menu_icon_svg_path' );

		$fullscreen_menu_icon_html = '';

		if ( ( $fullscreen_menu_icon_source == 'icon_pack' ) && ( isset( $fullscreen_menu_icon_pack ) ) ) {
			$fullscreen_menu_icon_html .= kvell_edge_icon_collections()->getMenuIcon($fullscreen_menu_icon_pack);
		} else if ( isset( $fullscreen_menu_icon_svg_path ) ) {
			$fullscreen_menu_icon_html .= $fullscreen_menu_icon_svg_path; 
		}

		return $fullscreen_menu_icon_html;
	}
}

if ( ! function_exists( 'kvell_edge_get_fullscreen_menu_close_icon_html' ) ) {
	/**
	 * Loads fullscreen menu close icon HTML
	 */
	function kvell_edge_get_fullscreen_menu_close_icon_html() {

		$fullscreen_menu_icon_source			= kvell_edge_options()->getOptionValue( 'fullscreen_menu_icon_source' );
		$fullscreen_menu_icon_pack				= 'font_awesome';
		$fullscreen_menu_close_icon_svg_path 	= kvell_edge_options()->getOptionValue( 'fullscreen_menu_close_icon_svg_path' );

		$fullscreen_menu_close_icon_html = '';

		if ( ( $fullscreen_menu_icon_source == 'icon_pack' ) && ( isset( $fullscreen_menu_icon_pack ) ) ) {
			$fullscreen_menu_close_icon_html .= kvell_edge_icon_collections()->getMenuCloseIcon($fullscreen_menu_icon_pack);
		} else if ( isset( $fullscreen_menu_close_icon_svg_path ) ) {
			$fullscreen_menu_close_icon_html .= $fullscreen_menu_close_icon_svg_path; 
		}

		return $fullscreen_menu_close_icon_html;
	}
}

if ( ! function_exists( 'kvell_edge_register_header_minimal_full_screen_menu_widgets' ) ) {
	/**
	 * Registers additional widget areas for this header type
	 */
	function kvell_edge_register_header_minimal_full_screen_menu_widgets() {
		register_sidebar(
			array(
				'id'            => 'fullscreen_menu_above',
				'name'          => esc_html__( 'Fullscreen Menu Top', 'kvell' ),
				'description'   => esc_html__( 'This widget area is rendered above full screen menu', 'kvell' ),
				'before_widget' => '<div class="%2$s edgtf-fullscreen-menu-above-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="edgtf-widget-title">',
				'after_title'   => '</h5>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'fullscreen_menu_below',
				'name'          => esc_html__( 'Fullscreen Menu Bottom', 'kvell' ),
				'description'   => esc_html__( 'This widget area is rendered below full screen menu', 'kvell' ),
				'before_widget' => '<div class="%2$s edgtf-fullscreen-menu-below-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="edgtf-widget-title">',
				'after_title'   => '</h5>'
			)
		);
	}
	
	if ( kvell_edge_check_is_header_type_enabled( 'header-minimal' ) ) {
		add_action( 'widgets_init', 'kvell_edge_register_header_minimal_full_screen_menu_widgets' );
	}
}