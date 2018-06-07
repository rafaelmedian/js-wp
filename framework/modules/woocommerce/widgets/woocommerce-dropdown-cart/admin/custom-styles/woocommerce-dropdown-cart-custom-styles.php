<?php

if ( ! function_exists( 'kvell_edge_dropdown_cart_icon_styles' ) ) {
	/**
	 * Generates styles for dropdown cart icon
	 */
	function kvell_edge_dropdown_cart_icon_styles() {
		$icon_color       = kvell_edge_options()->getOptionValue( 'dropdown_cart_icon_color' );
		$icon_hover_color = kvell_edge_options()->getOptionValue( 'dropdown_cart_hover_color' );
		
		if ( ! empty( $icon_color ) ) {
			echo kvell_edge_dynamic_css( '.edgtf-shopping-cart-holder .edgtf-header-cart a', array( 'color' => $icon_color ) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo kvell_edge_dynamic_css( '.edgtf-shopping-cart-holder .edgtf-header-cart a:hover', array( 'color' => $icon_hover_color ) );
		}
	}
	
	add_action( 'kvell_edge_style_dynamic', 'kvell_edge_dropdown_cart_icon_styles' );
}