<?php

if ( kvell_edge_contact_form_7_installed() ) {
	include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'kvell_edge_register_widgets', 'kvell_edge_register_cf7_widget' );
}

if ( ! function_exists( 'kvell_edge_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function kvell_edge_register_cf7_widget( $widgets ) {
		$widgets[] = 'KvellEdgeContactForm7Widget';
		
		return $widgets;
	}
}