<?php

if ( ! function_exists( 'dessau_select_social_options_map' ) ) {
	function dessau_select_social_options_map() {

	    $page = '_social_page';
		
		dessau_select_add_admin_page(
			array(
				'slug'  => '_social_page',
				'title' => esc_html__( 'Social Networks', 'dessau' ),
				'icon'  => 'fa fa-share-alt'
			)
		);
		
		/**
		 * Enable Social Share
		 */
		$panel_social_share = dessau_select_add_admin_panel(
			array(
				'page'  => '_social_page',
				'name'  => 'panel_social_share',
				'title' => esc_html__( 'Enable Social Share', 'dessau' )
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Social Share', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will allow social share on networks of your choice', 'dessau' ),
				'parent'        => $panel_social_share
			)
		);
		
		$panel_show_social_share_on = dessau_select_add_admin_panel(
			array(
				'page'            => '_social_page',
				'name'            => 'panel_show_social_share_on',
				'title'           => esc_html__( 'Show Social Share On', 'dessau' ),
				'dependency' => array(
					'show' => array(
						'enable_social_share'  => 'yes'
					)
				)
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share_on_post',
				'default_value' => 'no',
				'label'         => esc_html__( 'Posts', 'dessau' ),
				'description'   => esc_html__( 'Show Social Share on Blog Posts', 'dessau' ),
				'parent'        => $panel_show_social_share_on
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share_on_page',
				'default_value' => 'no',
				'label'         => esc_html__( 'Pages', 'dessau' ),
				'description'   => esc_html__( 'Show Social Share on Pages', 'dessau' ),
				'parent'        => $panel_show_social_share_on
			)
		);

        /**
         * Action for embedding social share option for custom post types
         */
		do_action('dessau_select_post_types_social_share', $panel_show_social_share_on);
		
		/**
		 * Social Share Networks
		 */
		$panel_social_networks = dessau_select_add_admin_panel(
			array(
				'page'            => '_social_page',
				'name'            => 'panel_social_networks',
				'title'           => esc_html__( 'Social Networks', 'dessau' ),
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
		dessau_select_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'facebook_title',
				'title'  => esc_html__( 'Share on Facebook', 'dessau' )
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_facebook_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Facebook', 'dessau' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_facebook_share_container = dessau_select_add_admin_container(
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
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'facebook_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'dessau' ),
				'parent'        => $enable_facebook_share_container
			)
		);
		
		/**
		 * Twitter
		 */
		dessau_select_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'twitter_title',
				'title'  => esc_html__( 'Share on Twitter', 'dessau' )
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_twitter_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Twitter', 'dessau' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_twitter_share_container = dessau_select_add_admin_container(
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
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'twitter_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'dessau' ),
				'parent'        => $enable_twitter_share_container
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'twitter_via',
				'default_value' => '',
				'label'         => esc_html__( 'Via', 'dessau' ),
				'parent'        => $enable_twitter_share_container
			)
		);
		
		/**
		 * Linked In
		 */
		dessau_select_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'linkedin_title',
				'title'  => esc_html__( 'Share on LinkedIn', 'dessau' )
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_linkedin_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via LinkedIn', 'dessau' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_linkedin_container = dessau_select_add_admin_container(
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
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'linkedin_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'dessau' ),
				'parent'        => $enable_linkedin_container
			)
		);
		
		/**
		 * Tumblr
		 */
		dessau_select_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'tumblr_title',
				'title'  => esc_html__( 'Share on Tumblr', 'dessau' )
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_tumblr_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Tumblr', 'dessau' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_tumblr_container = dessau_select_add_admin_container(
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
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'tumblr_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'dessau' ),
				'parent'        => $enable_tumblr_container
			)
		);
		
		/**
		 * Pinterest
		 */
		dessau_select_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'pinterest_title',
				'title'  => esc_html__( 'Share on Pinterest', 'dessau' )
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_pinterest_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Pinterest', 'dessau' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_pinterest_container = dessau_select_add_admin_container(
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
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'pinterest_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'dessau' ),
				'parent'        => $enable_pinterest_container
			)
		);
		
		/**
		 * VK
		 */
		dessau_select_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'vk_title',
				'title'  => esc_html__( 'Share on VK', 'dessau' )
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_vk_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via VK', 'dessau' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_vk_container = dessau_select_add_admin_container(
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
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'vk_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'dessau' ),
				'parent'        => $enable_vk_container
			)
		);
		
		if ( defined( 'DESSAU_TWITTER_FEED_VERSION' ) ) {
			$twitter_panel = dessau_select_add_admin_panel(
				array(
					'title' => esc_html__( 'Twitter', 'dessau' ),
					'name'  => 'panel_twitter',
					'page'  => '_social_page'
				)
			);
			
			dessau_select_add_admin_twitter_button(
				array(
					'name'   => 'twitter_button',
					'parent' => $twitter_panel
				)
			);
		}
		
		if ( defined( 'DESSAU_INSTAGRAM_FEED_VERSION' ) ) {
			$instagram_panel = dessau_select_add_admin_panel(
				array(
					'title' => esc_html__( 'Instagram', 'dessau' ),
					'name'  => 'panel_instagram',
					'page'  => '_social_page'
				)
			);
			
			dessau_select_add_admin_instagram_button(
				array(
					'name'   => 'instagram_button',
					'parent' => $instagram_panel
				)
			);
		}
		
		/**
		 * Open Graph
		 */
		$panel_open_graph = dessau_select_add_admin_panel(
			array(
				'page'  => '_social_page',
				'name'  => 'panel_open_graph',
				'title' => esc_html__( 'Open Graph', 'dessau' ),
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_open_graph',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Open Graph', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will allow usage of Open Graph protocol on your site', 'dessau' ),
				'parent'        => $panel_open_graph
			)
		);
		
		$enable_open_graph_container = dessau_select_add_admin_container(
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
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'open_graph_image',
				'default_value' => SELECT_ASSETS_ROOT . '/img/open_graph.jpg',
				'label'         => esc_html__( 'Default Share Image', 'dessau' ),
				'parent'        => $enable_open_graph_container,
				'description'   => esc_html__( 'Used when featured image is not set. Make sure that image is at least 1200 x 630 pixels, up to 8MB in size', 'dessau' ),
			)
		);

        /**
         * Action for embedding social share option for custom post types
         */
        do_action('dessau_select_social_options', $page);
	}
	
	add_action( 'dessau_select_options_map', 'dessau_select_social_options_map', 18 );
}