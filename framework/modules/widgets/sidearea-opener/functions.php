<?php

if ( ! function_exists( 'kvell_edge_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function kvell_edge_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'KvellEdgeSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'kvell_edge_register_widgets', 'kvell_edge_register_sidearea_opener_widget' );
}