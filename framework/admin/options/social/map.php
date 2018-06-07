<?php

if ( ! function_exists( 'kvell_edge_social_options_map' ) ) {
	function kvell_edge_social_options_map() {

	    $page = '_social_page';
		
		kvell_edge_add_admin_page(
			array(
				'slug'  => '_social_page',
				'title' => esc_html__( 'Social Networks', 'kvell' ),
				'icon'  => 'fa fa-share-alt'
			)
		);
		
		/**
		 * Enable Social Share
		 */
		$panel_social_share = kvell_edge_add_admin_panel(
			array(
				'page'  => '_social_page',
				'name'  => 'panel_social_share',
				'title' => esc_html__( 'Enable Social Share', 'kvell' )
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Social Share', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will allow social share on networks of your choice', 'kvell' ),
				'parent'        => $panel_social_share
			)
		);
		
		$panel_show_social_share_on = kvell_edge_add_admin_panel(
			array(
				'page'            => '_social_page',
				'name'            => 'panel_show_social_share_on',
				'title'           => esc_html__( 'Show Social Share On', 'kvell' ),
				'dependency' => array(
					'show' => array(
						'enable_social_share'  => 'yes'
					)
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share_on_post',
				'default_value' => 'no',
				'label'         => esc_html__( 'Posts', 'kvell' ),
				'description'   => esc_html__( 'Show Social Share on Blog Posts', 'kvell' ),
				'parent'        => $panel_show_social_share_on
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share_on_page',
				'default_value' => 'no',
				'label'         => esc_html__( 'Pages', 'kvell' ),
				'description'   => esc_html__( 'Show Social Share on Pages', 'kvell' ),
				'parent'        => $panel_show_social_share_on
			)
		);

        /**
         * Action for embedding social share option for custom post types
         */
		do_action('kvell_edge_post_types_social_share', $panel_show_social_share_on);
		
		/**
		 * Social Share Networks
		 */
		$panel_social_networks = kvell_edge_add_admin_panel(
			array(
				'page'            => '_social_page',
				'name'            => 'panel_social_networks',
				'title'           => esc_html__( 'Social Networks', 'kvell' ),
				'dependency' => array(
					'hide' => array(
						'enable_social_share'  => 'no'
					)
				)
			)
		);
		
		/**
		 * Facebook
		 */
		kvell_edge_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'facebook_title',
				'title'  => esc_html__( 'Share on Facebook', 'kvell' )
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_facebook_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Facebook', 'kvell' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_facebook_share_container = kvell_edge_add_admin_container(
			array(
				'name'            => 'enable_facebook_share_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_facebook_share'  => 'yes'
					)
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'facebook_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'kvell' ),
				'parent'        => $enable_facebook_share_container
			)
		);
		
		/**
		 * Twitter
		 */
		kvell_edge_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'twitter_title',
				'title'  => esc_html__( 'Share on Twitter', 'kvell' )
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_twitter_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Twitter', 'kvell' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_twitter_share_container = kvell_edge_add_admin_container(
			array(
				'name'            => 'enable_twitter_share_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_twitter_share'  => 'yes'
					)
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'twitter_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'kvell' ),
				'parent'        => $enable_twitter_share_container
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'twitter_via',
				'default_value' => '',
				'label'         => esc_html__( 'Via', 'kvell' ),
				'parent'        => $enable_twitter_share_container
			)
		);
		
		/**
		 * Google Plus
		 */
		kvell_edge_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'google_plus_title',
				'title'  => esc_html__( 'Share on Google Plus', 'kvell' )
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_google_plus_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Google Plus', 'kvell' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_google_plus_container = kvell_edge_add_admin_container(
			array(
				'name'            => 'enable_google_plus_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_google_plus_share'  => 'yes'
					)
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'google_plus_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'kvell' ),
				'parent'        => $enable_google_plus_container
			)
		);
		
		/**
		 * Linked In
		 */
		kvell_edge_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'linkedin_title',
				'title'  => esc_html__( 'Share on LinkedIn', 'kvell' )
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_linkedin_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via LinkedIn', 'kvell' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_linkedin_container = kvell_edge_add_admin_container(
			array(
				'name'            => 'enable_linkedin_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_linkedin_share'  => 'yes'
					)
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'linkedin_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'kvell' ),
				'parent'        => $enable_linkedin_container
			)
		);
		
		/**
		 * Tumblr
		 */
		kvell_edge_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'tumblr_title',
				'title'  => esc_html__( 'Share on Tumblr', 'kvell' )
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_tumblr_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Tumblr', 'kvell' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_tumblr_container = kvell_edge_add_admin_container(
			array(
				'name'            => 'enable_tumblr_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_tumblr_share'  => 'yes'
					)
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'tumblr_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'kvell' ),
				'parent'        => $enable_tumblr_container
			)
		);
		
		/**
		 * Pinterest
		 */
		kvell_edge_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'pinterest_title',
				'title'  => esc_html__( 'Share on Pinterest', 'kvell' )
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_pinterest_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Pinterest', 'kvell' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_pinterest_container = kvell_edge_add_admin_container(
			array(
				'name'            => 'enable_pinterest_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_pinterest_share'  => 'yes'
					)
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'pinterest_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'kvell' ),
				'parent'        => $enable_pinterest_container
			)
		);
		
		/**
		 * VK
		 */
		kvell_edge_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'vk_title',
				'title'  => esc_html__( 'Share on VK', 'kvell' )
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_vk_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via VK', 'kvell' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_vk_container = kvell_edge_add_admin_container(
			array(
				'name'            => 'enable_vk_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_vk_share'  => 'yes'
					)
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'vk_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'kvell' ),
				'parent'        => $enable_vk_container
			)
		);
		
		if ( defined( 'KVELL_TWITTER_FEED_VERSION' ) ) {
			$twitter_panel = kvell_edge_add_admin_panel(
				array(
					'title' => esc_html__( 'Twitter', 'kvell' ),
					'name'  => 'panel_twitter',
					'page'  => '_social_page'
				)
			);
			
			kvell_edge_add_admin_twitter_button(
				array(
					'name'   => 'twitter_button',
					'parent' => $twitter_panel
				)
			);
		}
		
		if ( defined( 'KVELL_INSTAGRAM_FEED_VERSION' ) ) {
			$instagram_panel = kvell_edge_add_admin_panel(
				array(
					'title' => esc_html__( 'Instagram', 'kvell' ),
					'name'  => 'panel_instagram',
					'page'  => '_social_page'
				)
			);
			
			kvell_edge_add_admin_instagram_button(
				array(
					'name'   => 'instagram_button',
					'parent' => $instagram_panel
				)
			);
		}
		
		/**
		 * Open Graph
		 */
		$panel_open_graph = kvell_edge_add_admin_panel(
			array(
				'page'  => '_social_page',
				'name'  => 'panel_open_graph',
				'title' => esc_html__( 'Open Graph', 'kvell' ),
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_open_graph',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Open Graph', 'kvell' ),
				'description'   => esc_html__( 'Enabling this option will allow usage of Open Graph protocol on your site', 'kvell' ),
				'parent'        => $panel_open_graph
			)
		);
		
		$enable_open_graph_container = kvell_edge_add_admin_container(
			array(
				'name'            => 'enable_open_graph_container',
				'parent'          => $panel_open_graph,
				'dependency' => array(
					'show' => array(
						'enable_open_graph'  => 'yes'
					)
				)
			)
		);
		
		kvell_edge_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'open_graph_image',
				'default_value' => EDGE_ASSETS_ROOT . '/img/open_graph.jpg',
				'label'         => esc_html__( 'Default Share Image', 'kvell' ),
				'parent'        => $enable_open_graph_container,
				'description'   => esc_html__( 'Used when featured image is not set. Make sure that image is at least 1200 x 630 pixels, up to 8MB in size', 'kvell' ),
			)
		);

        /**
         * Action for embedding social share option for custom post types
         */
        do_action('kvell_edge_social_options', $page);
	}
	
	add_action( 'kvell_edge_options_map', 'kvell_edge_social_options_map', 18 );
}