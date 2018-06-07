<?php

if ( ! function_exists( 'kvell_edge_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function kvell_edge_register_icon_widget( $widgets ) {
		$widgets[] = 'KvellEdgeIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'kvell_edge_register_widgets', 'kvell_edge_register_icon_widget' );
}