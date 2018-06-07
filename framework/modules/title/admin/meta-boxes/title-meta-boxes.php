<?php

if ( ! function_exists( 'kvell_edge_get_title_types_meta_boxes' ) ) {
	function kvell_edge_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'kvell_edge_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'kvell' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'kvell_edge_map_title_meta' ) ) {
	function kvell_edge_map_title_meta() {
		$title_type_meta_boxes = kvell_edge_get_title_types_meta_boxes();
		
		$title_meta_box = kvell_edge_add_meta_box(
			array(
				'scope' => apply_filters( 'kvell_edge_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'kvell' ),
				'name'  => 'title_meta'
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'kvell' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'kvell' ),
				'parent'        => $title_meta_box,
				'options'       => kvell_edge_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = kvell_edge_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'edgtf_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'edgtf_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				kvell_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'kvell' ),
						'description'   => esc_html__( 'Choose title type', 'kvell' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				kvell_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'kvell' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'kvell' ),
						'options'       => kvell_edge_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				kvell_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'kvell' ),
						'description' => esc_html__( 'Set a height for Title Area', 'kvell' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				kvell_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'kvell' ),
						'description' => esc_html__( 'Choose a background color for title area', 'kvell' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				kvell_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'kvell' ),
						'description' => esc_html__( 'Choose an Image for title area', 'kvell' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				kvell_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'kvell' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'kvell' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'kvell' ),
							'hide'                => esc_html__( 'Hide Image', 'kvell' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'kvell' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'kvell' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'kvell' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'kvell' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'kvell' )
						)
					)
				);
				
				kvell_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'kvell' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'kvell' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'kvell' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'kvell' ),
							'window-top'    => esc_html__( 'From Window Top', 'kvell' )
						)
					)
				);
				
				kvell_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'kvell' ),
						'options'       => kvell_edge_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				kvell_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'kvell' ),
						'description' => esc_html__( 'Choose a color for title text', 'kvell' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				kvell_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'kvell' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'kvell' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				kvell_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'kvell' ),
						'options'       => kvell_edge_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				kvell_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'kvell' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'kvell' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'kvell_edge_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'kvell_edge_meta_boxes_map', 'kvell_edge_map_title_meta', 60 );
}