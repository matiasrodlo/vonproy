<?php

if ( ! function_exists( 'dessau_select_get_title_types_meta_boxes' ) ) {
	function dessau_select_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'dessau_select_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'dessau' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'dessau_select_map_title_meta' ) ) {
	function dessau_select_map_title_meta() {
		$title_type_meta_boxes = dessau_select_get_title_types_meta_boxes();
		
		$title_meta_box = dessau_select_create_meta_box(
			array(
				'scope' => apply_filters( 'dessau_select_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'dessau' ),
				'name'  => 'title_meta'
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'dessau' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'dessau' ),
				'parent'        => $title_meta_box,
				'options'       => dessau_select_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = dessau_select_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'qodef_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'qodef_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				dessau_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'dessau' ),
						'description'   => esc_html__( 'Choose title type', 'dessau' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				dessau_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'dessau' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'dessau' ),
						'options'       => dessau_select_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				dessau_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'dessau' ),
						'description' => esc_html__( 'Set a height for Title Area', 'dessau' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				dessau_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'dessau' ),
						'description' => esc_html__( 'Choose a background color for title area', 'dessau' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				dessau_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'dessau' ),
						'description' => esc_html__( 'Choose an Image for title area', 'dessau' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				dessau_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'dessau' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'dessau' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'dessau' ),
							'hide'                => esc_html__( 'Hide Image', 'dessau' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'dessau' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'dessau' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'dessau' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'dessau' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'dessau' )
						)
					)
				);
				
				dessau_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'dessau' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'dessau' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'dessau' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'dessau' ),
							'window-top'    => esc_html__( 'From Window Top', 'dessau' )
						)
					)
				);
				
				dessau_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'dessau' ),
						'options'       => dessau_select_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				dessau_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'dessau' ),
						'description' => esc_html__( 'Choose a color for title text', 'dessau' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				dessau_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'dessau' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'dessau' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				dessau_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'dessau' ),
						'options'       => dessau_select_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				dessau_select_create_meta_box_field(
					array(
						'name'        => 'qodef_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'dessau' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'dessau' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'dessau_select_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'dessau_select_meta_boxes_map', 'dessau_select_map_title_meta', 60 );
}