<?php

if ( ! function_exists( 'kvell_edge_footer_options_map' ) ) {
	function kvell_edge_footer_options_map() {

		kvell_edge_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'kvell' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = kvell_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'kvell' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);

		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'kvell' ),
				'parent'        => $footer_panel
			)
		);

        kvell_edge_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'uncovering_footer',
                'default_value' => 'no',
                'label'         => esc_html__( 'Uncovering Footer', 'kvell' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'kvell' ),
                'parent'        => $footer_panel,
            )
        );

		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'kvell' ),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_top_container = kvell_edge_add_admin_container(
			array(
				'name'       => 'show_footer_top_container',
				'parent'     => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_top' => 'yes'
					)
				)
			)
		);

		kvell_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '3 3 3 3',
				'label'         => esc_html__( 'Footer Top Columns', 'kvell' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'kvell' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3',
                    '3 3 6' => '3 (25% + 25% + 50%)',
					'3 3 3 3' => '4'
				)
			)
		);

		kvell_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'kvell' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'kvell' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'kvell' ),
					'left'   => esc_html__( 'Left', 'kvell' ),
					'center' => esc_html__( 'Center', 'kvell' ),
					'right'  => esc_html__( 'Right', 'kvell' )
				),
				'parent'        => $show_footer_top_container,
			)
		);

		kvell_edge_add_admin_field(
			array(
				'name'        => 'footer_top_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'kvell' ),
				'description' => esc_html__( 'Set background color for top footer area', 'kvell' ),
				'parent'      => $show_footer_top_container
			)
		);

		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'kvell' ),
				'parent'        => $footer_panel,
			)
		);

		$show_footer_bottom_container = kvell_edge_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'parent'          => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_bottom'  => 'yes'
					)
				)
			)
		);

		kvell_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '6 6',
				'label'         => esc_html__( 'Footer Bottom Columns', 'kvell' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'kvell' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3'
				),
				'parent'        => $show_footer_bottom_container,
			)
		);

		kvell_edge_add_admin_field(
			array(
				'name'        => 'footer_bottom_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'kvell' ),
				'description' => esc_html__( 'Set background color for bottom footer area', 'kvell' ),
				'parent'      => $show_footer_bottom_container
			)
		);
	}

	add_action( 'kvell_edge_options_map', 'kvell_edge_footer_options_map', 11 );
}