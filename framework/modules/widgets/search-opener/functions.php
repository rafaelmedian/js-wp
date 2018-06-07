<?php

if ( ! function_exists( 'kvell_edge_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function kvell_edge_register_search_opener_widget( $widgets ) {
		$widgets[] = 'KvellEdgeSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'kvell_edge_register_widgets', 'kvell_edge_register_search_opener_widget' );
}