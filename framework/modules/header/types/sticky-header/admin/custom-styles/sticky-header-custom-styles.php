<?php

if ( ! function_exists( 'kvell_edge_sticky_header_styles' ) ) {
	/**
	 * Generates styles for sticky haeder
	 */
	function kvell_edge_sticky_header_styles() {
		$background_color        = kvell_edge_options()->getOptionValue( 'sticky_header_background_color' );
		$background_transparency = kvell_edge_options()->getOptionValue( 'sticky_header_transparency' );
		$border_color            = kvell_edge_options()->getOptionValue( 'sticky_header_border_color' );
		$header_height           = kvell_edge_options()->getOptionValue( 'sticky_header_height' );
		
		if ( ! empty( $background_color ) ) {
			$header_background_color              = $background_color;
			$header_background_color_transparency = 1;
			
			if ( $background_transparency !== '' ) {
				$header_background_color_transparency = $background_transparency;
			}
			
			echo kvell_edge_dynamic_css( '.edgtf-page-header .edgtf-sticky-header .edgtf-sticky-holder', array( 'background-color' => kvell_edge_rgba_color( $header_background_color, $header_background_color_transparency ) ) );
		}
		
		if ( ! empty( $border_color ) ) {
			echo kvell_edge_dynamic_css( '.edgtf-page-header .edgtf-sticky-header .edgtf-sticky-holder', array( 'border-color' => $border_color ) );
		}
		
		if ( ! empty( $header_height ) ) {
			$height = kvell_edge_filter_px( $header_height ) . 'px';
			
			echo kvell_edge_dynamic_css( '.edgtf-page-header .edgtf-sticky-header', array( 'height' => $height ) );
			echo kvell_edge_dynamic_css( '.edgtf-page-header .edgtf-sticky-header .edgtf-logo-wrapper a', array( 'max-height' => $height ) );
		}
		
		$sticky_container_selector = '.edgtf-sticky-header .edgtf-sticky-holder .edgtf-vertical-align-containers';
		$sticky_container_styles   = array();
		$container_side_padding    = kvell_edge_options()->getOptionValue( 'sticky_header_side_padding' );
		
		if ( $container_side_padding !== '' ) {
			if ( kvell_edge_string_ends_with( $container_side_padding, 'px' ) || kvell_edge_string_ends_with( $container_side_padding, '%' ) ) {
				$sticky_container_styles['padding-left']  = $container_side_padding;
				$sticky_container_styles['padding-right'] = $container_side_padding;
			} else {
				$sticky_container_styles['padding-left']  = kvell_edge_filter_px( $container_side_padding ) . 'px';
				$sticky_container_styles['padding-right'] = kvell_edge_filter_px( $container_side_padding ) . 'px';
			}
			
			echo kvell_edge_dynamic_css( $sticky_container_selector, $sticky_container_styles );
		}
		
		// sticky menu style
		
		$menu_item_styles = kvell_edge_get_typography_styles( 'sticky' );
		
		$menu_item_selector = array(
			'.edgtf-main-menu.edgtf-sticky-nav > ul > li > a'
		);
		
		echo kvell_edge_dynamic_css( $menu_item_selector, $menu_item_styles );
		
		
		$hover_color = kvell_edge_options()->getOptionValue( 'sticky_hovercolor' );
		
		$menu_item_hover_styles = array();
		if ( ! empty( $hover_color ) ) {
			$menu_item_hover_styles['color'] = $hover_color;
		}
		
		$menu_item_hover_selector = array(
			'.edgtf-main-menu.edgtf-sticky-nav > ul > li:hover > a',
			'.edgtf-main-menu.edgtf-sticky-nav > ul > li.edgtf-active-item > a'
		);
		
		echo kvell_edge_dynamic_css( $menu_item_hover_selector, $menu_item_hover_styles );
	}
	
	add_action( 'kvell_edge_style_dynamic', 'kvell_edge_sticky_header_styles' );
}