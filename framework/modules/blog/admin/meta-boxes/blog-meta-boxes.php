<?php

foreach ( glob( EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'kvell_edge_map_blog_meta' ) ) {
	function kvell_edge_map_blog_meta() {
		$edgtf_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$edgtf_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = kvell_edge_add_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'kvell' ),
				'name'  => 'blog_meta'
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'kvell' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'kvell' ),
				'parent'      => $blog_meta_box,
				'options'     => $edgtf_blog_categories
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'kvell' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'kvell' ),
				'parent'      => $blog_meta_box,
				'options'     => $edgtf_blog_categories,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'kvell' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'kvell' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'kvell' ),
					'in-grid'    => esc_html__( 'In Grid', 'kvell' ),
					'full-width' => esc_html__( 'Full Width', 'kvell' )
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'kvell' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'kvell' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''      => esc_html__( 'Default', 'kvell' ),
					'two'   => esc_html__( '2 Columns', 'kvell' ),
					'three' => esc_html__( '3 Columns', 'kvell' ),
					'four'  => esc_html__( '4 Columns', 'kvell' ),
					'five'  => esc_html__( '5 Columns', 'kvell' )
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'kvell' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'kvell' ),
				'options'     => kvell_edge_get_space_between_items_array( true ),
				'parent'      => $blog_meta_box
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'kvell' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'kvell' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'kvell' ),
					'fixed'    => esc_html__( 'Fixed', 'kvell' ),
					'original' => esc_html__( 'Original', 'kvell' )
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'kvell' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'kvell' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'kvell' ),
					'standard'        => esc_html__( 'Standard', 'kvell' ),
					'load-more'       => esc_html__( 'Load More', 'kvell' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'kvell' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'kvell' )
				)
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'edgtf_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'kvell' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'kvell' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'kvell_edge_meta_boxes_map', 'kvell_edge_map_blog_meta', 30 );
}