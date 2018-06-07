<?php

if ( ! function_exists( 'kvell_edge_header_types_meta_boxes' ) ) {
	function kvell_edge_header_types_meta_boxes() {
		$header_type_options = apply_filters( 'kvell_edge_header_type_meta_boxes', $header_type_options = array( '' => esc_html__( 'Default', 'kvell' ) ) );
		
		return $header_type_options;
	}
}

if ( ! function_exists( 'kvell_edge_get_hide_dep_for_header_behavior_meta_boxes' ) ) {
	function kvell_edge_get_hide_dep_for_header_behavior_meta_boxes() {
		$hide_dep_options = apply_filters( 'kvell_edge_header_behavior_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

foreach ( glob( EDGE_FRAMEWORK_HEADER_ROOT_DIR . '/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

foreach ( glob( EDGE_FRAMEWORK_HEADER_TYPES_ROOT_DIR . '/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'kvell_edge_map_header_meta' ) ) {
	function kvell_edge_map_header_meta() {
		$header_type_meta_boxes              = kvell_edge_header_types_meta_boxes();
		$header_behavior_meta_boxes_hide_dep = kvell_edge_get_hide_dep_for_header_behavior_meta_boxes();
		
		$header_meta_box = kvell_edge_add_meta_box(
			array(
				'scope' => apply_filters( 'kvell_edge_set_scope_for_meta_boxes', array( 'page', 'post' ), 'header_meta' ),
				'title' => esc_html__( 'Header', 'kvell' ),
				'name'  => 'header_meta'
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_header_type_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Choose Header Type', 'kvell' ),
				'description'   => esc_html__( 'Select header type layout', 'kvell' ),
				'parent'        => $header_meta_box,
				'options'       => $header_type_meta_boxes
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_header_style_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'kvell' ),
				'description'   => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'kvell' ),
				'parent'        => $header_meta_box,
				'options'       => array(
					''             => esc_html__( 'Default', 'kvell' ),
					'light-header' => esc_html__( 'Light', 'kvell' ),
					'dark-header'  => esc_html__( 'Dark', 'kvell' )
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'parent'          => $header_meta_box,
				'type'            => 'select',
				'name'            => 'edgtf_header_behaviour_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Header Behaviour', 'kvell' ),
				'description'     => esc_html__( 'Select the behaviour of header when you scroll down to page', 'kvell' ),
				'options'         => array(
					''                                => esc_html__( 'Default', 'kvell' ),
					'fixed-on-scroll'                 => esc_html__( 'Fixed on scroll', 'kvell' ),
					'no-behavior'                     => esc_html__( 'No Behavior', 'kvell' ),
					'sticky-header-on-scroll-up'      => esc_html__( 'Sticky on scroll up', 'kvell' ),
					'sticky-header-on-scroll-down-up' => esc_html__( 'Sticky on scroll up/down', 'kvell' )
				),
				'dependency' => array(
					'hide' => array(
						'edgtf_header_type_meta'  => $header_behavior_meta_boxes_hide_dep
					)
				)
			)
		);
		
		//additional area
		do_action( 'kvell_edge_additional_header_area_meta_boxes_map', $header_meta_box );
		
		//top area
		do_action( 'kvell_edge_header_top_area_meta_boxes_map', $header_meta_box );
		
		//logo area
		do_action( 'kvell_edge_header_logo_area_meta_boxes_map', $header_meta_box );
		
		//menu area
		do_action( 'kvell_edge_header_menu_area_meta_boxes_map', $header_meta_box );
	}
	
	add_action( 'kvell_edge_meta_boxes_map', 'kvell_edge_map_header_meta', 50 );
}