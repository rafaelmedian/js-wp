<?php

if ( ! function_exists( 'kvell_edge_map_post_quote_meta' ) ) {
	function kvell_edge_map_post_quote_meta() {
		$quote_post_format_meta_box = kvell_edge_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'kvell' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'kvell' ),
				'description' => esc_html__( 'Enter Quote text', 'kvell' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'kvell' ),
				'description' => esc_html__( 'Enter Quote author', 'kvell' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
	}
	
	add_action( 'kvell_edge_meta_boxes_map', 'kvell_edge_map_post_quote_meta', 25 );
}