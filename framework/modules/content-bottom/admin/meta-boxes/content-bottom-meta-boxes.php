<?php

if ( ! function_exists( 'kvell_edge_map_content_bottom_meta' ) ) {
	function kvell_edge_map_content_bottom_meta() {
		
		$content_bottom_meta_box = kvell_edge_add_meta_box(
			array(
				'scope' => apply_filters( 'kvell_edge_set_scope_for_meta_boxes', array( 'page', 'post' ), 'content_bottom_meta' ),
				'title' => esc_html__( 'Content Bottom', 'kvell' ),
				'name'  => 'content_bottom_meta'
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_enable_content_bottom_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'kvell' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'kvell' ),
				'parent'        => $content_bottom_meta_box,
				'options'       => kvell_edge_get_yes_no_select_array()
			)
		);
		
		$show_content_bottom_meta_container = kvell_edge_add_admin_container(
			array(
				'parent'          => $content_bottom_meta_box,
				'name'            => 'edgtf_show_content_bottom_meta_container',
				'dependency' => array(
					'show' => array(
						'edgtf_enable_content_bottom_area_meta' => 'yes'
					)
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_content_bottom_sidebar_custom_display_meta',
				'type'          => 'selectblank',
				'default_value' => '',
				'label'         => esc_html__( 'Sidebar to Display', 'kvell' ),
				'description'   => esc_html__( 'Choose a content bottom sidebar to display', 'kvell' ),
				'options'       => kvell_edge_get_custom_sidebars(),
				'parent'        => $show_content_bottom_meta_container,
				'args'          => array(
					'select2' => true
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'edgtf_content_bottom_in_grid_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Display in Grid', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will place content bottom in grid', 'kvell' ),
				'options'       => kvell_edge_get_yes_no_select_array(),
				'parent'        => $show_content_bottom_meta_container
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'type'        => 'color',
				'name'        => 'edgtf_content_bottom_background_color_meta',
				'label'       => esc_html__( 'Background Color', 'kvell' ),
				'description' => esc_html__( 'Choose a background color for content bottom area', 'kvell' ),
				'parent'      => $show_content_bottom_meta_container
			)
		);
	}
	
	add_action( 'kvell_edge_meta_boxes_map', 'kvell_edge_map_content_bottom_meta', 71 );
}