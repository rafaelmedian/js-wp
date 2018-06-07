<?php

if(!function_exists('kvell_edge_register_sticky_sidebar_widget')) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function kvell_edge_register_sticky_sidebar_widget($widgets) {
		$widgets[] = 'KvellEdgeStickySidebar';
		
		return $widgets;
	}
	
	add_filter('kvell_edge_register_widgets', 'kvell_edge_register_sticky_sidebar_widget');
}