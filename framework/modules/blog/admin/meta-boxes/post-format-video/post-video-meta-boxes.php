<?php

if ( ! function_exists( 'kvell_edge_map_post_video_meta' ) ) {
	function kvell_edge_map_post_video_meta() {
		$video_post_format_meta_box = kvell_edge_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'kvell' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'kvell' ),
				'description'   => esc_html__( 'Choose video type', 'kvell' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'kvell' ),
					'self'            => esc_html__( 'Self Hosted', 'kvell' )
				)
			)
		);
		
		$edgtf_video_embedded_container = kvell_edge_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name'   => 'edgtf_video_embedded_container'
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'kvell' ),
				'description' => esc_html__( 'Enter Video URL', 'kvell' ),
				'parent'      => $edgtf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'edgtf_video_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'kvell' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'kvell' ),
				'parent'      => $edgtf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'edgtf_video_type_meta' => 'self'
					)
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'kvell' ),
				'description' => esc_html__( 'Enter video image', 'kvell' ),
				'parent'      => $edgtf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'edgtf_video_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'kvell_edge_meta_boxes_map', 'kvell_edge_map_post_video_meta', 22 );
}