<?php

if ( ! function_exists( 'dessau_core_map_portfolio_meta' ) ) {
	function dessau_core_map_portfolio_meta() {
		global $dessau_select_Framework;
		
		$dessau_pages = array();
		$pages      = get_pages();
		foreach ( $pages as $page ) {
			$dessau_pages[ $page->ID ] = $page->post_title;
		}
		
		//Portfolio Images
		
		$dessau_portfolio_images = new DessauSelectMetaBox( 'portfolio-item', esc_html__( 'Portfolio Images (multiple upload)', 'dessau-core' ), '', '', 'portfolio_images' );
		$dessau_select_Framework->qodeMetaBoxes->addMetaBox( 'portfolio_images', $dessau_portfolio_images );
		
		$dessau_portfolio_image_gallery = new DessauSelectMultipleImages( 'qodef-portfolio-image-gallery', esc_html__( 'Portfolio Images', 'dessau-core' ), esc_html__( 'Choose your portfolio images', 'dessau-core' ) );
		$dessau_portfolio_images->addChild( 'qodef-portfolio-image-gallery', $dessau_portfolio_image_gallery );
		
		//Portfolio Single Upload Images/Videos 
		
		$dessau_portfolio_images_videos = dessau_select_create_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Portfolio Images/Videos (single upload)', 'dessau-core' ),
				'name'  => 'qodef_portfolio_images_videos'
			)
		);
		dessau_select_add_repeater_field(
			array(
				'name'        => 'qodef_portfolio_single_upload',
				'parent'      => $dessau_portfolio_images_videos,
				'button_text' => esc_html__( 'Add Image/Video', 'dessau-core' ),
				'fields'      => array(
					array(
						'type'        => 'select',
						'name'        => 'file_type',
						'label'       => esc_html__( 'File Type', 'dessau-core' ),
						'options' => array(
							'image' => esc_html__('Image','dessau-core'),
							'video' => esc_html__('Video','dessau-core'),
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'single_image',
						'label'       => esc_html__( 'Image', 'dessau-core' ),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'image'
							)
						)
					),
					array(
						'type'        => 'select',
						'name'        => 'video_type',
						'label'       => esc_html__( 'Video Type', 'dessau-core' ),
						'options'	  => array(
							'youtube' => esc_html__('YouTube', 'dessau-core'),
							'vimeo' => esc_html__('Vimeo', 'dessau-core'),
							'self' => esc_html__('Self Hosted', 'dessau-core'),
						),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'video'
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_id',
						'label'       => esc_html__( 'Video ID', 'dessau-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => array('youtube','vimeo')
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_mp4',
						'label'       => esc_html__( 'Video mp4', 'dessau-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'video_cover_image',
						'label'       => esc_html__( 'Video Cover Image', 'dessau-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					)
				)
			)
		);
		
		//Portfolio Additional Sidebar Items
		
		$dessau_additional_sidebar_items = dessau_select_create_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Additional Portfolio Sidebar Items', 'dessau-core' ),
				'name'  => 'portfolio_properties'
			)
		);

		dessau_select_add_repeater_field(
			array(
				'name'        => 'qodef_portfolio_properties',
				'parent'      => $dessau_additional_sidebar_items,
				'button_text' => esc_html__( 'Add New Item', 'dessau-core' ),
				'fields'      => array(
					array(
						'type'        => 'text',
						'name'        => 'item_title',
						'label'       => esc_html__( 'Item Title', 'dessau-core' ),
					),
					array(
						'type'        => 'text',
						'name'        => 'item_text',
						'label'       => esc_html__( 'Item Text', 'dessau-core' )
					),
					array(
						'type'        => 'text',
						'name'        => 'item_url',
						'label'       => esc_html__( 'Enter Full URL for Item Text Link', 'dessau-core' )
					)
				)
			)
		);
	}
	
	add_action( 'dessau_select_meta_boxes_map', 'dessau_core_map_portfolio_meta', 40 );
}