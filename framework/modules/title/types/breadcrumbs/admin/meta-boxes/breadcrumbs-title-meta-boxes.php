<?php

if ( ! function_exists( 'kvell_edge_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function kvell_edge_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'kvell' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'kvell' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'kvell_edge_additional_title_area_meta_boxes', 'kvell_edge_breadcrumbs_title_type_options_meta_boxes' );
}