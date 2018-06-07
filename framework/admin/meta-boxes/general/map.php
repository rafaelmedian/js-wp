<?php

if ( ! function_exists( 'kvell_edge_map_general_meta' ) ) {
	function kvell_edge_map_general_meta() {
		
		$general_meta_box = kvell_edge_add_meta_box(
			array(
				'scope' => apply_filters( 'kvell_edge_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'kvell' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'kvell' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'kvell' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'kvell' ),
				'parent'        => $general_meta_box
			)
		);
		
		$edgtf_content_padding_group = kvell_edge_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'kvell' ),
				'description' => esc_html__( 'Define styles for Content area', 'kvell' ),
				'parent'      => $general_meta_box
			)
		);
		
			$edgtf_content_padding_row = kvell_edge_add_admin_row(
				array(
					'name'   => 'edgtf_content_padding_row',
					'next'   => true,
					'parent' => $edgtf_content_padding_group
				)
			);
		
				kvell_edge_add_meta_box_field(
					array(
						'name'   => 'edgtf_page_content_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Padding (e.g. 10px 5px 10px 5px)', 'kvell' ),
						'parent' => $edgtf_content_padding_row,
					)
				);
				
				kvell_edge_add_meta_box_field(
					array(
						'name'    => 'edgtf_page_content_padding_mobile',
						'type'    => 'textsimple',
						'label'   => esc_html__( 'Content Padding for mobile (e.g. 10px 5px 10px 5px)', 'kvell' ),
						'parent'  => $edgtf_content_padding_row,
					)
				);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'kvell' ),
				'description' => esc_html__( 'Choose background color for page content', 'kvell' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		kvell_edge_add_meta_box_field(
			array(
				'name'    => 'edgtf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'kvell' ),
				'parent'  => $general_meta_box,
				'options' => kvell_edge_get_yes_no_select_array()
			)
		);
		
			$boxed_container_meta = kvell_edge_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'dependency' => array(
						'hide' => array(
							'edgtf_boxed_meta'  => array('','no')
						)
					)
				)
			);
		
				kvell_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'kvell' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'kvell' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				kvell_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'kvell' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'kvell' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				kvell_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'kvell' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'kvell' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				kvell_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => 'fixed',
						'label'         => esc_html__( 'Background Image Attachment', 'kvell' ),
						'description'   => esc_html__( 'Choose background image attachment', 'kvell' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'kvell' ),
							'fixed'  => esc_html__( 'Fixed', 'kvell' ),
							'scroll' => esc_html__( 'Scroll', 'kvell' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'kvell' ),
				'parent'        => $general_meta_box,
				'options'       => kvell_edge_get_yes_no_select_array(),
			)
		);
		
			$paspartu_container_meta = kvell_edge_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'edgtf_paspartu_container_meta',
					'dependency' => array(
						'hide' => array(
							'edgtf_paspartu_meta'  => array('','no')
						)
					)
				)
			);
		
				kvell_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'kvell' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'kvell' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				kvell_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'kvell' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'kvell' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				kvell_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'kvell' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'kvell' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				kvell_edge_add_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'edgtf_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'kvell' ),
						'options'       => kvell_edge_get_yes_no_select_array(),
					)
				);
		
				kvell_edge_add_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'edgtf_enable_fixed_paspartu_meta',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'kvell' ),
						'description'   => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'kvell' ),
						'options'       => kvell_edge_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Width Layout - begin **********************/
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'kvell' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'kvell' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'kvell' ),
					'edgtf-grid-1100' => esc_html__( '1100px', 'kvell' ),
					'edgtf-grid-1300' => esc_html__( '1300px', 'kvell' ),
					'edgtf-grid-1200' => esc_html__( '1200px', 'kvell' ),
					'edgtf-grid-1000' => esc_html__( '1000px', 'kvell' ),
					'edgtf-grid-800'  => esc_html__( '800px', 'kvell' )
				)
			)
		);
		
		/***************** Content Width Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'kvell' ),
				'parent'        => $general_meta_box,
				'options'       => kvell_edge_get_yes_no_select_array()
			)
		);
		
			$page_transitions_container_meta = kvell_edge_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'page_transitions_container_meta',
					'dependency' => array(
						'hide' => array(
							'edgtf_smooth_page_transitions_meta'  => array('','no')
						)
					)
				)
			);
		
				kvell_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'kvell' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'kvell' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => kvell_edge_get_yes_no_select_array()
					)
				);
				
				$page_transition_preloader_container_meta = kvell_edge_add_admin_container(
					array(
						'parent'          => $page_transitions_container_meta,
						'name'            => 'page_transition_preloader_container_meta',
						'dependency' => array(
							'hide' => array(
								'edgtf_page_transition_preloader_meta'  => array('','no')
							)
						)
					)
				);
				
					kvell_edge_add_meta_box_field(
						array(
							'name'   => 'edgtf_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'kvell' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = kvell_edge_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'kvell' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'kvell' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = kvell_edge_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					kvell_edge_add_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'edgtf_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'kvell' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'kvell' ),
								'kvell_loader'        	=> esc_html__( 'Kvell Loader', 'kvell' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'kvell' ),
								'pulse'                 => esc_html__( 'Pulse', 'kvell' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'kvell' ),
								'cube'                  => esc_html__( 'Cube', 'kvell' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'kvell' ),
								'stripes'               => esc_html__( 'Stripes', 'kvell' ),
								'wave'                  => esc_html__( 'Wave', 'kvell' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'kvell' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'kvell' ),
								'atom'                  => esc_html__( 'Atom', 'kvell' ),
								'clock'                 => esc_html__( 'Clock', 'kvell' ),
								'mitosis'               => esc_html__( 'Mitosis', 'kvell' ),
								'lines'                 => esc_html__( 'Lines', 'kvell' ),
								'fussion'               => esc_html__( 'Fussion', 'kvell' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'kvell' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'kvell' )
							)
						)
					);
					
					kvell_edge_add_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'edgtf_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'kvell' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);
					
					kvell_edge_add_meta_box_field(
						array(
							'name'        => 'edgtf_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'kvell' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'kvell' ),
							'options'     => kvell_edge_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'kvell' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'kvell' ),
				'parent'      => $general_meta_box,
				'options'     => kvell_edge_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'kvell_edge_meta_boxes_map', 'kvell_edge_map_general_meta', 10 );
}