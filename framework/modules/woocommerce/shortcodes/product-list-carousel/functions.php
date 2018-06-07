<?php

if ( ! function_exists( 'kvell_edge_add_product_list_carousel_shortcode' ) ) {
	function kvell_edge_add_product_list_carousel_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'KvellCore\CPT\Shortcodes\ProductListCarousel\ProductListCarousel',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( kvell_edge_core_plugin_installed() ) {
		add_filter( 'kvell_core_filter_add_vc_shortcode', 'kvell_edge_add_product_list_carousel_shortcode' );
	}
}

if ( ! function_exists( 'kvell_edge_add_product_list_carousel_into_shortcodes_list' ) ) {
	function kvell_edge_add_product_list_carousel_into_shortcodes_list( $woocommerce_shortcodes ) {
		$woocommerce_shortcodes[] = 'edgtf_product_list_carousel';
		
		return $woocommerce_shortcodes;
	}
	
	add_filter( 'kvell_edge_woocommerce_shortcodes_list', 'kvell_edge_add_product_list_carousel_into_shortcodes_list' );
}