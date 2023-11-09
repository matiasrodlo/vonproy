<?php

if ( ! function_exists( 'dessau_core_map_portfolio_settings_meta' ) ) {
	function dessau_core_map_portfolio_settings_meta() {
		$meta_box = dessau_select_create_meta_box( array(
			'scope' => 'portfolio-item',
			'title' => esc_html__( 'Portfolio Settings', 'dessau-core' ),
			'name'  => 'portfolio_settings_meta_box'
		) );
		
		dessau_select_create_meta_box_field( array(
			'name'        => 'qodef_portfolio_single_template_meta',
			'type'        => 'select',
			'label'       => esc_html__( 'Portfolio Type', 'dessau-core' ),
			'description' => esc_html__( 'Choose a default type for Single Project pages', 'dessau-core' ),
			'parent'      => $meta_box,
			'options'     => array(
				''                  => esc_html__( 'Default', 'dessau-core' ),
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
		) );
		
		/***************** Gallery Layout *****************/
		
		$gallery_type_meta_container = dessau_select_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'qodef_gallery_type_meta_container',
				'dependency' => array(
					'show' => array(
						'qodef_portfolio_single_template_meta'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_portfolio_single_gallery_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'dessau-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'dessau-core' ),
				'parent'        => $gallery_type_meta_container,
				'options'       => dessau_select_get_number_of_columns_array( true, array( 'one', 'five', 'six' ) )
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_portfolio_single_gallery_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'dessau-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'dessau-core' ),
				'default_value' => '',
				'options'       => dessau_select_get_space_between_items_array( true ),
				'parent'        => $gallery_type_meta_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$masonry_type_meta_container = dessau_select_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'qodef_masonry_type_meta_container',
				'dependency' => array(
					'show' => array(
						'qodef_portfolio_single_template_meta'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_portfolio_single_masonry_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'dessau-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'dessau-core' ),
				'parent'        => $masonry_type_meta_container,
				'options'       => dessau_select_get_number_of_columns_array( true, array( 'one', 'five', 'six' ) )
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_portfolio_single_masonry_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'dessau-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'dessau-core' ),
				'default_value' => '',
				'options'       => dessau_select_get_space_between_items_array( true ),
				'parent'        => $masonry_type_meta_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_title_area_portfolio_single_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'dessau-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single portfolio page', 'dessau-core' ),
				'parent'        => $meta_box,
				'options'       => dessau_select_get_yes_no_select_array()
			)
		);

		dessau_select_create_meta_box_field(
			array(
				'name'          => 'portfolio_header_skin',
				'type'          => 'select',
				'label'         => esc_html__( 'Header Skin', 'dessau-core' ),
				'default_value' => '',
				'parent'        => $meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'dessau-core' ),
					'light-header'    => esc_html__( 'Light', 'dessau-core' ),
					'dark-header'     => esc_html__( 'Dark', 'dessau-core' )
				)
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'portfolio_info_top_padding',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Info Top Padding', 'dessau-core' ),
				'description' => esc_html__( 'Set top padding for portfolio info elements holder. This option works only for Portfolio Images, Slider, Gallery and Masonry portfolio types', 'dessau-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'portfolio_external_link',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio External Link', 'dessau-core' ),
				'description' => esc_html__( 'Enter URL to link from Portfolio List page', 'dessau-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_portfolio_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Featured Image', 'dessau-core' ),
				'description' => esc_html__( 'Choose an image for Portfolio Lists shortcode where Hover Type option is Switch Featured Images', 'dessau-core' ),
				'parent'      => $meta_box
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_portfolio_masonry_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Fixed Proportion', 'dessau-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is fixed', 'dessau-core' ),
				'default_value' => '',
				'parent'        => $meta_box,
				'options'       => array(
					''                   => esc_html__( 'Default', 'dessau-core' ),
					'small'              => esc_html__( 'Small', 'dessau-core' ),
					'large-width'        => esc_html__( 'Large Width', 'dessau-core' ),
					'large-height'       => esc_html__( 'Large Height', 'dessau-core' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'dessau-core' )
				)
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_portfolio_masonry_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Original Proportion', 'dessau-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is original', 'dessau-core' ),
				'default_value' => '',
				'parent'        => $meta_box,
				'options'       => array(
					''            => esc_html__( 'Default', 'dessau-core' ),
					'large-width' => esc_html__( 'Large Width', 'dessau-core' )
				)
			)
		);
		
		$all_pages = array();
		$pages     = get_pages();
		foreach ( $pages as $page ) {
			$all_pages[ $page->ID ] = $page->post_title;
		}
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'portfolio_single_back_to_link',
				'type'        => 'select',
				'label'       => esc_html__( '"Back To" Link', 'dessau-core' ),
				'description' => esc_html__( 'Choose "Back To" page to link from portfolio Single Project page', 'dessau-core' ),
				'parent'      => $meta_box,
				'options'     => $all_pages,
				'args'        => array(
					'select2' => true
				)
			)
		);
	}
	
	add_action( 'dessau_select_meta_boxes_map', 'dessau_core_map_portfolio_settings_meta', 41 );
}