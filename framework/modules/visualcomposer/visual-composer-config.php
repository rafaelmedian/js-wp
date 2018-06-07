<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = EDGE_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'kvell_edge_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function kvell_edge_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'kvell_edge_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'kvell_edge_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function kvell_edge_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Edge Row Content Width', 'kvell' ),
				'value'      => array(
					esc_html__( 'Full Width', 'kvell' ) => 'full-width',
					esc_html__( 'In Grid', 'kvell' )    => 'grid'
				),
				'group'      => esc_html__( 'Edge Settings', 'kvell' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'anchor',
				'heading'     => esc_html__( 'Edge Anchor ID', 'kvell' ),
				'description' => esc_html__( 'For example "home"', 'kvell' ),
				'group'       => esc_html__( 'Edge Settings', 'kvell' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Edge Background Color', 'kvell' ),
				'group'      => esc_html__( 'Edge Settings', 'kvell' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Edge Background Image', 'kvell' ),
				'group'      => esc_html__( 'Edge Settings', 'kvell' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Edge Disable Background Image', 'kvell' ),
				'value'       => array(
					esc_html__( 'Never', 'kvell' )        => '',
					esc_html__( 'Below 1280px', 'kvell' ) => '1280',
					esc_html__( 'Below 1024px', 'kvell' ) => '1024',
					esc_html__( 'Below 768px', 'kvell' )  => '768',
					esc_html__( 'Below 680px', 'kvell' )  => '680',
					esc_html__( 'Below 480px', 'kvell' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'kvell' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Edge Settings', 'kvell' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_background_image',
				'heading'    => esc_html__( 'Edge Parallax Background Image', 'kvell' ),
				'group'      => esc_html__( 'Edge Settings', 'kvell' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_bg_speed',
				'heading'     => esc_html__( 'Edge Parallax Speed', 'kvell' ),
				'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'kvell' ),
				'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Edge Settings', 'kvell' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Edge Parallax Section Height (px)', 'kvell' ),
				'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Edge Settings', 'kvell' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Edge Content Aligment', 'kvell' ),
				'value'      => array(
					esc_html__( 'Default', 'kvell' ) => '',
					esc_html__( 'Left', 'kvell' )    => 'left',
					esc_html__( 'Center', 'kvell' )  => 'center',
					esc_html__( 'Right', 'kvell' )   => 'right'
				),
				'group'      => esc_html__( 'Edge Settings', 'kvell' )
			)
		);

        vc_add_param( 'vc_row',
            array(
                'type'       => 'textfield',
                'param_name' => 'row_background_text_1',
                'heading'    => esc_html__( 'Edge Background Text 1', 'kvell' ),
                'group'      => esc_html__( 'Edge Settings', 'kvell' )
            )
        );

        vc_add_param( 'vc_row',
            array(
                'type'       => 'textfield',
                'param_name' => 'row_background_text_2',
                'heading'    => esc_html__( 'Edge Background Text 2', 'kvell' ),
                'dependency' => array( 'element' => 'row_background_text_1', 'not_empty' => true ),
                'group'      => esc_html__( 'Edge Settings', 'kvell' )
            )
        );

        vc_add_param( 'vc_row',
            array(
                'type'       => 'textfield',
                'param_name' => 'row_background_text_size',
                'heading'    => esc_html__( 'Edge Background Text Size', 'kvell' ),
                'description' => esc_html__( 'Set the background text size in px or em', 'kvell' ),
                'dependency' => array( 'element' => 'row_background_text_1', 'not_empty' => true ),
                'group'      => esc_html__( 'Edge Settings', 'kvell' )
            )
        );

        vc_add_param( 'vc_row',
            array(
                'type'       => 'textfield',
                'param_name' => 'row_background_text_size_1440',
                'heading'    => esc_html__( 'Edge Background Text Size 1280px-1440px', 'kvell' ),
                'description' => esc_html__( 'Set the background text size in px or em', 'kvell' ),
                'dependency' => array( 'element' => 'row_background_text_1', 'not_empty' => true ),
                'group'      => esc_html__( 'Edge Settings', 'kvell' )
            )
        );

        vc_add_param( 'vc_row',
            array(
                'type'       => 'textfield',
                'param_name' => 'row_background_text_size_1280',
                'heading'    => esc_html__( 'Edge Background Text Size 1024px-1280px', 'kvell' ),
                'description' => esc_html__( 'Set the background text size in px or em', 'kvell' ),
                'dependency' => array( 'element' => 'row_background_text_1', 'not_empty' => true ),
                'group'      => esc_html__( 'Edge Settings', 'kvell' )
            )
        );

        vc_add_param( 'vc_row',
            array(
                'type'       => 'colorpicker',
                'param_name' => 'row_background_text_color',
                'heading'    => esc_html__( 'Edge Background Text Color', 'kvell' ),
                'dependency' => array( 'element' => 'row_background_text_1', 'not_empty' => true ),
                'group'      => esc_html__( 'Edge Settings', 'kvell' )
            )
        );

        vc_add_param( 'vc_row',
            array(
                'type'       => 'dropdown',
                'param_name' => 'row_background_text_align',
                'heading'    => esc_html__( 'Edge Background Text Align', 'kvell' ),
                'value'      => array(
                    esc_html__( 'Default', 'kvell' ) => '',
                    esc_html__( 'Left', 'kvell' )    => 'left',
                    esc_html__( 'Center', 'kvell' )  => 'center',
                    esc_html__( 'Right', 'kvell' )   => 'right'
                ),
                'dependency' => array( 'element' => 'row_background_text_1', 'not_empty' => true ),
                'group'      => esc_html__( 'Edge Settings', 'kvell' )
            )
        );

        vc_add_param( 'vc_row',
            array(
                'type'       => 'dropdown',
                'param_name' => 'row_background_text_vertical_align',
                'heading'    => esc_html__( 'Edge Background Vertical Align', 'kvell' ),
                'value'      => array(
                    esc_html__( 'Middle', 'kvell' )   => 'middle',
                    esc_html__( 'Top', 'kvell' )      => 'top',
                    esc_html__( 'Bottom', 'kvell' )   => 'bottom'
                ),
                'dependency' => array( 'element' => 'row_background_text_1', 'not_empty' => true ),
                'group'      => esc_html__( 'Edge Settings', 'kvell' )
            )
        );

        vc_add_param( 'vc_row',
            array(
                'type'       => 'textfield',
                'param_name' => 'row_background_text_holder_left_offset',
                'heading'    => esc_html__( 'Edge Background Left Offset', 'kvell' ),
                'dependency' => array( 'element' => 'row_background_text_1', 'not_empty' => true ),
                'description' => esc_html__( 'Set the value of left offset in px or %', 'kvell' ),
                'group'      => esc_html__( 'Edge Settings', 'kvell' )
            )
        );

        vc_add_param( 'vc_row',
            array(
                'type'       => 'dropdown',
                'param_name' => 'row_background_text_one_line',
                'heading'    => esc_html__( 'Edge Background Text In One Line', 'kvell' ),
                'value'      => array_flip(kvell_edge_get_yes_no_select_array()),
                'dependency' => array( 'element' => 'row_background_text_1', 'not_empty' => true ),
                'group'      => esc_html__( 'Edge Settings', 'kvell' )
            )
        );

        vc_add_param( 'vc_row',
            array(
                'type'       => 'textfield',
                'param_name' => 'row_background_text_padding_top',
                'heading'    => esc_html__( 'Edge Background Text Top Padding', 'kvell' ),
                'description' => esc_html__( 'Set the value of top padding in px or %', 'kvell' ),
                'dependency' => array( 'element' => 'row_background_text_1', 'not_empty' => true ),
                'group'      => esc_html__( 'Edge Settings', 'kvell' )
            )
        );

        vc_add_param( 'vc_row',
            array(
                'type'       => 'dropdown',
                'param_name' => 'row_background_text_animation',
                'heading'    => esc_html__( 'Animate Background Text', 'kvell' ),
                'value'      => array_flip( kvell_edge_get_yes_no_select_array(false, true) ),
                'dependency' => array( 'element' => 'row_background_text_1', 'not_empty' => true ),
                'description'    => esc_html__( 'Animate background text when row appears in viewport', 'kvell' ),
                'group'      => esc_html__( 'Edge Settings', 'kvell' )
            )
        );
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Edge Row Content Width', 'kvell' ),
				'value'      => array(
					esc_html__( 'Full Width', 'kvell' ) => 'full-width',
					esc_html__( 'In Grid', 'kvell' )    => 'grid'
				),
				'group'      => esc_html__( 'Edge Settings', 'kvell' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Edge Background Color', 'kvell' ),
				'group'      => esc_html__( 'Edge Settings', 'kvell' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Edge Background Image', 'kvell' ),
				'group'      => esc_html__( 'Edge Settings', 'kvell' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Edge Disable Background Image', 'kvell' ),
				'value'       => array(
					esc_html__( 'Never', 'kvell' )        => '',
					esc_html__( 'Below 1280px', 'kvell' ) => '1280',
					esc_html__( 'Below 1024px', 'kvell' ) => '1024',
					esc_html__( 'Below 768px', 'kvell' )  => '768',
					esc_html__( 'Below 680px', 'kvell' )  => '680',
					esc_html__( 'Below 480px', 'kvell' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'kvell' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Edge Settings', 'kvell' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Edge Content Aligment', 'kvell' ),
				'value'      => array(
					esc_html__( 'Default', 'kvell' ) => '',
					esc_html__( 'Left', 'kvell' )    => 'left',
					esc_html__( 'Center', 'kvell' )  => 'center',
					esc_html__( 'Right', 'kvell' )   => 'right'
				),
				'group'      => esc_html__( 'Edge Settings', 'kvell' )
			)
		);
		
		/******* VC Row Inner shortcode - end *******/
		
		/******* VC Revolution Slider shortcode - begin *******/
		
		if ( kvell_edge_revolution_slider_installed() ) {
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_paspartu',
					'heading'     => esc_html__( 'Edge Enable Passepartout', 'kvell' ),
					'value'       => array_flip( kvell_edge_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Edge Settings', 'kvell' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'paspartu_size',
					'heading'     => esc_html__( 'Edge Passepartout Size', 'kvell' ),
					'value'       => array(
						esc_html__( 'Tiny', 'kvell' )   => 'tiny',
						esc_html__( 'Small', 'kvell' )  => 'small',
						esc_html__( 'Normal', 'kvell' ) => 'normal',
						esc_html__( 'Large', 'kvell' )  => 'large'
					),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Edge Settings', 'kvell' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_side_paspartu',
					'heading'     => esc_html__( 'Edge Disable Side Passepartout', 'kvell' ),
					'value'       => array_flip( kvell_edge_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Edge Settings', 'kvell' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_top_paspartu',
					'heading'     => esc_html__( 'Edge Disable Top Passepartout', 'kvell' ),
					'value'       => array_flip( kvell_edge_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Edge Settings', 'kvell' )
				)
			);
		}
		
		/******* VC Revolution Slider shortcode - end *******/
	}
	
	add_action( 'vc_after_init', 'kvell_edge_vc_row_map' );
}