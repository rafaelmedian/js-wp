<?php

if ( ! function_exists( 'kvell_edge_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function kvell_edge_reset_options_map() {
		
		kvell_edge_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'kvell' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = kvell_edge_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'kvell' )
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'kvell' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'kvell' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'kvell_edge_options_map', 'kvell_edge_reset_options_map', 100 );
}