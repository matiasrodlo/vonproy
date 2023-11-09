<?php

if ( ! function_exists( 'dessau_select_portfolio_options_map' ) ) {
	function dessau_select_portfolio_options_map() {
		
		dessau_select_add_admin_page(
			array(
				'slug'  => '_portfolio',
				'title' => esc_html__( 'Portfolio', 'dessau-core' ),
				'icon'  => 'fa fa-camera-retro'
			)
		);
		
		$panel_archive = dessau_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Archive', 'dessau-core' ),
				'name'  => 'panel_portfolio_archive',
				'page'  => '_portfolio'
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'        => 'portfolio_archive_number_of_items',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Items', 'dessau-core' ),
				'description' => esc_html__( 'Set number of items for your portfolio list on archive pages. Default value is 12', 'dessau-core' ),
				'parent'      => $panel_archive,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'portfolio_archive_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'dessau-core' ),
				'default_value' => 'four',
				'description'   => esc_html__( 'Set number of columns for your portfolio list on archive pages. Default value is Four columns', 'dessau-core' ),
				'parent'        => $panel_archive,
				'options'       => dessau_select_get_number_of_columns_array( false, array( 'one', 'six' ) )
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'portfolio_archive_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'dessau-core' ),
				'description'   => esc_html__( 'Set space size between portfolio items for your portfolio list on archive pages. Default value is normal', 'dessau-core' ),
				'default_value' => 'normal',
				'options'       => dessau_select_get_space_between_items_array(),
				'parent'        => $panel_archive
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'portfolio_archive_image_size',
				'type'          => 'select',
				'label'         => esc_html__( 'Image Proportions', 'dessau-core' ),
				'default_value' => 'landscape',
				'description'   => esc_html__( 'Set image proportions for your portfolio list on archive pages. Default value is landscape', 'dessau-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'full'      => esc_html__( 'Original', 'dessau-core' ),
					'landscape' => esc_html__( 'Landscape', 'dessau-core' ),
					'portrait'  => esc_html__( 'Portrait', 'dessau-core' ),
					'square'    => esc_html__( 'Square', 'dessau-core' )
				)
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'portfolio_archive_item_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Item Style', 'dessau-core' ),
				'default_value' => 'standard-lift',
				'description'   => esc_html__( 'Set item style for your portfolio list on archive pages. Default value is Standard - Lift', 'dessau-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'standard-lift' => esc_html__( 'Standard - Lift', 'dessau-core' ),
					'gallery-overlay' => esc_html__( 'Gallery - Overlay', 'dessau-core' )
				)
			)
		);
		
		$panel = dessau_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Single', 'dessau-core' ),
				'name'  => 'panel_portfolio_single',
				'page'  => '_portfolio'
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_template',
				'type'          => 'select',
				'label'         => esc_html__( 'Portfolio Type', 'dessau-core' ),
				'default_value' => 'small-images',
				'description'   => esc_html__( 'Choose a default type for Single Project pages', 'dessau-core' ),
				'parent'        => $panel,
				'options'       => array(
					'huge-images'       => esc_html__( 'Portfolio Full Width Images', 'dessau-core' ),
					'images'            => esc_html__( 'Portfolio Images', 'dessau-core' ),
					'small-images'      => esc_html__( 'Portfolio Small Images', 'dessau-core' ),
					'slider'            => esc_html__( 'Portfolio Slider', 'dessau-core' ),
					'small-slider'      => esc_html__( 'Portfolio Small Slider', 'dessau-core' ),
					'gallery'           => esc_html__( 'Portfolio Gallery', 'dessau-core' ),
					'small-gallery'     => esc_html__( 'Portfolio Small Gallery', 'dessau-core' ),
					'masonry'           => esc_html__( 'Portfolio Masonry', 'dessau-core' ),
					'small-masonry'     => esc_html__( 'Portfolio Small Masonry', 'dessau-core' ),
					'custom'            => esc_html__( 'Portfolio Custom', 'dessau-core' ),
					'full-width-custom' => esc_html__( 'Portfolio Full Width Custom', 'dessau-core' )
				)
			)
		);
		
		/***************** Gallery Layout *****************/
		
		$portfolio_gallery_container = dessau_select_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_gallery_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'dessau-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'dessau-core' ),
				'parent'        => $portfolio_gallery_container,
				'options'       => dessau_select_get_number_of_columns_array( false, array( 'one', 'five', 'six' ) )
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'dessau-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'dessau-core' ),
				'default_value' => 'normal',
				'options'       => dessau_select_get_space_between_items_array(),
				'parent'        => $portfolio_gallery_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$portfolio_masonry_container = dessau_select_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_masonry_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'dessau-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'dessau-core' ),
				'parent'        => $portfolio_masonry_container,
				'options'       => dessau_select_get_number_of_columns_array( false, array( 'one', 'five', 'six' ) )
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'dessau-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'dessau-core' ),
				'default_value' => 'normal',
				'options'       => dessau_select_get_space_between_items_array(),
				'parent'        => $portfolio_masonry_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_portfolio_single',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'dessau-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single projects', 'dessau-core' ),
				'parent'        => $panel,
				'options'       => array(
					''    => esc_html__( 'Default', 'dessau-core' ),
					'yes' => esc_html__( 'Yes', 'dessau-core' ),
					'no'  => esc_html__( 'No', 'dessau-core' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_images',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Images', 'dessau-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for projects with images', 'dessau-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_videos',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Videos', 'dessau-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects', 'dessau-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_enable_categories',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Categories', 'dessau-core' ),
				'description'   => esc_html__( 'Enabling this option will enable category meta description on single projects', 'dessau-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_date',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Date', 'dessau-core' ),
				'description'   => esc_html__( 'Enabling this option will enable date meta on single projects', 'dessau-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_sticky_sidebar',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Sticky Side Text', 'dessau-core' ),
				'description'   => esc_html__( 'Enabling this option will make side text sticky on Single Project pages. This option works only for Full Width Images, Small Images, Small Gallery and Small Masonry portfolio types', 'dessau-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments', 'dessau-core' ),
				'description'   => esc_html__( 'Enabling this option will show comments on your page', 'dessau-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_pagination',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Hide Pagination', 'dessau-core' ),
				'description'   => esc_html__( 'Enabling this option will turn off portfolio pagination functionality', 'dessau-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		$container_navigate_category = dessau_select_add_admin_container(
			array(
				'name'            => 'navigate_same_category_container',
				'parent'          => $panel,
				'dependency' => array(
					'hide' => array(
						'portfolio_single_hide_pagination'  => array(
							'yes'
						)
					)
				)
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_nav_same_category',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Pagination Through Same Category', 'dessau-core' ),
				'description'   => esc_html__( 'Enabling this option will make portfolio pagination sort through current category', 'dessau-core' ),
				'parent'        => $container_navigate_category,
				'default_value' => 'no'
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'        => 'portfolio_single_slug',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Single Slug', 'dessau-core' ),
				'description' => esc_html__( 'Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'dessau-core' ),
				'parent'      => $panel,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'dessau_select_options_map', 'dessau_select_portfolio_options_map', 14 );
}