<?php

if ( ! function_exists( 'kvell_edge_set_title_centered_type_for_options' ) ) {
	/**
	 * This function set centered title type value for title options map and meta boxes
	 */
	function kvell_edge_set_title_centered_type_for_options( $type ) {
		$type['centered'] = esc_html__( 'Centered', 'kvell' );
		
		return $type;
	}
	
	add_filter( 'kvell_edge_title_type_global_option', 'kvell_edge_set_title_centered_type_for_options' );
	add_filter( 'kvell_edge_title_type_meta_boxes', 'kvell_edge_set_title_centered_type_for_options' );
}