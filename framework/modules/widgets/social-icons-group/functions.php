<?php

if ( ! function_exists( 'kvell_edge_register_social_icons_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function kvell_edge_register_social_icons_widget( $widgets ) {
		$widgets[] = 'KvellEdgeClassIconsGroupWidget';
		
		return $widgets;
	}
	
	add_filter( 'kvell_edge_register_widgets', 'kvell_edge_register_social_icons_widget' );
}