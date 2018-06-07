<?php

if ( ! function_exists( 'kvell_edge_register_author_info_widget' ) ) {
	/**
	 * Function that register author info widget
	 */
	function kvell_edge_register_author_info_widget( $widgets ) {
		$widgets[] = 'KvellEdgeAuthorInfoWidget';
		
		return $widgets;
	}
	
	add_filter( 'kvell_edge_register_widgets', 'kvell_edge_register_author_info_widget' );
}