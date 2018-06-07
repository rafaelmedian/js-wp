<?php

if ( ! function_exists( 'kvell_edge_get_hide_dep_for_header_logo_area_meta_boxes' ) ) {
	function kvell_edge_get_hide_dep_for_header_logo_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'kvell_edge_header_logo_area_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'kvell_edge_get_hide_dep_for_header_logo_area_widgets_meta_boxes' ) ) {
	function kvell_edge_get_hide_dep_for_header_logo_area_widgets_meta_boxes() {
		$hide_dep_options = apply_filters( 'kvell_edge_header_logo_area_widgets_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'kvell_edge_header_logo_area_meta_options_map' ) ) {
	function kvell_edge_header_logo_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = kvell_edge_get_hide_dep_for_header_logo_area_meta_boxes();
		$hide_dep_widgets = kvell_edge_get_hide_dep_for_header_logo_area_widgets_meta_boxes();
		
		$logo_area_container = kvell_edge_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_container',
				'parent'          => $header_meta_box,
				'dependency' => array(
					'hide' => array(
						'edgtf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
		
		kvell_edge_add_admin_section_title(
			array(
				'parent' => $logo_area_container,
				'name'   => 'logo_area_style',
				'title'  => esc_html__( 'Logo Area Style', 'kvell' )
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_disable_header_widget_logo_area_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Logo Area Widget', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will hide widget area from the logo area', 'kvell' ),
				'parent'        => $logo_area_container,
				'dependency' => array(
					'hide' => array(
						'edgtf_header_type_meta' => $hide_dep_widgets
					)
				)
			)
		);
		
		$kvell_custom_sidebars = kvell_edge_get_custom_sidebars();
		if ( count( $kvell_custom_sidebars ) > 0 ) {
			kvell_edge_add_meta_box_field(
				array(
					'name'        => 'edgtf_custom_logo_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area for Logo Area', 'kvell' ),
					'description' => esc_html__( 'Choose custom widget area to display in header logo area"', 'kvell' ),
					'parent'      => $logo_area_container,
					'options'     => $kvell_custom_sidebars,
					'dependency' => array(
						'hide' => array(
							'edgtf_header_type_meta' => $hide_dep_widgets
						)
					)
				)
			);
		}
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_logo_area_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Logo Area In Grid', 'kvell' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'kvell' ),
				'parent'        => $logo_area_container,
				'default_value' => '',
				'options'       => kvell_edge_get_yes_no_select_array()
			)
		);
		
		$logo_area_in_grid_container = kvell_edge_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_in_grid_container',
				'parent'          => $logo_area_container,
				'dependency' => array(
					'show' => array(
						'edgtf_logo_area_in_grid_meta'  => 'yes'
					)
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_area_grid_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'kvell' ),
				'description' => esc_html__( 'Set grid background color for logo area', 'kvell' ),
				'parent'      => $logo_area_in_grid_container
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_area_grid_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'kvell' ),
				'description' => esc_html__( 'Set grid background transparency for logo area (0 = fully transparent, 1 = opaque)', 'kvell' ),
				'parent'      => $logo_area_in_grid_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_logo_area_in_grid_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Border', 'kvell' ),
				'description'   => esc_html__( 'Set border on grid logo area', 'kvell' ),
				'parent'        => $logo_area_in_grid_container,
				'default_value' => '',
				'options'       => kvell_edge_get_yes_no_select_array()
			)
		);
		
		$logo_area_in_grid_border_container = kvell_edge_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_in_grid_border_container',
				'parent'          => $logo_area_in_grid_container,
				'dependency' => array(
					'show' => array(
						'edgtf_logo_area_in_grid_border_meta'  => 'yes'
					)
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_area_in_grid_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'kvell' ),
				'description' => esc_html__( 'Set border color for grid area', 'kvell' ),
				'parent'      => $logo_area_in_grid_border_container
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'kvell' ),
				'description' => esc_html__( 'Choose a background color for logo area', 'kvell' ),
				'parent'      => $logo_area_container
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_area_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Transparency', 'kvell' ),
				'description' => esc_html__( 'Choose a transparency for the logo area background color (0 = fully transparent, 1 = opaque)', 'kvell' ),
				'parent'      => $logo_area_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_logo_area_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Logo Area Border', 'kvell' ),
				'description'   => esc_html__( 'Set border on logo area', 'kvell' ),
				'parent'        => $logo_area_container,
				'default_value' => '',
				'options'       => kvell_edge_get_yes_no_select_array()
			)
		);
		
		$logo_area_border_bottom_color_container = kvell_edge_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_border_bottom_color_container',
				'parent'          => $logo_area_container,
				'dependency' => array(
					'show' => array(
						'edgtf_logo_area_border_meta'  => 'yes'
					)
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_area_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'kvell' ),
				'description' => esc_html__( 'Choose color of header bottom border', 'kvell' ),
				'parent'      => $logo_area_border_bottom_color_container
			)
		);
		
		do_action( 'kvell_edge_header_logo_area_additional_meta_boxes_map', $logo_area_container );
	}
	
	add_action( 'kvell_edge_header_logo_area_meta_boxes_map', 'kvell_edge_header_logo_area_meta_options_map', 10, 1 );
}