<?php

if ( ! function_exists( 'kvell_edge_sidebar_options_map' ) ) {
	function kvell_edge_sidebar_options_map() {
		
		kvell_edge_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'kvell' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = kvell_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'kvell' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		kvell_edge_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'kvell' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'kvell' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => kvell_edge_get_custom_sidebars_options()
		) );
		
		$kvell_custom_sidebars = kvell_edge_get_custom_sidebars();
		if ( count( $kvell_custom_sidebars ) > 0 ) {
			kvell_edge_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'kvell' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'kvell' ),
				'parent'      => $sidebar_panel,
				'options'     => $kvell_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'kvell_edge_options_map', 'kvell_edge_sidebar_options_map', 9 );
}