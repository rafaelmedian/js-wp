<?php

if ( ! function_exists( 'kvell_edge_woocommerce_options_map' ) ) {
	
	/**
	 * Add Woocommerce options page
	 */
	function kvell_edge_woocommerce_options_map() {
		
		kvell_edge_add_admin_page(
			array(
				'slug'  => '_woocommerce_page',
				'title' => esc_html__( 'Woocommerce', 'kvell' ),
				'icon'  => 'fa fa-shopping-cart'
			)
		);
		
		/**
		 * Product List Settings
		 */
		$panel_product_list = kvell_edge_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_product_list',
				'title' => esc_html__( 'Product List', 'kvell' )
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'edgtf_woo_product_list_columns',
				'label'         => esc_html__( 'Product List Columns', 'kvell' ),
				'default_value' => 'edgtf-woocommerce-columns-2',
				'description'   => esc_html__( 'Choose number of columns for main shop page', 'kvell' ),
				'options'       => array(
                    'edgtf-woocommerce-columns-2' => esc_html__( '2 Columns', 'kvell' ),
					'edgtf-woocommerce-columns-3' => esc_html__( '3 Columns', 'kvell' ),
					'edgtf-woocommerce-columns-4' => esc_html__( '4 Columns', 'kvell' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'edgtf_woo_product_list_columns_space',
				'label'         => esc_html__( 'Space Between Items', 'kvell' ),
				'description'   => esc_html__( 'Select space between items for product listing and related products on single product', 'kvell' ),
				'default_value' => 'normal',
				'options'       => kvell_edge_get_space_between_items_array(),
				'parent'        => $panel_product_list,
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'edgtf_woo_product_list_info_position',
				'label'         => esc_html__( 'Product Info Position', 'kvell' ),
				'default_value' => 'info_below_image',
				'description'   => esc_html__( 'Select product info position for product listing and related products on single product', 'kvell' ),
				'options'       => array(
					'info_below_image'    => esc_html__( 'Info Below Image', 'kvell' ),
					'info_on_image_hover' => esc_html__( 'Info On Image Hover', 'kvell' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'edgtf_woo_products_per_page',
				'label'         => esc_html__( 'Number of products per page', 'kvell' ),
				'description'   => esc_html__( 'Set number of products on shop page', 'kvell' ),
				'parent'        => $panel_product_list,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'edgtf_products_list_title_tag',
				'label'         => esc_html__( 'Products Title Tag', 'kvell' ),
				'default_value' => 'h4',
				'options'       => kvell_edge_get_title_tag(),
				'parent'        => $panel_product_list,
			)
		);
		
		/**
		 * Single Product Settings
		 */
		$panel_single_product = kvell_edge_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_single_product',
				'title' => esc_html__( 'Single Product', 'kvell' )
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_woo',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'kvell' ),
				'parent'        => $panel_single_product,
				'options'       => kvell_edge_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'edgtf_single_product_title_tag',
				'default_value' => 'h3',
				'label'         => esc_html__( 'Single Product Title Tag', 'kvell' ),
				'options'       => kvell_edge_get_title_tag(),
				'parent'        => $panel_single_product,
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_number_of_thumb_images',
				'default_value' => '3',
				'label'         => esc_html__( 'Number of Thumbnail Images per Row', 'kvell' ),
				'options'       => array(
					'4' => esc_html__( 'Four', 'kvell' ),
					'3' => esc_html__( 'Three', 'kvell' ),
					'2' => esc_html__( 'Two', 'kvell' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_thumb_images_position',
				'default_value' => 'below-image',
				'label'         => esc_html__( 'Set Thumbnail Images Position', 'kvell' ),
				'options'       => array(
					'below-image'  => esc_html__( 'Below Featured Image', 'kvell' ),
					'on-left-side' => esc_html__( 'On The Left Side Of Featured Image', 'kvell' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_enable_single_product_zoom_image',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Zoom Maginfier', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will show magnifier image on featured image hover', 'kvell' ),
				'parent'        => $panel_single_product,
				'options'       => kvell_edge_get_yes_no_select_array( false ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_single_images_behavior',
				'default_value' => 'pretty-photo',
				'label'         => esc_html__( 'Set Images Behavior', 'kvell' ),
				'options'       => array(
					'pretty-photo' => esc_html__( 'Pretty Photo Lightbox', 'kvell' ),
					'photo-swipe'  => esc_html__( 'Photo Swipe Lightbox', 'kvell' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'edgtf_woo_related_products_columns',
				'label'         => esc_html__( 'Related Products Columns', 'kvell' ),
				'default_value' => 'edgtf-woocommerce-columns-3',
				'description'   => esc_html__( 'Choose number of columns for related products on single product page', 'kvell' ),
				'options'       => array(
					'edgtf-woocommerce-columns-3' => esc_html__( '3 Columns', 'kvell' ),
					'edgtf-woocommerce-columns-4' => esc_html__( '4 Columns', 'kvell' )
				),
				'parent'        => $panel_single_product,
			)
		);

		do_action('kvell_edge_woocommerce_additional_options_map');
	}
	
	add_action( 'kvell_edge_options_map', 'kvell_edge_woocommerce_options_map', 21 );
}