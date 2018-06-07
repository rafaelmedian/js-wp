<?php

if ( ! function_exists( 'kvell_edge_map_post_gallery_meta' ) ) {
	
	function kvell_edge_map_post_gallery_meta() {
		$gallery_post_format_meta_box = kvell_edge_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'kvell' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		kvell_edge_add_multiple_images_field(
			array(
				'name'        => 'edgtf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'kvell' ),
				'description' => esc_html__( 'Choose your gallery images', 'kvell' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'kvell_edge_meta_boxes_map', 'kvell_edge_map_post_gallery_meta', 21 );
}
