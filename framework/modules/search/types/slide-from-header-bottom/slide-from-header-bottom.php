<?php

if ( ! function_exists( 'kvell_edge_search_body_class' ) ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function kvell_edge_search_body_class( $classes ) {
		$classes[] = 'edgtf-slide-from-header-bottom';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'kvell_edge_search_body_class' );
}

if ( ! function_exists( 'kvell_edge_get_search' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function kvell_edge_get_search() {
		kvell_edge_load_search_template();
	}
	
	add_action( 'kvell_edge_before_page_header_html_close', 'kvell_edge_get_search' );
	add_action( 'kvell_edge_before_mobile_header_html_close', 'kvell_edge_get_search' );
}

if ( ! function_exists( 'kvell_edge_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function kvell_edge_load_search_template() {
		$parameters = array(
			'search_submit_icon_class' => kvell_edge_get_search_submit_icon_class()
		);

        kvell_edge_get_module_template_part( 'types/slide-from-header-bottom/templates/slide-from-header-bottom', 'search', '', $parameters );
	}
}