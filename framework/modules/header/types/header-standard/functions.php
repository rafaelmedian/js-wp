<?php

if ( ! function_exists( 'kvell_edge_register_header_standard_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function kvell_edge_register_header_standard_type( $header_types ) {
		$header_type = array(
			'header-standard' => 'Kvell\Modules\Header\Types\HeaderStandard'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'kvell_edge_init_register_header_standard_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function kvell_edge_init_register_header_standard_type() {
		add_filter( 'kvell_edge_register_header_type_class', 'kvell_edge_register_header_standard_type' );
	}
	
	add_action( 'kvell_edge_before_header_function_init', 'kvell_edge_init_register_header_standard_type' );
}