<?php

if ( ! function_exists( 'kvell_edge_logo_meta_box_map' ) ) {
	function kvell_edge_logo_meta_box_map() {
		
		$logo_meta_box = kvell_edge_add_meta_box(
			array(
				'scope' => apply_filters( 'kvell_edge_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'kvell' ),
				'name'  => 'logo_meta'
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'kvell' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'kvell' ),
				'parent'      => $logo_meta_box
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'kvell' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'kvell' ),
				'parent'      => $logo_meta_box
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'kvell' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'kvell' ),
				'parent'      => $logo_meta_box
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'kvell' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'kvell' ),
				'parent'      => $logo_meta_box
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'kvell' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'kvell' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'kvell_edge_meta_boxes_map', 'kvell_edge_logo_meta_box_map', 47 );
}