<?php

if ( ! function_exists( 'kvell_edge_register_widgets' ) ) {
	function kvell_edge_register_widgets() {
		$widgets = apply_filters( 'kvell_edge_register_widgets', $widgets = array() );
		
		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}
	
	add_action( 'widgets_init', 'kvell_edge_register_widgets' );
}