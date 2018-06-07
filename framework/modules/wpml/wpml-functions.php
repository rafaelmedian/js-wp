<?php

if ( ! function_exists( 'kvell_edge_disable_wpml_css' ) ) {
	function kvell_edge_disable_wpml_css() {
		define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true );
	}
	
	add_action( 'after_setup_theme', 'kvell_edge_disable_wpml_css' );
}