<?php

if ( ! function_exists( 'kvell_edge_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function kvell_edge_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'kvell_edge_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'kvell_edge_header_standard_meta_map' ) ) {
	function kvell_edge_header_standard_meta_map( $parent ) {
		$hide_dep_options = kvell_edge_get_hide_dep_for_header_standard_meta_boxes();
		
		kvell_edge_add_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'edgtf_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'kvell' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'kvell' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'kvell' ),
					'left'   => esc_html__( 'Left', 'kvell' ),
					'right'  => esc_html__( 'Right', 'kvell' ),
					'center' => esc_html__( 'Center', 'kvell' )
				),
				'dependency' => array(
					'hide' => array(
						'edgtf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'kvell_edge_additional_header_area_meta_boxes_map', 'kvell_edge_header_standard_meta_map' );
}