<?php

if ( ! function_exists( 'kvell_edge_sidebar_layout' ) ) {
	/**
	 * Function that check is sidebar is enabled and return type of sidebar layout
	 */
	function kvell_edge_sidebar_layout() {
		$sidebar_layout         = '';
		$sidebar_layout_meta    = kvell_edge_get_meta_field_intersect( 'sidebar_layout' );
		$archive_sidebar_layout = kvell_edge_options()->getOptionValue( 'archive_sidebar_layout' );
		$search_sidebar_layout  = kvell_edge_options()->getOptionValue( 'search_page_sidebar_layout' );
		$single_sidebar_layout  = kvell_edge_get_meta_field_intersect( 'blog_single_sidebar_layout' );
		
		if ( ! empty( $sidebar_layout_meta ) ) {
			$sidebar_layout = $sidebar_layout_meta;
		}
		
		if ( is_singular( 'post' ) && ! empty( $single_sidebar_layout ) ) {
			$sidebar_layout = $single_sidebar_layout;
		}
		
		if ( is_search() && ! kvell_edge_is_woocommerce_shop() && ! empty( $search_sidebar_layout ) ) {
			$sidebar_layout = $search_sidebar_layout;
		}
		
		if ( ( is_archive() || ( is_home() && is_front_page() ) ) && ! kvell_edge_is_woocommerce_page() && ! empty( $archive_sidebar_layout ) ) {
			$sidebar_layout = $archive_sidebar_layout;
		}
		
		return apply_filters( 'kvell_edge_sidebar_layout', $sidebar_layout );
	}
}

if ( ! function_exists( 'kvell_edge_get_content_sidebar_class' ) ) {
	/**
	 * Return classes for content holder when sidebar is active
	 *
	 * @return string
	 */
	function kvell_edge_get_content_sidebar_class() {
		$sidebar_layout = kvell_edge_sidebar_layout();
		$content_class  = array( 'edgtf-page-content-holder' );
		
		switch ( $sidebar_layout ) {
			case 'sidebar-33-right':
				$content_class[] = 'edgtf-grid-col-8';
				break;
			case 'sidebar-25-right':
				$content_class[] = 'edgtf-grid-col-9';
				break;
            case 'sidebar-20-right':
                $content_class[] = 'edgtf-grid-col-10';
                break;
			case 'sidebar-33-left':
				$content_class[] = 'edgtf-grid-col-8';
				$content_class[] = 'edgtf-grid-col-push-4';
				break;
			case 'sidebar-25-left':
				$content_class[] = 'edgtf-grid-col-9';
				$content_class[] = 'edgtf-grid-col-push-3';
				break;
            case 'sidebar-20-left':
                $content_class[] = 'edgtf-grid-col-10';
                $content_class[] = 'edgtf-grid-col-push-2';
                break;
			default:
				$content_class[] = 'edgtf-grid-col-12';
				break;
		}
		
		return kvell_edge_get_class_attribute( $content_class );
	}
}

if ( ! function_exists( 'kvell_edge_get_sidebar_holder_class' ) ) {
	/**
	 * Return classes for sidebar holder when sidebar is active
	 *
	 * @return string
	 */
	function kvell_edge_get_sidebar_holder_class() {
		$sidebar_layout = kvell_edge_sidebar_layout();
		$sidebar_class  = array( 'edgtf-sidebar-holder' );
		
		switch ( $sidebar_layout ) {
			case 'sidebar-33-right':
				$sidebar_class[] = 'edgtf-grid-col-4';
				break;
			case 'sidebar-25-right':
				$sidebar_class[] = 'edgtf-grid-col-3';
				break;
            case 'sidebar-20-right':
                $sidebar_class[] = 'edgtf-grid-col-2';
                break;
			case 'sidebar-33-left':
				$sidebar_class[] = 'edgtf-grid-col-4';
				$sidebar_class[] = 'edgtf-grid-col-pull-8';
				break;
			case 'sidebar-25-left':
				$sidebar_class[] = 'edgtf-grid-col-3';
				$sidebar_class[] = 'edgtf-grid-col-pull-9';
				break;
            case 'sidebar-20-left':
                $sidebar_class[] = 'edgtf-grid-col-2';
                $sidebar_class[] = 'edgtf-grid-col-pull-10';
		}
		
		return kvell_edge_get_class_attribute( $sidebar_class );
	}
}

