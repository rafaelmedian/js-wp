<?php

if ( ! function_exists( 'kvell_edge_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function kvell_edge_register_button_widget( $widgets ) {
		$widgets[] = 'KvellEdgeButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'kvell_edge_register_widgets', 'kvell_edge_register_button_widget' );
}