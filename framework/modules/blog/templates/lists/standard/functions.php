<?php

if ( ! function_exists( 'kvell_edge_register_blog_standard_template_file' ) ) {
	/**
	 * Function that register blog standard template
	 */
	function kvell_edge_register_blog_standard_template_file( $templates ) {
		$templates['blog-standard'] = esc_html__( 'Blog: Standard', 'kvell' );
		
		return $templates;
	}
	
	add_filter( 'kvell_edge_register_blog_templates', 'kvell_edge_register_blog_standard_template_file' );
}

if ( ! function_exists( 'kvell_edge_set_blog_standard_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function kvell_edge_set_blog_standard_type_global_option( $options ) {
		$options['standard'] = esc_html__( 'Blog: Standard', 'kvell' );
		
		return $options;
	}
	
	add_filter( 'kvell_edge_blog_list_type_global_option', 'kvell_edge_set_blog_standard_type_global_option' );
}