if ( ! function_exists( 'kvell_edge_get_sidebar' ) ) {
	/**
	 * Return Sidebar name
	 *
	 * @return string
	 */
	function kvell_edge_get_sidebar() {
		$sidebar_name                = 'sidebar';
		$custom_sidebar_area         = kvell_edge_get_meta_field_intersect( 'custom_sidebar_area' );
		$custom_archive_sidebar_area = kvell_edge_options()->getOptionValue( 'archive_custom_sidebar_area' );
		$custom_search_sidebar_area  = kvell_edge_options()->getOptionValue( 'search_custom_sidebar_area' );
		$custom_single_sidebar_area  = kvell_edge_get_meta_field_intersect( 'blog_single_custom_sidebar_area' );
		
		if ( ! empty( $custom_sidebar_area ) ) {
			$sidebar_name = $custom_sidebar_area;
		}
		
		if ( is_singular( 'post' ) && ! empty( $custom_single_sidebar_area ) ) {
			$sidebar_name = $custom_single_sidebar_area;
		}
		
		if ( is_search() && ! empty( $custom_search_sidebar_area ) ) {
			$sidebar_name = $custom_search_sidebar_area;
		}
		
		if ( ( is_archive() || ( is_home() && is_front_page() ) ) && ! kvell_edge_is_woocommerce_page() && ! empty( $custom_archive_sidebar_area ) ) {
			$sidebar_name = $custom_archive_sidebar_area;
		}
		
		return apply_filters( 'kvell_edge_sidebar_name', $sidebar_name );
	}
}

if ( ! function_exists( 'kvell_edge_get_custom_sidebars' ) ) {
	/**
	 * Function that returns all custom made sidebars.
	 *
	 * @uses get_option()
	 * @return array array of custom made sidebars where key and value are sidebar name
	 */
	function kvell_edge_get_custom_sidebars() {
		$kvell_custom_sidebars = get_option( 'edgtf_sidebars' );
		$formatted_array             = array();
		
		if ( is_array( $kvell_custom_sidebars ) && count( $kvell_custom_sidebars ) ) {
			foreach ( $kvell_custom_sidebars as $custom_sidebar ) {
				$formatted_array[ sanitize_title( $custom_sidebar ) ] = $custom_sidebar;
			}
		}
		
		return $formatted_array;
	}
}

if ( ! function_exists( 'kvell_edge_get_custom_sidebars_options' ) ) {
	function kvell_edge_get_custom_sidebars_options( $enable_default = false ) {
		$sidebar_options = array();
		
		if ( $enable_default ) {
			$sidebar_options[''] = esc_html__( 'Default', 'kvell' );
		}
		
		$sidebar_options['no-sidebar']       = esc_html__( 'No Sidebar', 'kvell' );
		$sidebar_options['sidebar-33-right'] = esc_html__( 'Sidebar 1/3 Right', 'kvell' );
		$sidebar_options['sidebar-25-right'] = esc_html__( 'Sidebar 1/4 Right', 'kvell' );
		$sidebar_options['sidebar-20-right'] = esc_html__( 'Sidebar 1/5 Right', 'kvell' );
		$sidebar_options['sidebar-33-left']  = esc_html__( 'Sidebar 1/3 Left', 'kvell' );
		$sidebar_options['sidebar-25-left']  = esc_html__( 'Sidebar 1/4 Left', 'kvell' );
		$sidebar_options['sidebar-20-left']  = esc_html__( 'Sidebar 1/5 Left', 'kvell' );
		
		return $sidebar_options;
	}
}