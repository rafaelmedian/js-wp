<?php

if ( ! function_exists( 'kvell_edge_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function kvell_edge_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'KvellEdgeImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'kvell_edge_register_widgets', 'kvell_edge_register_image_gallery_widget' );
}