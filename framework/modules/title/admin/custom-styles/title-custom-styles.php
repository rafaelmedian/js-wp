<?php

foreach ( glob( EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/custom-styles/*.php' ) as $options_load ) {
	include_once $options_load;
}

if ( ! function_exists( 'kvell_edge_title_area_typography_style' ) ) {
	function kvell_edge_title_area_typography_style() {
		
		// title default/small style
		
		$item_styles = kvell_edge_get_typography_styles( 'page_title' );
		
		$item_selector = array(
			'.edgtf-title-holder .edgtf-title-wrapper .edgtf-page-title'
		);
		
		echo kvell_edge_dynamic_css( $item_selector, $item_styles );
		
		// subtitle style
		
		$item_styles = kvell_edge_get_typography_styles( 'page_subtitle' );
		
		$item_selector = array(
			'.edgtf-title-holder .edgtf-title-wrapper .edgtf-page-subtitle'
		);
		
		echo kvell_edge_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'kvell_edge_style_dynamic', 'kvell_edge_title_area_typography_style' );
}