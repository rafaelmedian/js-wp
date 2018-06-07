<?php

/*** Post Settings ***/

if ( ! function_exists( 'kvell_edge_map_post_meta' ) ) {
	function kvell_edge_map_post_meta() {
		
		$post_meta_box = kvell_edge_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'kvell' ),
				'name'  => 'post-meta'
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'kvell' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'kvell' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
                'options'       => kvell_edge_get_custom_sidebars_options( true )
			)
		);
		
		$kvell_custom_sidebars = kvell_edge_get_custom_sidebars();
		if ( count( $kvell_custom_sidebars ) > 0 ) {
			kvell_edge_add_meta_box_field( array(
				'name'        => 'edgtf_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'kvell' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'kvell' ),
				'parent'      => $post_meta_box,
				'options'     => kvell_edge_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'kvell' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'kvell' ),
				'parent'      => $post_meta_box
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_blog_masonry_gallery_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Fixed Proportion', 'kvell' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in fixed proportion', 'kvell' ),
				'default_value' => 'small',
				'parent'        => $post_meta_box,
				'options'       => array(
					'small'              => esc_html__( 'Small', 'kvell' ),
					'large-width'        => esc_html__( 'Large Width', 'kvell' ),
					'large-height'       => esc_html__( 'Large Height', 'kvell' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'kvell' )
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_blog_masonry_gallery_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Original Proportion', 'kvell' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in original proportion', 'kvell' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'kvell' ),
					'large-width' => esc_html__( 'Large Width', 'kvell' )
				)
			)
		);

        kvell_edge_add_meta_box_field(
            array(
                'name'          => 'edgtf_blog_category_predefined_background_meta',
                'type'          => 'select',
                'label'         => esc_html__('Category Predefined Background Colors', 'kvell'),
                'description'   => esc_html__('Choose predefined background colors for single post categories when boxed categories option is enabled.', 'kvell'),
                'default_value' => '',
                'parent'        => $post_meta_box,
                'options'       => array(
                    ''             => esc_html__('Default', 'kvell'),
                    'first-color'  => esc_html__('First Predefined Color', 'kvell'),
                    'second-color' => esc_html__('Second Predefined Color', 'kvell'),
                    'third-color'  => esc_html__('Third Predefined Color', 'kvell'),
                )
            )
        );
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'kvell' ),
				'parent'        => $post_meta_box,
				'options'       => kvell_edge_get_yes_no_select_array()
			)
		);

		do_action('kvell_edge_blog_post_meta', $post_meta_box);
	}
	
	add_action( 'kvell_edge_meta_boxes_map', 'kvell_edge_map_post_meta', 20 );
}
