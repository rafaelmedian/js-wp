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
		$classes[] = 'edgtf-search-slides-from-window-top';
		
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
	
	add_action( 'kvell_edge_before_page_header', 'kvell_edge_get_search' );
}

if ( ! function_exists( 'kvell_edge_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function kvell_edge_load_search_template() {
		$search_in_grid    = kvell_edge_options()->getOptionValue( 'search_in_grid' ) == 'yes' ? true : false;
		
		$parameters = array(
			'search_in_grid'    		=> $search_in_grid,
			'search_submit_icon_class' 	=> kvell_edge_get_search_submit_icon_class(),
			'search_close_icon_class' 	=> kvell_edge_get_search_close_icon_class()
		);

        kvell_edge_get_module_template_part( 'types/slide-from-window-top/templates/slide-from-window-top', 'search', '', $parameters );
	}
}