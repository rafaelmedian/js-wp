<?php

if ( ! function_exists( 'kvell_edge_get_hide_dep_for_header_menu_area_meta_boxes' ) ) {
	function kvell_edge_get_hide_dep_for_header_menu_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'kvell_edge_header_menu_area_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'kvell_edge_get_hide_dep_for_header_menu_area_widgets_meta_boxes' ) ) {
	function kvell_edge_get_hide_dep_for_header_menu_area_widgets_meta_boxes() {
		$hide_dep_options = apply_filters( 'kvell_edge_header_menu_area_widgets_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'kvell_edge_header_menu_area_meta_options_map' ) ) {
	function kvell_edge_header_menu_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = kvell_edge_get_hide_dep_for_header_menu_area_meta_boxes();
		$hide_dep_widgets = kvell_edge_get_hide_dep_for_header_menu_area_widgets_meta_boxes();
		
		$menu_area_container = kvell_edge_add_admin_container_no_style(
			array(
				'type'       => 'container',
				'name'       => 'menu_area_container',
				'parent'     => $header_meta_box,
				'dependency' => array(
					'hide' => array(
						'edgtf_header_type_meta' => $hide_dep_options
					)
				),
				'args'       => array(
					'enable_panels_for_default_value' => true
				)
			)
		);
		
		kvell_edge_add_admin_section_title(
			array(
				'parent' => $menu_area_container,
				'name'   => 'menu_area_style',
				'title'  => esc_html__( 'Menu Area Style', 'kvell' )
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_disable_header_widget_menu_area_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Menu Area Widget', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will hide widget area from the menu area', 'kvell' ),
				'parent'        => $menu_area_container,
				'dependency' => array(
					'hide' => array(
						'edgtf_header_type_meta' => $hide_dep_widgets
					)
				)
			)
		);
		
		$kvell_custom_sidebars = kvell_edge_get_custom_sidebars();
		if ( count( $kvell_custom_sidebars ) > 0 ) {
			kvell_edge_add_meta_box_field(
				array(
					'name'        => 'edgtf_custom_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Menu Area', 'kvell' ),
					'description' => esc_html__( 'Choose custom widget area to display in header menu area', 'kvell' ),
					'parent'      => $menu_area_container,
					'options'     => $kvell_custom_sidebars,
					'dependency' => array(
						'hide' => array(
							'edgtf_header_type_meta' => $hide_dep_widgets
						)
					)
				)
			);
		}
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_menu_area_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area In Grid', 'kvell' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'kvell' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => kvell_edge_get_yes_no_select_array()
			)
		);
		
		$menu_area_in_grid_container = kvell_edge_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_container',
				'parent'          => $menu_area_container,
				'dependency' => array(
					'show' => array(
						'edgtf_menu_area_in_grid_meta'  => 'yes'
					)
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_menu_area_grid_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'kvell' ),
				'description' => esc_html__( 'Set grid background color for menu area', 'kvell' ),
				'parent'      => $menu_area_in_grid_container
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_menu_area_grid_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'kvell' ),
				'description' => esc_html__( 'Set grid background transparency for menu area (0 = fully transparent, 1 = opaque)', 'kvell' ),
				'parent'      => $menu_area_in_grid_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_menu_area_in_grid_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Shadow', 'kvell' ),
				'description'   => esc_html__( 'Set shadow on grid menu area', 'kvell' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => kvell_edge_get_yes_no_select_array()
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_menu_area_in_grid_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Border', 'kvell' ),
				'description'   => esc_html__( 'Set border on grid menu area', 'kvell' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => kvell_edge_get_yes_no_select_array()
			)
		);
		
		$menu_area_in_grid_border_container = kvell_edge_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_border_container',
				'parent'          => $menu_area_in_grid_container,
				'dependency' => array(
					'show' => array(
						'edgtf_menu_area_in_grid_border_meta'  => 'yes'
					)
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_menu_area_in_grid_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'kvell' ),
				'description' => esc_html__( 'Set border color for grid area', 'kvell' ),
				'parent'      => $menu_area_in_grid_border_container
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_menu_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'kvell' ),
				'description' => esc_html__( 'Choose a background color for menu area', 'kvell' ),
				'parent'      => $menu_area_container
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_menu_area_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Transparency', 'kvell' ),
				'description' => esc_html__( 'Choose a transparency for the menu area background color (0 = fully transparent, 1 = opaque)', 'kvell' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_menu_area_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Shadow', 'kvell' ),
				'description'   => esc_html__( 'Set shadow on menu area', 'kvell' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => kvell_edge_get_yes_no_select_array()
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_menu_area_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Border', 'kvell' ),
				'description'   => esc_html__( 'Set border on menu area', 'kvell' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => kvell_edge_get_yes_no_select_array()
			)
		);
		
		$menu_area_border_bottom_color_container = kvell_edge_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_border_bottom_color_container',
				'parent'          => $menu_area_container,
				'dependency' => array(
					'show' => array(
						'edgtf_menu_area_border_meta'  => 'yes'
					)
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_menu_area_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'kvell' ),
				'description' => esc_html__( 'Choose color of header bottom border', 'kvell' ),
				'parent'      => $menu_area_border_bottom_color_container
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'type'        => 'text',
				'name'        => 'edgtf_menu_area_side_padding_meta',
				'label'       => esc_html__( 'Menu Area Side Padding', 'kvell' ),
				'description' => esc_html__( 'Enter value in px or percentage to define menu area side padding', 'kvell' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => esc_html__( 'px or %', 'kvell' )
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'text',
				'name'          => 'edgtf_dropdown_top_position_meta',
				'label'         => esc_html__( 'Dropdown Position', 'kvell' ),
				'description'   => esc_html__( 'Enter value in percentage of entire header height', 'kvell' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => '%'
				)
			)
		);

        kvell_edge_add_meta_box_field(
            array(
                'name'          => 'edgtf_wide_dropdown_menu_in_grid_meta',
                'type'          => 'select',
                'label'         => esc_html__( 'Wide Dropdown Menu In Grid', 'kvell' ),
                'description'   => esc_html__( 'Set wide dropdown menu to be in grid', 'kvell' ),
                'parent'        => $menu_area_container,
                'default_value' => '',
                'options'       => kvell_edge_get_yes_no_select_array()
            )
        );

        $wide_dropdown_menu_in_grid_container = kvell_edge_add_admin_container(
            array(
                'type'            => 'container',
                'name'            => 'wide_dropdown_menu_in_grid_container',
                'parent'          => $menu_area_container,
                'dependency' => array(
                    'show' => array(
                        'edgtf_wide_dropdown_menu_in_grid_meta'  => 'no'
                    )
                )
            )
        );

        kvell_edge_add_meta_box_field(
            array(
                'name'        => 'edgtf_wide_dropdown_menu_content_in_grid_meta',
                'type'          => 'select',
                'label'       => esc_html__( 'Wide Dropdown Menu Content In Grid', 'kvell' ),
                'description' => esc_html__( 'Set wide dropdown menu content to be in grid', 'kvell' ),
                'parent'      => $wide_dropdown_menu_in_grid_container,
                'default_value' => '',
                'options'       => kvell_edge_get_yes_no_select_array()
            )
        );
		
		do_action( 'kvell_edge_header_menu_area_additional_meta_boxes_map', $menu_area_container );
	}
	
	add_action( 'kvell_edge_header_menu_area_meta_boxes_map', 'kvell_edge_header_menu_area_meta_options_map', 10, 1 );
}