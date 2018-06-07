<?php

if ( ! function_exists( 'kvell_edge_map_woocommerce_meta' ) ) {
	function kvell_edge_map_woocommerce_meta() {
		
		$woocommerce_meta_box = kvell_edge_add_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'kvell' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'kvell' ),
				'description' => esc_html__( 'Choose image layout when it appears in Edge Product List - Masonry layout shortcode', 'kvell' ),
				'options'     => array(
					''                   => esc_html__( 'Default', 'kvell' ),
					'small'              => esc_html__( 'Small', 'kvell' ),
					'large-width'        => esc_html__( 'Large Width', 'kvell' ),
					'large-height'       => esc_html__( 'Large Height', 'kvell' ),
					'large-width-height' => esc_html__( 'Large Width Height', 'kvell' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'kvell' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'kvell' ),
				'options'       => kvell_edge_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		kvell_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'kvell' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'kvell_edge_meta_boxes_map', 'kvell_edge_map_woocommerce_meta', 99 );
}