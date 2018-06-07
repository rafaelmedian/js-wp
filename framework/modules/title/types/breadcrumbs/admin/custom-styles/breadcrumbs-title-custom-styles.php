<?php

if ( ! function_exists( 'kvell_edge_breadcrumbs_title_area_typography_style' ) ) {
	function kvell_edge_breadcrumbs_title_area_typography_style() {
		
		$item_styles = kvell_edge_get_typography_styles( 'page_breadcrumb' );
		
		$item_selector = array(
			'.edgtf-title-holder .edgtf-title-wrapper .edgtf-breadcrumbs'
		);
		
		echo kvell_edge_dynamic_css( $item_selector, $item_styles );
		
		
		$breadcrumb_hover_color = kvell_edge_options()->getOptionValue( 'page_breadcrumb_hovercolor' );
		
		$breadcrumb_hover_styles = array();
		if ( ! empty( $breadcrumb_hover_color ) ) {
			$breadcrumb_hover_styles['color'] = $breadcrumb_hover_color;
		}
		
		$breadcrumb_hover_selector = array(
			'.edgtf-title-holder .edgtf-title-wrapper .edgtf-breadcrumbs a:hover'
		);
		
		echo kvell_edge_dynamic_css( $breadcrumb_hover_selector, $breadcrumb_hover_styles );
	}
	
	add_action( 'kvell_edge_style_dynamic', 'kvell_edge_breadcrumbs_title_area_typography_style' );
}