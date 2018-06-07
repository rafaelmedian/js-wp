<?php

if ( ! function_exists( 'kvell_edge_map_post_audio_meta' ) ) {
	function kvell_edge_map_post_audio_meta() {
		$audio_post_format_meta_box = kvell_edge_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'kvell' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'kvell' ),
				'description'   => esc_html__( 'Choose audio type', 'kvell' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'kvell' ),
					'self'            => esc_html__( 'Self Hosted', 'kvell' )
				)
			)
		);
		
		$edgtf_audio_embedded_container = kvell_edge_add_admin_container(
			array(
				'parent' => $audio_post_format_meta_box,
				'name'   => 'edgtf_audio_embedded_container'
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'kvell' ),
				'description' => esc_html__( 'Enter audio URL', 'kvell' ),
				'parent'      => $edgtf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'edgtf_audio_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'kvell' ),
				'description' => esc_html__( 'Enter audio link', 'kvell' ),
				'parent'      => $edgtf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'edgtf_audio_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'kvell_edge_meta_boxes_map', 'kvell_edge_map_post_audio_meta', 23 );
}