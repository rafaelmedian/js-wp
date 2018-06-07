<?php

if ( ! function_exists( 'kvell_edge_map_sidebar_meta' ) ) {
	function kvell_edge_map_sidebar_meta() {
		$edgtf_sidebar_meta_box = kvell_edge_add_meta_box(
			array(
				'scope' => apply_filters( 'kvell_edge_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'kvell' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'kvell' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'kvell' ),
				'parent'      => $edgtf_sidebar_meta_box,
                'options'       => kvell_edge_get_custom_sidebars_options( true )
			)
		);
		
		$edgtf_custom_sidebars = kvell_edge_get_custom_sidebars();
		if ( count( $edgtf_custom_sidebars ) > 0 ) {
			kvell_edge_add_meta_box_field(
				array(
					'name'        => 'edgtf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'kvell' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'kvell' ),
					'parent'      => $edgtf_sidebar_meta_box,
					'options'     => $edgtf_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'kvell_edge_meta_boxes_map', 'kvell_edge_map_sidebar_meta', 31 );
}