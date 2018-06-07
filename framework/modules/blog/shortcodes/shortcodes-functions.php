<?php

if ( ! function_exists( 'kvell_edge_include_blog_shortcodes' ) ) {
	function kvell_edge_include_blog_shortcodes() {
		include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/blog-list/blog-list.php';
		include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/blog-slider/blog-slider.php';
	}
	
	if ( kvell_edge_core_plugin_installed() ) {
		add_action( 'kvell_core_action_include_shortcodes_file', 'kvell_edge_include_blog_shortcodes' );
	}
}

if ( ! function_exists( 'kvell_edge_add_blog_shortcodes' ) ) {
	function kvell_edge_add_blog_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'KvellCore\CPT\Shortcodes\BlogList\BlogList',
			'KvellCore\CPT\Shortcodes\BlogSlider\BlogSlider'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( kvell_edge_core_plugin_installed() ) {
		add_filter( 'kvell_core_filter_add_vc_shortcode', 'kvell_edge_add_blog_shortcodes' );
	}
}

if ( ! function_exists( 'kvell_edge_set_blog_list_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for blog shortcodes to set our icon for Visual Composer shortcodes panel
	 */
	function kvell_edge_set_blog_list_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-blog-list';
		$shortcodes_icon_class_array[] = '.icon-wpb-blog-slider';
		
		return $shortcodes_icon_class_array;
	}
	
	if ( kvell_edge_core_plugin_installed() ) {
		add_filter( 'kvell_core_filter_add_vc_shortcodes_custom_icon_class', 'kvell_edge_set_blog_list_icon_class_name_for_vc_shortcodes' );
	}
}