<?php

if ( ! function_exists( 'dessau_select_get_title_types_options' ) ) {
	function dessau_select_get_title_types_options() {
		$title_type_options = apply_filters( 'dessau_select_title_type_global_option', $title_type_options = array() );
		
		return $title_type_options;
	}
}

if ( ! function_exists( 'dessau_select_get_title_type_default_options' ) ) {
	function dessau_select_get_title_type_default_options() {
		$title_type_option = apply_filters( 'dessau_select_default_title_type_global_option', $title_type_option = '' );
		
		return $title_type_option;
	}
}

foreach ( glob( SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/options-map/*.php' ) as $options_load ) {
	include_once $options_load;
}

if ( ! function_exists('dessau_select_title_options_map') ) {
	function dessau_select_title_options_map() {
		$title_type_options        = dessau_select_get_title_types_options();
		$title_type_default_option = dessau_select_get_title_type_default_options();

		dessau_select_add_admin_page(
			array(
				'slug' => '_title_page',
				'title' => esc_html__('Title', 'dessau'),
				'icon' => 'fa fa-list-alt'
			)
		);

		$panel_title = dessau_select_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title',
				'title' => esc_html__('Title Settings', 'dessau')
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'show_title_area',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Title Area', 'dessau' ),
				'description'   => esc_html__( 'This option will enable/disable Title Area', 'dessau' ),
				'parent'        => $panel_title
			)
		);
		
			$show_title_area_container = dessau_select_add_admin_container(
				array(
					'parent'          => $panel_title,
					'name'            => 'show_title_area_container',
					'dependency' => array(
						'show' => array(
							'show_title_area' => 'yes'
						)
					)
				)
			);
		
				dessau_select_add_admin_field(
					array(
						'name'          => 'title_area_type',
						'type'          => 'select',
						'default_value' => $title_type_default_option,
						'label'         => esc_html__( 'Title Area Type', 'dessau' ),
						'description'   => esc_html__( 'Choose title type', 'dessau' ),
						'parent'        => $show_title_area_container,
						'options'       => $title_type_options
					)
				);
		
					dessau_select_add_admin_field(
						array(
							'name'          => 'title_area_in_grid',
							'type'          => 'yesno',
							'default_value' => 'yes',
							'label'         => esc_html__( 'Title Area In Grid', 'dessau' ),
							'description'   => esc_html__( 'Set title area content to be in grid', 'dessau' ),
							'parent'        => $show_title_area_container
						)
					);
		
					dessau_select_add_admin_field(
						array(
							'name'        => 'title_area_height',
							'type'        => 'text',
							'label'       => esc_html__( 'Height', 'dessau' ),
							'description' => esc_html__( 'Set a height for Title Area', 'dessau' ),
							'parent'      => $show_title_area_container,
							'args'        => array(
								'col_width' => 2,
								'suffix'    => 'px'
							)
						)
					);
					
					dessau_select_add_admin_field(
						array(
							'name'        => 'title_area_background_color',
							'type'        => 'color',
							'label'       => esc_html__( 'Background Color', 'dessau' ),
							'description' => esc_html__( 'Choose a background color for Title Area', 'dessau' ),
							'parent'      => $show_title_area_container
						)
					);
					
					dessau_select_add_admin_field(
						array(
							'name'        => 'title_area_background_image',
							'type'        => 'image',
							'label'       => esc_html__( 'Background Image', 'dessau' ),
							'description' => esc_html__( 'Choose an Image for Title Area', 'dessau' ),
							'parent'      => $show_title_area_container
						)
					);
		
					dessau_select_add_admin_field(
						array(
							'name'          => 'title_area_background_image_behavior',
							'type'          => 'select',
							'default_value' => '',
							'label'         => esc_html__( 'Background Image Behavior', 'dessau' ),
							'description'   => esc_html__( 'Choose title area background image behavior', 'dessau' ),
							'parent'        => $show_title_area_container,
							'options'       => array(
								''                  => esc_html__( 'Default', 'dessau' ),
								'responsive'        => esc_html__( 'Enable Responsive Image', 'dessau' ),
								'parallax'          => esc_html__( 'Enable Parallax Image', 'dessau' ),
								'parallax-zoom-out' => esc_html__( 'Enable Parallax With Zoom Out Image', 'dessau' )
							)
						)
					);
					
					dessau_select_add_admin_field(
						array(
							'name'          => 'title_area_vertical_alignment',
							'type'          => 'select',
							'default_value' => 'header-bottom',
							'label'         => esc_html__( 'Vertical Alignment', 'dessau' ),
							'description'   => esc_html__( 'Specify title vertical alignment', 'dessau' ),
							'parent'        => $show_title_area_container,
							'options'       => array(
								'header-bottom' => esc_html__( 'From Bottom of Header', 'dessau' ),
								'window-top'    => esc_html__( 'From Window Top', 'dessau' )
							)
						)
					);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'dessau_select_additional_title_area_options_map', $show_title_area_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
		
		$panel_typography = dessau_select_add_admin_panel(
			array(
				'page'  => '_title_page',
				'name'  => 'panel_title_typography',
				'title' => esc_html__( 'Typography', 'dessau' )
			)
		);
		
			dessau_select_add_admin_section_title(
				array(
					'name'   => 'type_section_title',
					'title'  => esc_html__( 'Title', 'dessau' ),
					'parent' => $panel_typography
				)
			);
		
			$group_page_title_styles = dessau_select_add_admin_group(
				array(
					'name'        => 'group_page_title_styles',
					'title'       => esc_html__( 'Title', 'dessau' ),
					'description' => esc_html__( 'Define styles for page title', 'dessau' ),
					'parent'      => $panel_typography
				)
			);
		
				$row_page_title_styles_1 = dessau_select_add_admin_row(
					array(
						'name'   => 'row_page_title_styles_1',
						'parent' => $group_page_title_styles
					)
				);
		
					dessau_select_add_admin_field(
						array(
							'name'          => 'title_area_title_tag',
							'type'          => 'selectsimple',
							'default_value' => 'h5',
							'label'         => esc_html__( 'Title Tag', 'dessau' ),
							'options'       => dessau_select_get_title_tag(),
							'parent'        => $row_page_title_styles_1
						)
					);
		
				$row_page_title_styles_2 = dessau_select_add_admin_row(
					array(
						'name'   => 'row_page_title_styles_2',
						'parent' => $group_page_title_styles
					)
				);
		
					dessau_select_add_admin_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'page_title_color',
							'label'  => esc_html__( 'Text Color', 'dessau' ),
							'parent' => $row_page_title_styles_2
						)
					);
					
					dessau_select_add_admin_field(
						array(
							'type'          => 'textsimple',
							'name'          => 'page_title_font_size',
							'default_value' => '',
							'label'         => esc_html__( 'Font Size', 'dessau' ),
							'parent'        => $row_page_title_styles_2,
							'args'          => array(
								'suffix' => 'px'
							)
						)
					);
					
					dessau_select_add_admin_field(
						array(
							'type'          => 'textsimple',
							'name'          => 'page_title_line_height',
							'default_value' => '',
							'label'         => esc_html__( 'Line Height', 'dessau' ),
							'parent'        => $row_page_title_styles_2,
							'args'          => array(
								'suffix' => 'px'
							)
						)
					);
					
					dessau_select_add_admin_field(
						array(
							'type'          => 'selectblanksimple',
							'name'          => 'page_title_text_transform',
							'default_value' => '',
							'label'         => esc_html__( 'Text Transform', 'dessau' ),
							'options'       => dessau_select_get_text_transform_array(),
							'parent'        => $row_page_title_styles_2
						)
					);
		
				$row_page_title_styles_3 = dessau_select_add_admin_row(
					array(
						'name'   => 'row_page_title_styles_3',
						'parent' => $group_page_title_styles,
						'next'   => true
					)
				);
		
					dessau_select_add_admin_field(
						array(
							'type'          => 'fontsimple',
							'name'          => 'page_title_google_fonts',
							'default_value' => '-1',
							'label'         => esc_html__( 'Font Family', 'dessau' ),
							'parent'        => $row_page_title_styles_3
						)
					);
					
					dessau_select_add_admin_field(
						array(
							'type'          => 'selectblanksimple',
							'name'          => 'page_title_font_style',
							'default_value' => '',
							'label'         => esc_html__( 'Font Style', 'dessau' ),
							'options'       => dessau_select_get_font_style_array(),
							'parent'        => $row_page_title_styles_3
						)
					);
					
					dessau_select_add_admin_field(
						array(
							'type'          => 'selectblanksimple',
							'name'          => 'page_title_font_weight',
							'default_value' => '',
							'label'         => esc_html__( 'Font Weight', 'dessau' ),
							'options'       => dessau_select_get_font_weight_array(),
							'parent'        => $row_page_title_styles_3
						)
					);
					
					dessau_select_add_admin_field(
						array(
							'type'          => 'textsimple',
							'name'          => 'page_title_letter_spacing',
							'default_value' => '',
							'label'         => esc_html__( 'Letter Spacing', 'dessau' ),
							'parent'        => $row_page_title_styles_3,
							'args'          => array(
								'suffix' => 'px'
							)
						)
					);
		
			dessau_select_add_admin_section_title(
				array(
					'name'   => 'type_section_subtitle',
					'title'  => esc_html__( 'Subtitle', 'dessau' ),
					'parent' => $panel_typography
				)
			);
		
			$group_page_subtitle_styles = dessau_select_add_admin_group(
				array(
					'name'        => 'group_page_subtitle_styles',
					'title'       => esc_html__( 'Subtitle', 'dessau' ),
					'description' => esc_html__( 'Define styles for page subtitle', 'dessau' ),
					'parent'      => $panel_typography
				)
			);
		
				$row_page_subtitle_styles_1 = dessau_select_add_admin_row(
					array(
						'name'   => 'row_page_subtitle_styles_1',
						'parent' => $group_page_subtitle_styles
					)
				);
				
					dessau_select_add_admin_field(
						array(
							'name' => 'title_area_subtitle_tag',
							'type' => 'selectsimple',
							'default_value' => 'h6',
							'label' => esc_html__('Subtitle Tag', 'dessau'),
							'options' => dessau_select_get_title_tag(),
							'parent' => $row_page_subtitle_styles_1
						)
					);
		
				$row_page_subtitle_styles_2 = dessau_select_add_admin_row(
					array(
						'name'   => 'row_page_subtitle_styles_2',
						'parent' => $group_page_subtitle_styles
					)
				);
		
					dessau_select_add_admin_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'page_subtitle_color',
							'label'  => esc_html__( 'Text Color', 'dessau' ),
							'parent' => $row_page_subtitle_styles_2
						)
					);
					
					dessau_select_add_admin_field(
						array(
							'type'          => 'textsimple',
							'name'          => 'page_subtitle_font_size',
							'default_value' => '',
							'label'         => esc_html__( 'Font Size', 'dessau' ),
							'parent'        => $row_page_subtitle_styles_2,
							'args'          => array(
								'suffix' => 'px'
							)
						)
					);
					
					dessau_select_add_admin_field(
						array(
							'type'          => 'textsimple',
							'name'          => 'page_subtitle_line_height',
							'default_value' => '',
							'label'         => esc_html__( 'Line Height', 'dessau' ),
							'parent'        => $row_page_subtitle_styles_2,
							'args'          => array(
								'suffix' => 'px'
							)
						)
					);
					
					dessau_select_add_admin_field(
						array(
							'type'          => 'selectblanksimple',
							'name'          => 'page_subtitle_text_transform',
							'default_value' => '',
							'label'         => esc_html__( 'Text Transform', 'dessau' ),
							'options'       => dessau_select_get_text_transform_array(),
							'parent'        => $row_page_subtitle_styles_2
						)
					);
		
				$row_page_subtitle_styles_3 = dessau_select_add_admin_row(
					array(
						'name'   => 'row_page_subtitle_styles_3',
						'parent' => $group_page_subtitle_styles,
						'next'   => true
					)
				);
		
					dessau_select_add_admin_field(
						array(
							'type'          => 'fontsimple',
							'name'          => 'page_subtitle_google_fonts',
							'default_value' => '-1',
							'label'         => esc_html__( 'Font Family', 'dessau' ),
							'parent'        => $row_page_subtitle_styles_3
						)
					);
					
					dessau_select_add_admin_field(
						array(
							'type'          => 'selectblanksimple',
							'name'          => 'page_subtitle_font_style',
							'default_value' => '',
							'label'         => esc_html__( 'Font Style', 'dessau' ),
							'options'       => dessau_select_get_font_style_array(),
							'parent'        => $row_page_subtitle_styles_3
						)
					);
					
					dessau_select_add_admin_field(
						array(
							'type'          => 'selectblanksimple',
							'name'          => 'page_subtitle_font_weight',
							'default_value' => '',
							'label'         => esc_html__( 'Font Weight', 'dessau' ),
							'options'       => dessau_select_get_font_weight_array(),
							'parent'        => $row_page_subtitle_styles_3
						)
					);
					
					dessau_select_add_admin_field(
						array(
							'type'          => 'textsimple',
							'name'          => 'page_subtitle_letter_spacing',
							'default_value' => '',
							'label'         => esc_html__( 'Letter Spacing', 'dessau' ),
							'args'          => array(
								'suffix' => 'px'
							),
							'parent'        => $row_page_subtitle_styles_3
						)
					);
		
		/***************** Additional Title Typography Layout - start *****************/
		
		do_action( 'dessau_select_additional_title_typography_options_map', $panel_typography );
		
		/***************** Additional Title Typography Layout - end *****************/
    }

	add_action( 'dessau_select_options_map', 'dessau_select_title_options_map', 6);
}