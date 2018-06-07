<?php

if ( ! function_exists( 'kvell_edge_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function kvell_edge_register_separator_widget( $widgets ) {
		$widgets[] = 'KvellEdgeSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'kvell_edge_register_widgets', 'kvell_edge_register_separator_widget' );
}