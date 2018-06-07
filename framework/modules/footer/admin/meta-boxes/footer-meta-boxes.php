<?php

if ( ! function_exists( 'kvell_edge_map_footer_meta' ) ) {
	function kvell_edge_map_footer_meta() {
		
		$footer_meta_box = kvell_edge_add_meta_box(
			array(
				'scope' => apply_filters( 'kvell_edge_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'kvell' ),
				'name'  => 'footer_meta'
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_disable_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Footer for this Page', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'kvell' ),
				'options'       => kvell_edge_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);
		
		$show_footer_meta_container = kvell_edge_add_admin_container(
			array(
				'name'       => 'edgtf_show_footer_meta_container',
				'parent'     => $footer_meta_box,
				'dependency' => array(
					'hide' => array(
						'edgtf_disable_footer_meta' => 'yes'
					)
				)
			)
		);
		
			kvell_edge_add_meta_box_field(
				array(
					'name'          => 'edgtf_show_footer_top_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Top', 'kvell' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'kvell' ),
					'options'       => kvell_edge_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
			
			kvell_edge_add_meta_box_field(
				array(
					'name'          => 'edgtf_show_footer_bottom_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Bottom', 'kvell' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'kvell' ),
					'options'       => kvell_edge_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);

        kvell_edge_add_meta_box_field(
            array(
                'name'          => 'edgtf_footer_in_grid_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__( 'Footer in Grid', 'kvell' ),
                'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'kvell' ),
                'options'       => kvell_edge_get_yes_no_select_array(),
                'dependency' => array(
                    'hide' => array(
                        'edgtf_show_footer_top_meta' => array('', 'no'),
                        'edgtf_show_footer_bottom_meta' => array('', 'no')
                    )
                ),
                'parent'        => $show_footer_meta_container
            )
        );

        kvell_edge_add_meta_box_field(
            array(
                'name'          => 'edgtf_uncovering_footer_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__( 'Uncovering Footer', 'kvell' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'kvell' ),
                'options'       => kvell_edge_get_yes_no_select_array(),
                'parent'        => $show_footer_meta_container,
            )
        );
	}
	
	add_action( 'kvell_edge_meta_boxes_map', 'kvell_edge_map_footer_meta', 70 );
}