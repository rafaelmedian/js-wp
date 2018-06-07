<?php

if ( ! function_exists( 'kvell_edge_register_header_vertical_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function kvell_edge_register_header_vertical_type( $header_types ) {
		$header_type = array(
			'header-vertical' => 'Kvell\Modules\Header\Types\HeaderVertical'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'kvell_edge_init_register_header_vertical_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function kvell_edge_init_register_header_vertical_type() {
		add_filter( 'kvell_edge_register_header_type_class', 'kvell_edge_register_header_vertical_type' );
	}
	
	add_action( 'kvell_edge_before_header_function_init', 'kvell_edge_init_register_header_vertical_type' );
}

if ( ! function_exists( 'kvell_edge_include_header_vertical_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function kvell_edge_include_header_vertical_menu( $menus ) {
		$menus['vertical-navigation'] = esc_html__( 'Vertical Navigation', 'kvell' );
		
		return $menus;
	}
	
	if ( kvell_edge_check_is_header_type_enabled( 'header-vertical' ) ) {
		add_filter( 'kvell_edge_register_headers_menu', 'kvell_edge_include_header_vertical_menu' );
	}
}

if ( ! function_exists( 'kvell_edge_register_header_vertical_widget_areas' ) ) {
	/**
	 * Registers additional widget areas for this header type
	 */
	function kvell_edge_register_header_vertical_widget_areas() {
		register_sidebar(
			array(
				'id'            => 'edgtf-vertical-area',
				'name'          => esc_html__( 'Header Vertical Widget Area', 'kvell' ),
				'description'   => esc_html__( 'Widgets added here will appear on the bottom of header vertical menu', 'kvell' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-vertical-area-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="edgtf-widget-title">',
				'after_title'   => '</h5>'
			)
		);
	}
	
	if ( kvell_edge_check_is_header_type_enabled( 'header-vertical' ) ) {
		add_action( 'widgets_init', 'kvell_edge_register_header_vertical_widget_areas' );
	}
}

if ( ! function_exists( 'kvell_edge_get_header_vertical_widget_areas' ) ) {
	/**
	 * Loads header widgets area HTML
	 */
	function kvell_edge_get_header_vertical_widget_areas() {
		$page_id                            = kvell_edge_get_page_id();
		$custom_vertical_header_widget_area = get_post_meta( $page_id, 'edgtf_custom_vertical_area_sidebar_meta', true );
		
		if ( is_active_sidebar( 'edgtf-vertical-area' ) && empty( $custom_vertical_header_widget_area ) ) {
			dynamic_sidebar( 'edgtf-vertical-area' );
		} else if ( ! empty( $custom_vertical_header_widget_area ) && is_active_sidebar( $custom_vertical_header_widget_area ) ) {
			dynamic_sidebar( $custom_vertical_header_widget_area );
		}
	}
}

if ( ! function_exists( 'kvell_edge_get_header_vertical_main_menu' ) ) {
	/**
	 * Loads vertical menu HTML
	 */
	function kvell_edge_get_header_vertical_main_menu() {
		$opening_class = '';
		$menu_opening = kvell_edge_options()->getOptionValue('vertical_menu_dropdown_opening');

		if ($menu_opening !== '') {
			$opening_class .= 'edgtf-vertical-dropdown-'.$menu_opening;
		}

		$params = array(
			'opening_class' => $opening_class
		);

		kvell_edge_get_module_template_part( 'templates/vertical-navigation', 'header/types/header-vertical', '', $params );
	}
}

if ( ! function_exists( 'kvell_edge_vertical_header_holder_class' ) ) {
	/**
	 * Return holder class
	 */
	function kvell_edge_vertical_header_holder_class() {
		$center_content = kvell_edge_get_meta_field_intersect( 'vertical_header_center_content', kvell_edge_get_page_id() );
		$holder_class   = $center_content === 'yes' ? 'edgtf-vertical-alignment-center' : 'edgtf-vertical-alignment-top';
		
		return $holder_class;
	}
}

if ( ! function_exists( 'kvell_edge_header_vertical_per_page_custom_styles' ) ) {
	/**
	 * Return header per page styles
	 */
	function kvell_edge_header_vertical_per_page_custom_styles( $style, $class_prefix, $page_id ) {
		$header_area_style    = array();
		$header_area_selector = array( $class_prefix . '.edgtf-header-vertical .edgtf-vertical-area-background' );
		
		$vertical_header_background_color  = get_post_meta( $page_id, 'edgtf_vertical_header_background_color_meta', true );
		$disable_vertical_background_image = get_post_meta( $page_id, 'edgtf_disable_vertical_header_background_image_meta', true );
		$vertical_background_image         = get_post_meta( $page_id, 'edgtf_vertical_header_background_image_meta', true );
		$vertical_shadow                   = get_post_meta( $page_id, 'edgtf_vertical_header_shadow_meta', true );
		$vertical_border                   = get_post_meta( $page_id, 'edgtf_vertical_header_border_meta', true );
		
		if ( ! empty( $vertical_header_background_color ) ) {
			$header_area_style['background-color'] = $vertical_header_background_color;
		}
		
		if ( $disable_vertical_background_image == 'yes' ) {
			$header_area_style['background-image'] = 'none';
		} elseif ( $vertical_background_image !== '' ) {
			$header_area_style['background-image'] = 'url(' . $vertical_background_image . ')';
		}
		
		if ( $vertical_shadow == 'yes' ) {
			$header_area_style['box-shadow'] = '1px 0 3px rgba(0, 0, 0, 0.05)';
		}
		
		if ( $vertical_border == 'yes' ) {
			$header_border_color = get_post_meta( $page_id, 'edgtf_vertical_header_border_color_meta', true );
			
			if ( $header_border_color !== '' ) {
				$header_area_style['border-right'] = '1px solid ' . $header_border_color;
			}
		}
		
		$current_style = '';
		
		if ( ! empty( $header_area_style ) ) {
			$current_style .= kvell_edge_dynamic_css( $header_area_selector, $header_area_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'kvell_edge_add_header_page_custom_style', 'kvell_edge_header_vertical_per_page_custom_styles', 10, 3 );
}