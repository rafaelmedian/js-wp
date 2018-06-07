<?php

if ( ! function_exists( 'kvell_edge_logo_options_map' ) ) {
	function kvell_edge_logo_options_map() {
		
		kvell_edge_add_admin_page(
			array(
				'slug'  => '_logo_page',
				'title' => esc_html__( 'Logo', 'kvell' ),
				'icon'  => 'fa fa-coffee'
			)
		);
		
		$panel_logo = kvell_edge_add_admin_panel(
			array(
				'page'  => '_logo_page',
				'name'  => 'panel_logo',
				'title' => esc_html__( 'Logo', 'kvell' )
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Logo', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will hide logo image', 'kvell' )
			)
		);
		
		$hide_logo_container = kvell_edge_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'dependency' => array(
					'hide' => array(
						'hide_logo'  => 'yes'
					)
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Default', 'kvell' ),
				'parent'        => $hide_logo_container
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Dark', 'kvell' ),
				'parent'        => $hide_logo_container
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo_white.png",
				'label'         => esc_html__( 'Logo Image - Light', 'kvell' ),
				'parent'        => $hide_logo_container
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Sticky', 'kvell' ),
				'parent'        => $hide_logo_container
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Mobile', 'kvell' ),
				'parent'        => $hide_logo_container
			)
		);
	}
	
	add_action( 'kvell_edge_options_map', 'kvell_edge_logo_options_map', 2 );
}