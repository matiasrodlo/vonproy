<?php

if ( ! function_exists( 'dessau_select_map_general_meta' ) ) {
	function dessau_select_map_general_meta() {
		
		$general_meta_box = dessau_select_create_meta_box(
			array(
				'scope' => apply_filters( 'dessau_select_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'dessau' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'dessau' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'dessau' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'dessau' ),
				'parent'        => $general_meta_box
			)
		);
		
		$qodef_content_padding_group = dessau_select_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'dessau' ),
				'description' => esc_html__( 'Define styles for Content area', 'dessau' ),
				'parent'      => $general_meta_box
			)
		);
		
			$qodef_content_padding_row = dessau_select_add_admin_row(
				array(
					'name'   => 'qodef_content_padding_row',
					'next'   => true,
					'parent' => $qodef_content_padding_group
				)
			);
		
				dessau_select_create_meta_box_field(
					array(
						'name'   => 'qodef_page_content_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Padding (e.g. 10px 5px 10px 5px)', 'dessau' ),
						'parent' => $qodef_content_padding_row,
					)
				);
				
				dessau_select_create_meta_box_field(
					array(
						'name'    => 'qodef_page_content_padding_mobile',
						'type'    => 'textsimple',
						'label'   => esc_html__( 'Content Padding for mobile (e.g. 10px 5px 10px 5px)', 'dessau' ),
						'parent'  => $qodef_content_padding_row,
					)
				);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'dessau' ),
				'description' => esc_html__( 'Choose background color for page content', 'dessau' ),
				'parent'      => $general_meta_box
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_page_background_image_meta',
				'type'          => 'image',
				'label'         => esc_html__( 'Page Background Image', 'dessau' ),
				'description'   => esc_html__( 'Choose background image for page content', 'dessau' ),
				'parent'        => $general_meta_box
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_page_background_repeat_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Page Background Image Repeat', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will set page background image as pattern in otherwise will be cover background image', 'dessau' ),
				'options'       => dessau_select_get_yes_no_select_array(),
				'parent'        => $general_meta_box
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		dessau_select_create_meta_box_field(
			array(
				'name'    => 'qodef_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'dessau' ),
				'parent'  => $general_meta_box,
				'options' => dessau_select_get_yes_no_select_array()
			)
		);
		
			$boxed_container_meta = dessau_select_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'dependency' => array(
						'hide' => array(
							'qodef_boxed_meta'  => array('','no')
						)
					)
				)
			);
		
				dessau_select_create_meta_box_field(
					array(
						'name'        => 'qodef_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'dessau' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'dessau' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				dessau_select_create_meta_box_field(
					array(
						'name'        => 'qodef_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'dessau' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'dessau' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				dessau_select_create_meta_box_field(
					array(
						'name'        => 'qodef_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'dessau' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'dessau' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				dessau_select_create_meta_box_field(
					array(
						'name'          => 'qodef_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'dessau' ),
						'description'   => esc_html__( 'Choose background image attachment', 'dessau' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'dessau' ),
							'fixed'  => esc_html__( 'Fixed', 'dessau' ),
							'scroll' => esc_html__( 'Scroll', 'dessau' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'dessau' ),
				'parent'        => $general_meta_box,
				'options'       => dessau_select_get_yes_no_select_array(),
			)
		);
		
			$paspartu_container_meta = dessau_select_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'qodef_paspartu_container_meta',
					'dependency' => array(
						'hide' => array(
							'qodef_paspartu_meta'  => array('','no')
						)
					)
				)
			);
		
				dessau_select_create_meta_box_field(
					array(
						'name'        => 'qodef_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'dessau' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'dessau' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				dessau_select_create_meta_box_field(
					array(
						'name'        => 'qodef_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'dessau' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'dessau' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				dessau_select_create_meta_box_field(
					array(
						'name'        => 'qodef_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'dessau' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'dessau' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				dessau_select_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'qodef_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'dessau' ),
						'options'       => dessau_select_get_yes_no_select_array(),
					)
				);
		
				dessau_select_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'qodef_enable_fixed_paspartu_meta',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'dessau' ),
						'description'   => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'dessau' ),
						'options'       => dessau_select_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Width Layout - begin **********************/
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'dessau' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'dessau' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'dessau' ),
					'qodef-grid-1100' => esc_html__( '1100px', 'dessau' ),
					'qodef-grid-1300' => esc_html__( '1300px', 'dessau' ),
					'qodef-grid-1200' => esc_html__( '1200px', 'dessau' ),
					'qodef-grid-1000' => esc_html__( '1000px', 'dessau' ),
					'qodef-grid-800'  => esc_html__( '800px', 'dessau' )
				)
			)
		);
		
		/***************** Content Width Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'dessau' ),
				'parent'        => $general_meta_box,
				'options'       => dessau_select_get_yes_no_select_array()
			)
		);
		
			$page_transitions_container_meta = dessau_select_add_admin_container(
				array(
					'parent'     => $general_meta_box,
					'name'       => 'page_transitions_container_meta',
					'dependency' => array(
						'hide' => array(
							'qodef_smooth_page_transitions_meta' => array( '', 'no' )
						)
					)
				)
			);
		
				dessau_select_create_meta_box_field(
					array(
						'name'        => 'qodef_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'dessau' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'dessau' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => dessau_select_get_yes_no_select_array()
					)
				);
		
				$page_transition_preloader_container_meta = dessau_select_add_admin_container(
					array(
						'parent'     => $page_transitions_container_meta,
						'name'       => 'page_transition_preloader_container_meta',
						'dependency' => array(
							'hide' => array(
								'qodef_page_transition_preloader_meta' => array( '', 'no' )
							)
						)
					)
				);
				
					dessau_select_create_meta_box_field(
						array(
							'name'   => 'qodef_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'dessau' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = dessau_select_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'dessau' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'dessau' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = dessau_select_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					dessau_select_create_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'qodef_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'dessau' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'dessau' ),
								'dessau_spinner'        => esc_html__( 'Dessau spinner', 'dessau' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'dessau' ),
								'pulse'                 => esc_html__( 'Pulse', 'dessau' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'dessau' ),
								'cube'                  => esc_html__( 'Cube', 'dessau' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'dessau' ),
								'stripes'               => esc_html__( 'Stripes', 'dessau' ),
								'wave'                  => esc_html__( 'Wave', 'dessau' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'dessau' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'dessau' ),
								'atom'                  => esc_html__( 'Atom', 'dessau' ),
								'clock'                 => esc_html__( 'Clock', 'dessau' ),
								'mitosis'               => esc_html__( 'Mitosis', 'dessau' ),
								'lines'                 => esc_html__( 'Lines', 'dessau' ),
								'fussion'               => esc_html__( 'Fussion', 'dessau' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'dessau' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'dessau' )
							)
						)
					);
					
					dessau_select_create_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'qodef_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'dessau' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);
					
					dessau_select_create_meta_box_field(
						array(
							'name'        => 'qodef_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'dessau' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'dessau' ),
							'options'     => dessau_select_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'dessau' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'dessau' ),
				'parent'      => $general_meta_box,
				'options'     => dessau_select_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'dessau_select_meta_boxes_map', 'dessau_select_map_general_meta', 10 );
}

if ( ! function_exists( 'dessau_select_container_background_style' ) ) {
	/**
	 * Function that return container style
	 */
	function dessau_select_container_background_style( $style ) {
		$page_id      = dessau_select_get_page_id();
		$class_prefix = dessau_select_get_unique_page_class( $page_id, true );
		
		$container_selector = array(
			$class_prefix . ' .qodef-content'
		);
		
		$container_class        = array();
		$page_background_color  = get_post_meta( $page_id, 'qodef_page_background_color_meta', true );
		$page_background_image  = get_post_meta( $page_id, 'qodef_page_background_image_meta', true );
		$page_background_repeat = get_post_meta( $page_id, 'qodef_page_background_repeat_meta', true );
		
		if ( ! empty( $page_background_color ) ) {
			$container_class['background-color'] = $page_background_color;
		}
		
		if ( ! empty( $page_background_image ) ) {
			$container_class['background-image'] = 'url(' . esc_url( $page_background_image ) . ')';
			
			if ( $page_background_repeat === 'yes' ) {
				$container_class['background-repeat']   = 'repeat';
				$container_class['background-position'] = '0 0';
			} else {
				$container_class['background-repeat']   = 'no-repeat';
				$container_class['background-position'] = 'center 0';
				$container_class['background-size']     = 'cover';
			}
		}
		
		$current_style = dessau_select_dynamic_css( $container_selector, $container_class );
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'dessau_select_add_page_custom_style', 'dessau_select_container_background_style' );
}