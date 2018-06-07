<?php

if ( ! function_exists( 'kvell_edge_map_post_link_meta' ) ) {
	function kvell_edge_map_post_link_meta() {
		$link_post_format_meta_box = kvell_edge_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'kvell' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'kvell' ),
				'description' => esc_html__( 'Enter link', 'kvell' ),
				'parent'      => $link_post_format_meta_box
			)
		);
	}
	
	add_action( 'kvell_edge_meta_boxes_map', 'kvell_edge_map_post_link_meta', 24 );
}