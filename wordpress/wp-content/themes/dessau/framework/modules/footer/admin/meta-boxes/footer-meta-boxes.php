<?php

if ( ! function_exists( 'dessau_select_map_footer_meta' ) ) {
	function dessau_select_map_footer_meta() {
		
		$footer_meta_box = dessau_select_create_meta_box(
			array(
				'scope' => apply_filters( 'dessau_select_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'dessau' ),
				'name'  => 'footer_meta'
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_disable_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Footer for this Page', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'dessau' ),
				'options'       => dessau_select_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);
		
		$show_footer_meta_container = dessau_select_add_admin_container(
			array(
				'name'       => 'qodef_show_footer_meta_container',
				'parent'     => $footer_meta_box,
				'dependency' => array(
					'hide' => array(
						'qodef_disable_footer_meta' => 'yes'
					)
				)
			)
		);
		
			dessau_select_create_meta_box_field(
				array(
					'name'          => 'qodef_footer_in_grid_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Footer in Grid', 'dessau' ),
					'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'dessau' ),
					'options'       => dessau_select_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
			
			dessau_select_create_meta_box_field(
				array(
					'name'          => 'qodef_uncovering_footer_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Uncovering Footer', 'dessau' ),
					'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'dessau' ),
					'options'       => dessau_select_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			dessau_select_create_meta_box_field(
				array(
					'name'          => 'qodef_show_footer_top_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Top', 'dessau' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'dessau' ),
					'options'       => dessau_select_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			dessau_select_create_meta_box_field(
				array(
					'name'        => 'qodef_footer_top_background_color_meta',
					'type'        => 'color',
					'label'       => esc_html__( 'Footer Top Background Color', 'dessau' ),
					'description' => esc_html__( 'Set background color for top footer area', 'dessau' ),
					'parent'      => $show_footer_meta_container,
					'dependency' => array(
						'show' => array(
							'qodef_show_footer_top_meta' => array( '', 'yes' )
						)
					)
				)
			);
			
			dessau_select_create_meta_box_field(
				array(
					'name'          => 'qodef_show_footer_bottom_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Bottom', 'dessau' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'dessau' ),
					'options'       => dessau_select_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			dessau_select_create_meta_box_field(
				array(
					'name'        => 'qodef_footer_bottom_background_color_meta',
					'type'        => 'color',
					'label'       => esc_html__( 'Footer Bottom Background Color', 'dessau' ),
					'description' => esc_html__( 'Set background color for bottom footer area', 'dessau' ),
					'parent'      => $show_footer_meta_container,
					'dependency' => array(
						'show' => array(
							'qodef_show_footer_bottom_meta' => array( '', 'yes' )
						)
					)
				)
			);
	}
	
	add_action( 'dessau_select_meta_boxes_map', 'dessau_select_map_footer_meta', 70 );
}