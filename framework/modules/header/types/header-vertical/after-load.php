<?php

if ( ! function_exists( 'kvell_edge_disable_behaviors_for_header_vertical' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function kvell_edge_disable_behaviors_for_header_vertical( $allow_behavior ) {
		return false;
	}
	
	if ( kvell_edge_check_is_header_type_enabled( 'header-vertical', kvell_edge_get_page_id() ) ) {
		add_filter( 'kvell_edge_allow_sticky_header_behavior', 'kvell_edge_disable_behaviors_for_header_vertical' );
		add_filter( 'kvell_edge_allow_content_boxed_layout', 'kvell_edge_disable_behaviors_for_header_vertical' );
	}
}