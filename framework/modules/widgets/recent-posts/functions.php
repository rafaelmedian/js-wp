<?php

if ( ! function_exists( 'kvell_edge_register_recent_posts_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function kvell_edge_register_recent_posts_widget( $widgets ) {
		$widgets[] = 'KvellEdgeRecentPosts';
		
		return $widgets;
	}
	
	add_filter( 'kvell_edge_register_widgets', 'kvell_edge_register_recent_posts_widget' );
}