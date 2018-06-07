<?php

if ( ! function_exists( 'kvell_edge_register_sidebars' ) ) {
	/**
	 * Function that registers theme's sidebars
	 */
	function kvell_edge_register_sidebars() {
		
		register_sidebar(
			array(
				'id'            => 'sidebar',
				'name'          => esc_html__( 'Sidebar', 'kvell' ),
				'description'   => esc_html__( 'Default Sidebar area. In order to display this area you need to enable it through global theme options or on page meta box options.', 'kvell' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="edgtf-widget-title-holder"><h4 class="edgtf-widget-title">',
				'after_title'   => '</h4></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'kvell_edge_register_sidebars', 1 );
}

if ( ! function_exists( 'kvell_edge_add_support_custom_sidebar' ) ) {
	/**
	 * Function that adds theme support for custom sidebars. It also creates KvellEdgeSidebar object
	 */
	function kvell_edge_add_support_custom_sidebar() {
		add_theme_support( 'KvellEdgeSidebar' );
		
		if ( get_theme_support( 'KvellEdgeSidebar' ) ) {
			new KvellEdgeSidebar();
		}
	}
	
	add_action( 'after_setup_theme', 'kvell_edge_add_support_custom_sidebar' );
}