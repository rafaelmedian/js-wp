<?php

if ( ! function_exists( 'kvell_edge_get_blog_list_types_options' ) ) {
	function kvell_edge_get_blog_list_types_options() {
		$blog_list_type_options = apply_filters( 'kvell_edge_blog_list_type_global_option', $blog_list_type_options = array() );
		
		return $blog_list_type_options;
	}
}

if ( ! function_exists( 'kvell_edge_blog_options_map' ) ) {
	function kvell_edge_blog_options_map() {
		$blog_list_type_options = kvell_edge_get_blog_list_types_options();
		
		kvell_edge_add_admin_page(
			array(
				'slug'  => '_blog_page',
				'title' => esc_html__( 'Blog', 'kvell' ),
				'icon'  => 'fa fa-files-o'
			)
		);
		
		/**
		 * Blog Lists
		 */
		$panel_blog_lists = kvell_edge_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_lists',
				'title' => esc_html__( 'Blog Lists', 'kvell' )
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'name'          => 'blog_list_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Blog Layout for Archive Pages', 'kvell' ),
				'description'   => esc_html__( 'Choose a default blog layout for archived blog post lists', 'kvell' ),
				'default_value' => 'standard',
				'parent'        => $panel_blog_lists,
				'options'       => $blog_list_type_options
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'name'          => 'archive_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout for Archive Pages', 'kvell' ),
				'description'   => esc_html__( 'Choose a sidebar layout for archived blog post lists', 'kvell' ),
				'default_value' => '',
				'parent'        => $panel_blog_lists,
                'options'       => kvell_edge_get_custom_sidebars_options(),
			)
		);
		
		$kvell_custom_sidebars = kvell_edge_get_custom_sidebars();
		if ( count( $kvell_custom_sidebars ) > 0 ) {
			kvell_edge_add_admin_field(
				array(
					'name'        => 'archive_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display for Archive Pages', 'kvell' ),
					'description' => esc_html__( 'Choose a sidebar to display on archived blog post lists. Default sidebar is "Sidebar Page"', 'kvell' ),
					'parent'      => $panel_blog_lists,
					'options'     => kvell_edge_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		kvell_edge_add_admin_field(
			array(
				'name'          => 'blog_masonry_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Layout', 'kvell' ),
				'default_value' => 'in-grid',
				'description'   => esc_html__( 'Set masonry layout. Default is in grid.', 'kvell' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'in-grid'    => esc_html__( 'In Grid', 'kvell' ),
					'full-width' => esc_html__( 'Full Width', 'kvell' )
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'name'          => 'blog_masonry_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Number of Columns', 'kvell' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for your masonry blog lists. Default value is 4 columns', 'kvell' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'two'   => esc_html__( '2 Columns', 'kvell' ),
					'three' => esc_html__( '3 Columns', 'kvell' ),
					'four'  => esc_html__( '4 Columns', 'kvell' ),
					'five'  => esc_html__( '5 Columns', 'kvell' )
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'name'          => 'blog_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Space Between Items', 'kvell' ),
				'description'   => esc_html__( 'Set space size between posts for your masonry blog lists. Default value is normal', 'kvell' ),
				'default_value' => 'normal',
				'options'       => kvell_edge_get_space_between_items_array(),
				'parent'        => $panel_blog_lists
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'name'          => 'blog_list_featured_image_proportion',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'kvell' ),
				'default_value' => 'fixed',
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'kvell' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'fixed'    => esc_html__( 'Fixed', 'kvell' ),
					'original' => esc_html__( 'Original', 'kvell' )
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'name'          => 'blog_pagination_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'kvell' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'kvell' ),
				'parent'        => $panel_blog_lists,
				'default_value' => 'standard',
				'options'       => array(
					'standard'        => esc_html__( 'Standard', 'kvell' ),
					'load-more'       => esc_html__( 'Load More', 'kvell' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'kvell' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'kvell' )
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'number_of_chars',
				'default_value' => '40',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'kvell' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'kvell' ),
				'parent'        => $panel_blog_lists,
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_tags_area_blog',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Blog Tags on Standard List', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will show tags on standard blog list', 'kvell' ),
				'parent'        => $panel_blog_lists
			)
		);

        kvell_edge_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'show_category_in_box_blog',
                'default_value' => 'no',
                'label'         => esc_html__( 'Show Category in a Box', 'kvell' ),
                'description'   => esc_html__( 'Enabling this option will display a catehory in a box on standard blog list and blog single posts.', 'kvell' ),
                'parent'        => $panel_blog_lists
            )
        );
		
		/**
		 * Blog Single
		 */
		$panel_blog_single = kvell_edge_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_single',
				'title' => esc_html__( 'Blog Single', 'kvell' )
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'name'          => 'blog_single_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'kvell' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog Single pages', 'kvell' ),
				'default_value' => '',
				'parent'        => $panel_blog_single,
                'options'       => kvell_edge_get_custom_sidebars_options()
			)
		);
		
		if ( count( $kvell_custom_sidebars ) > 0 ) {
			kvell_edge_add_admin_field(
				array(
					'name'        => 'blog_single_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'kvell' ),
					'description' => esc_html__( 'Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'kvell' ),
					'parent'      => $panel_blog_single,
					'options'     => kvell_edge_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_blog',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'kvell' ),
				'parent'        => $panel_blog_single,
				'options'       => kvell_edge_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'name'          => 'blog_single_title_in_title_area',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Post Title in Title Area', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will show post title in title area on single post pages', 'kvell' ),
				'parent'        => $panel_blog_single,
				'dependency' => array(
					'hide' => array(
						'show_title_area_blog' => 'no'
					)
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'name'          => 'blog_single_related_posts',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Related Posts', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will show related posts on single post pages', 'kvell' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'name'          => 'blog_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments Form', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will show comments form on single post pages', 'kvell' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_navigation',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Prev/Next Single Post Navigation Links', 'kvell' ),
				'description'   => esc_html__( 'Enable navigation links through the blog posts (left and right arrows will appear)', 'kvell' ),
				'parent'        => $panel_blog_single
			)
		);
		
		$blog_single_navigation_container = kvell_edge_add_admin_container(
			array(
				'name'            => 'edgtf_blog_single_navigation_container',
				'parent'          => $panel_blog_single,
				'dependency' => array(
					'show' => array(
						'blog_single_navigation' => 'yes'
					)
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Navigation Only in Current Category', 'kvell' ),
				'description'   => esc_html__( 'Limit your navigation only through current category', 'kvell' ),
				'parent'        => $blog_single_navigation_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Info Box', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will display author name and descriptions on single post pages', 'kvell' ),
				'parent'        => $panel_blog_single
			)
		);
		
		$blog_single_author_info_container = kvell_edge_add_admin_container(
			array(
				'name'            => 'edgtf_blog_single_author_info_container',
				'parent'          => $panel_blog_single,
				'dependency' => array(
					'show' => array(
						'blog_author_info' => 'yes'
					)
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info_email',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Author Email', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will show author email', 'kvell' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Social Icons', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will show author social icons on single post pages', 'kvell' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		do_action( 'kvell_edge_blog_single_options_map', $panel_blog_single );
	}
	
	add_action( 'kvell_edge_options_map', 'kvell_edge_blog_options_map', 13 );
}