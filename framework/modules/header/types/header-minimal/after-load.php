<?php

if ( ! function_exists( 'kvell_edge_header_minimal_full_screen_menu_body_class' ) ) {
	/**
	 * Function that adds body classes for different full screen menu types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function kvell_edge_header_minimal_full_screen_menu_body_class( $classes ) {
		$classes[] = 'edgtf-' . kvell_edge_options()->getOptionValue( 'fullscreen_menu_animation_style' );
		
		return $classes;
	}
	
	if ( kvell_edge_check_is_header_type_enabled( 'header-minimal', kvell_edge_get_page_id() ) ) {
		add_filter( 'body_class', 'kvell_edge_header_minimal_full_screen_menu_body_class' );
	}
}

if ( ! function_exists( 'kvell_edge_get_header_minimal_full_screen_menu' ) ) {
	/**
	 * Loads fullscreen menu HTML template
	 */
	function kvell_edge_get_header_minimal_full_screen_menu() {
		$parameters = array(
			'fullscreen_menu_in_grid' => kvell_edge_options()->getOptionValue( 'fullscreen_in_grid' ) === 'yes' ? true : false
		);
		
		kvell_edge_get_module_template_part( 'templates/full-screen-menu', 'header/types/header-minimal', '', $parameters );
	}
	
	if ( kvell_edge_check_is_header_type_enabled( 'header-minimal', kvell_edge_get_page_id() ) ) {
		add_action( 'kvell_edge_after_wrapper_inner', 'kvell_edge_get_header_minimal_full_screen_menu', 40 );
	}
}

if ( ! function_exists( 'kvell_edge_header_minimal_mobile_menu_module' ) ) {
    /**
     * Function that edits module for mobile menu
     *
     * @param $module - default module value
     *
     * @return string name of module
     */
    function kvell_edge_header_minimal_mobile_menu_module( $module ) {
        return 'header/types/header-minimal';
    }

    if ( kvell_edge_check_is_header_type_enabled( 'header-minimal', kvell_edge_get_page_id() ) ) {
        add_filter('kvell_edge_mobile_menu_module', 'kvell_edge_header_minimal_mobile_menu_module');
    }
}

if ( ! function_exists( 'kvell_edge_header_minimal_mobile_menu_slug' ) ) {
    /**
     * Function that edits slug for mobile menu
     *
     * @param $slug - default slug value
     *
     * @return string name of slug
     */
    function kvell_edge_header_minimal_mobile_menu_slug( $slug ) {
        return 'minimal';
    }

    if ( kvell_edge_check_is_header_type_enabled( 'header-minimal', kvell_edge_get_page_id() ) ) {
        add_filter('kvell_edge_mobile_menu_slug', 'kvell_edge_header_minimal_mobile_menu_slug');
    }
}

if ( ! function_exists( 'kvell_edge_header_minimal_mobile_menu_parameters' ) ) {
    /**
     * Function that edits parameters for mobile menu
     *
     * @param $parameters - default parameters array values
     *
     * @return array of default values and classes for minimal mobile header
     */
    function kvell_edge_header_minimal_mobile_menu_parameters( $parameters ) {

		$parameters['fullscreen_menu_icon_class'] = kvell_edge_get_fullscreen_menu_icon_class();

        return $parameters;
    }

    if ( kvell_edge_check_is_header_type_enabled( 'header-minimal', kvell_edge_get_page_id() ) ) {
        add_filter('kvell_edge_mobile_menu_parameters', 'kvell_edge_header_minimal_mobile_menu_parameters');
    }
}