<?php

if ( ! function_exists( 'kvell_edge_get_hide_dep_for_full_screen_menu_options' ) ) {
	function kvell_edge_get_hide_dep_for_full_screen_menu_options() {
		$hide_dep_options = apply_filters( 'kvell_edge_full_screen_menu_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'kvell_edge_fullscreen_menu_options_map' ) ) {
	function kvell_edge_fullscreen_menu_options_map() {
		$hide_dep_options = kvell_edge_get_hide_dep_for_full_screen_menu_options();
		
		$fullscreen_panel = kvell_edge_add_admin_panel(
			array(
				'title'           => esc_html__( 'Full Screen Menu', 'kvell' ),
				'name'            => 'panel_fullscreen_menu',
				'page'            => '_header_page',
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $fullscreen_panel,
				'type'          => 'select',
				'name'          => 'fullscreen_menu_animation_style',
				'default_value' => 'fade-push-text-right',
				'label'         => esc_html__( 'Full Screen Menu Overlay Animation', 'kvell' ),
				'description'   => esc_html__( 'Choose animation type for full screen menu overlay', 'kvell' ),
				'options'       => array(
					'fade-push-text-right' => esc_html__( 'Fade Push Text Right', 'kvell' ),
					'fade-push-text-top'   => esc_html__( 'Fade Push Text Top', 'kvell' ),
					'fade-text-scaledown'  => esc_html__( 'Fade Text Scaledown', 'kvell' )
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $fullscreen_panel,
				'type'          => 'yesno',
				'name'          => 'fullscreen_in_grid',
				'default_value' => 'no',
				'label'         => esc_html__( 'Full Screen Menu in Grid', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will put full screen menu content in grid', 'kvell' ),
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $fullscreen_panel,
				'type'          => 'selectblank',
				'name'          => 'fullscreen_alignment',
				'default_value' => '',
				'label'         => esc_html__( 'Full Screen Menu Alignment', 'kvell' ),
				'description'   => esc_html__( 'Choose alignment for full screen menu content', 'kvell' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'kvell' ),
					'left'   => esc_html__( 'Left', 'kvell' ),
					'center' => esc_html__( 'Center', 'kvell' ),
					'right'  => esc_html__( 'Right', 'kvell' )
				)
			)
		);
		
		$background_group = kvell_edge_add_admin_group(
			array(
				'parent'      => $fullscreen_panel,
				'name'        => 'background_group',
				'title'       => esc_html__( 'Background', 'kvell' ),
				'description' => esc_html__( 'Select a background color and transparency for full screen menu (0 = fully transparent, 1 = opaque)', 'kvell' )
			)
		);
		
		$background_group_row = kvell_edge_add_admin_row(
			array(
				'parent' => $background_group,
				'name'   => 'background_group_row'
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent' => $background_group_row,
				'type'   => 'colorsimple',
				'name'   => 'fullscreen_menu_background_color',
				'label'  => esc_html__( 'Background Color', 'kvell' )
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent' => $background_group_row,
				'type'   => 'textsimple',
				'name'   => 'fullscreen_menu_background_transparency',
				'label'  => esc_html__( 'Background Transparency', 'kvell' )
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'      => $fullscreen_panel,
				'type'        => 'image',
				'name'        => 'fullscreen_menu_background_image',
				'label'       => esc_html__( 'Background Image', 'kvell' ),
				'description' => esc_html__( 'Choose a background image for full screen menu background', 'kvell' )
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'      => $fullscreen_panel,
				'type'        => 'image',
				'name'        => 'fullscreen_menu_pattern_image',
				'label'       => esc_html__( 'Pattern Background Image', 'kvell' ),
				'description' => esc_html__( 'Choose a pattern image for full screen menu background', 'kvell' )
			)
		);
		
		//1st level style group
		$first_level_style_group = kvell_edge_add_admin_group(
			array(
				'parent'      => $fullscreen_panel,
				'name'        => 'first_level_style_group',
				'title'       => esc_html__( '1st Level Style', 'kvell' ),
				'description' => esc_html__( 'Define styles for 1st level in full screen menu', 'kvell' )
			)
		);
		
		$first_level_style_row1 = kvell_edge_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name'   => 'first_level_style_row1'
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $first_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_color',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'kvell' ),
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $first_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_hover_color',
				'default_value' => '',
				'label'         => esc_html__( 'Hover Text Color', 'kvell' ),
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $first_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_active_color',
				'default_value' => '',
				'label'         => esc_html__( 'Active Text Color', 'kvell' ),
			)
		);
		
		$first_level_style_row3 = kvell_edge_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name'   => 'first_level_style_row3'
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $first_level_style_row3,
				'type'          => 'fontsimple',
				'name'          => 'fullscreen_menu_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'kvell' ),
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $first_level_style_row3,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'kvell' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $first_level_style_row3,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'kvell' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$first_level_style_row4 = kvell_edge_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name'   => 'first_level_style_row4'
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $first_level_style_row4,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'kvell' ),
				'options'       => kvell_edge_get_font_style_array()
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $first_level_style_row4,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'kvell' ),
				'options'       => kvell_edge_get_font_weight_array()
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $first_level_style_row4,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Lettert Spacing', 'kvell' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $first_level_style_row4,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'kvell' ),
				'options'       => kvell_edge_get_text_transform_array()
			)
		);
		
		//2nd level style group
		$second_level_style_group = kvell_edge_add_admin_group(
			array(
				'parent'      => $fullscreen_panel,
				'name'        => 'second_level_style_group',
				'title'       => esc_html__( '2nd Level Style', 'kvell' ),
				'description' => esc_html__( 'Define styles for 2nd level in full screen menu', 'kvell' )
			)
		);
		
		$second_level_style_row1 = kvell_edge_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name'   => 'second_level_style_row1'
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $second_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_color_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'kvell' ),
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $second_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_hover_color_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Text Color', 'kvell' ),
			)
		);
		
		$second_level_style_row2 = kvell_edge_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name'   => 'second_level_style_row2'
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $second_level_style_row2,
				'type'          => 'fontsimple',
				'name'          => 'fullscreen_menu_google_fonts_2nd',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'kvell' ),
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $second_level_style_row2,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_font_size_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'kvell' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $second_level_style_row2,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_line_height_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'kvell' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_style_row3 = kvell_edge_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name'   => 'second_level_style_row3'
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $second_level_style_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_font_style_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'kvell' ),
				'options'       => kvell_edge_get_font_style_array()
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $second_level_style_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_font_weight_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'kvell' ),
				'options'       => kvell_edge_get_font_weight_array()
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $second_level_style_row3,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_letter_spacing_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Lettert Spacing', 'kvell' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $second_level_style_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_text_transform_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'kvell' ),
				'options'       => kvell_edge_get_text_transform_array()
			)
		);
		
		$third_level_style_group = kvell_edge_add_admin_group(
			array(
				'parent'      => $fullscreen_panel,
				'name'        => 'third_level_style_group',
				'title'       => esc_html__( '3rd Level Style', 'kvell' ),
				'description' => esc_html__( 'Define styles for 3rd level in full screen menu', 'kvell' )
			)
		);
		
		$third_level_style_row1 = kvell_edge_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name'   => 'third_level_style_row1'
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $third_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_color_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'kvell' ),
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $third_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_hover_color_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Text Color', 'kvell' ),
			)
		);
		
		$third_level_style_row2 = kvell_edge_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name'   => 'second_level_style_row2'
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $third_level_style_row2,
				'type'          => 'fontsimple',
				'name'          => 'fullscreen_menu_google_fonts_3rd',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'kvell' ),
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $third_level_style_row2,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_font_size_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'kvell' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $third_level_style_row2,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_line_height_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'kvell' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$third_level_style_row3 = kvell_edge_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name'   => 'second_level_style_row3'
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $third_level_style_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_font_style_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'kvell' ),
				'options'       => kvell_edge_get_font_style_array()
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $third_level_style_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_font_weight_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'kvell' ),
				'options'       => kvell_edge_get_font_weight_array()
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $third_level_style_row3,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_letter_spacing_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Lettert Spacing', 'kvell' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $third_level_style_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_text_transform_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'kvell' ),
				'options'       => kvell_edge_get_text_transform_array()
			)
		);

		$icon_style_group = kvell_edge_add_admin_group(
			array(
				'parent'      => $fullscreen_panel,
				'name'        => 'fullscreen_menu_icon_style_group',
				'title'       => esc_html__( 'Full Screen Menu Icon Style', 'kvell' ),
				'description' => esc_html__( 'Define styles for full screen menu icon', 'kvell' )
			)
		);
		
		$icon_colors_row1 = kvell_edge_add_admin_row(
			array(
				'parent' => $icon_style_group,
				'name'   => 'icon_colors_row1'
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type'   => 'colorsimple',
				'name'   => 'fullscreen_menu_icon_color',
				'label'  => esc_html__( 'Color', 'kvell' ),
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type'   => 'colorsimple',
				'name'   => 'fullscreen_menu_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'kvell' ),
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type'   => 'colorsimple',
				'name'   => 'fullscreen_menu_icon_mobile_color',
				'label'  => esc_html__( 'Mobile Color', 'kvell' ),
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type'   => 'colorsimple',
				'name'   => 'fullscreen_menu_icon_mobile_hover_color',
				'label'  => esc_html__( 'Mobile Hover Color', 'kvell' ),
			)
		);
	}
	
	add_action( 'kvell_edge_additional_header_menu_area_options_map', 'kvell_edge_fullscreen_menu_options_map' );
}