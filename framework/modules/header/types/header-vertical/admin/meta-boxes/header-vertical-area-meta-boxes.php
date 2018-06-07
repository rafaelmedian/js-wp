<?php

if ( ! function_exists( 'kvell_edge_get_hide_dep_for_header_vertical_area_meta_boxes' ) ) {
	function kvell_edge_get_hide_dep_for_header_vertical_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'kvell_edge_header_vertical_hide_meta_boxes', $hide_dep_options = array( '' => '' ) );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'kvell_edge_header_vertical_area_meta_options_map' ) ) {
	function kvell_edge_header_vertical_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = kvell_edge_get_hide_dep_for_header_vertical_area_meta_boxes();
		
		$header_vertical_area_meta_container = kvell_edge_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'header_vertical_area_container',
				'dependency' => array(
					'hide' => array(
						'edgtf_header_type_meta' => $hide_dep_options
					)
				)
			)
		);
		
		kvell_edge_add_admin_section_title(
			array(
				'parent' => $header_vertical_area_meta_container,
				'name'   => 'vertical_area_style',
				'title'  => esc_html__( 'Vertical Area Style', 'kvell' )
			)
		);
		
		$kvell_custom_sidebars = kvell_edge_get_custom_sidebars();
		if ( count( $kvell_custom_sidebars ) > 0 ) {
			kvell_edge_add_meta_box_field(
				array(
					'name'        => 'edgtf_custom_vertical_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area in Vertical area', 'kvell' ),
					'description' => esc_html__( 'Choose custom widget area to display in vertical menu"', 'kvell' ),
					'parent'      => $header_vertical_area_meta_container,
					'options'     => $kvell_custom_sidebars
				)
			);
		}
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_vertical_header_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'kvell' ),
				'description' => esc_html__( 'Set background color for vertical menu', 'kvell' ),
				'parent'      => $header_vertical_area_meta_container
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_vertical_header_background_image_meta',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__( 'Background Image', 'kvell' ),
				'description'   => esc_html__( 'Set background image for vertical menu', 'kvell' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_disable_vertical_header_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Background Image', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will hide background image in Vertical Menu', 'kvell' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_vertical_header_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Shadow', 'kvell' ),
				'description'   => esc_html__( 'Set shadow on vertical menu', 'kvell' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => kvell_edge_get_yes_no_select_array()
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_vertical_header_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Vertical Area Border', 'kvell' ),
				'description'   => esc_html__( 'Set border on vertical area', 'kvell' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => kvell_edge_get_yes_no_select_array()
			)
		);
		
		$vertical_header_border_container = kvell_edge_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'vertical_header_border_container',
				'parent'          => $header_vertical_area_meta_container,
				'dependency' => array(
					'show' => array(
						'edgtf_vertical_header_border_meta'  => 'yes'
					)
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_vertical_header_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'kvell' ),
				'description' => esc_html__( 'Choose color of border', 'kvell' ),
				'parent'      => $vertical_header_border_container
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_vertical_header_center_content_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Center Content', 'kvell' ),
				'description'   => esc_html__( 'Set content in vertical center', 'kvell' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => kvell_edge_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'kvell_edge_additional_header_area_meta_boxes_map', 'kvell_edge_header_vertical_area_meta_options_map', 10, 1 );
}