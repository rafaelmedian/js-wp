<?php

if ( ! function_exists( 'kvell_edge_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function kvell_edge_register_blog_list_widget( $widgets ) {
		$widgets[] = 'KvellEdgeBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'kvell_edge_register_widgets', 'kvell_edge_register_blog_list_widget' );
}