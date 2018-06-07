<?php

if ( ! function_exists( 'kvell_edge_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register dropdown cart widget
	 */
	function kvell_edge_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'KvellEdgeWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'kvell_edge_register_widgets', 'kvell_edge_register_woocommerce_dropdown_cart_widget' );
}

if ( ! function_exists( 'kvell_edge_get_dropdown_cart_icon_class' ) ) {
	/**
	 * Returns dropdow cart icon class
	 */
	function kvell_edge_get_dropdown_cart_icon_class() {
		$dropdown_cart_icon_source = kvell_edge_options()->getOptionValue( 'dropdown_cart_icon_source' );
		
		$dropdown_cart_icon_class_array = array(
			'edgtf-header-cart'
		);
		
		$dropdown_cart_icon_class_array[] = $dropdown_cart_icon_source == 'icon_pack' ? 'edgtf-header-cart-icon-pack' : 'edgtf-header-cart-svg-path';
		
		return $dropdown_cart_icon_class_array;
	}
}

if ( ! function_exists( 'kvell_edge_get_dropdown_cart_icon_html' ) ) {
	/**
	 * Returns dropdown cart icon HTML
	 */
	function kvell_edge_get_dropdown_cart_icon_html() {
		$dropdown_cart_icon_source   = kvell_edge_options()->getOptionValue( 'dropdown_cart_icon_source' );
		$dropdown_cart_icon_pack     = kvell_edge_options()->getOptionValue( 'dropdown_cart_icon_pack' );
		$dropdown_cart_icon_svg_path = kvell_edge_options()->getOptionValue( 'dropdown_cart_icon_svg_path' );
		
		$dropdown_cart_icon_html = '';
		
		if ( ( $dropdown_cart_icon_source == 'icon_pack' ) && ( isset( $dropdown_cart_icon_pack ) ) ) {
			$dropdown_cart_icon_html .= kvell_edge_icon_collections()->getDropdownCartIcon( $dropdown_cart_icon_pack );
		} else if ( isset( $dropdown_cart_icon_svg_path ) ) {
			$dropdown_cart_icon_html .= $dropdown_cart_icon_svg_path;
		}
		
		return $dropdown_cart_icon_html;
	}
}