<?php

if ( ! function_exists( 'kvell_edge_get_hide_dep_for_header_standard_options' ) ) {
	function kvell_edge_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'kvell_edge_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'kvell_edge_header_standard_map' ) ) {
	function kvell_edge_header_standard_map( $parent ) {
		$hide_dep_options = kvell_edge_get_hide_dep_for_header_standard_options();
		
		kvell_edge_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'kvell' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'kvell' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'kvell' ),
					'left'   => esc_html__( 'Left', 'kvell' ),
					'center' => esc_html__( 'Center', 'kvell' )
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'kvell_edge_additional_header_menu_area_options_map', 'kvell_edge_header_standard_map' );
}