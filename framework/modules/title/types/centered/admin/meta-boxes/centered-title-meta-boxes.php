<?php

if ( ! function_exists( 'kvell_edge_centered_title_type_options_meta_boxes' ) ) {
	function kvell_edge_centered_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_subtitle_side_padding_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Subtitle Side Padding', 'kvell' ),
				'description' => esc_html__( 'Set left/right padding for subtitle area', 'kvell' ),
				'parent'      => $show_title_area_meta_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px or %'
				)
			)
		);
	}
	
	add_action( 'kvell_edge_additional_title_area_meta_boxes', 'kvell_edge_centered_title_type_options_meta_boxes', 5 );
}