<?php

if ( ! function_exists( 'kvell_edge_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function kvell_edge_register_custom_font_widget( $widgets ) {
		$widgets[] = 'KvellEdgeCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'kvell_edge_register_widgets', 'kvell_edge_register_custom_font_widget' );
}