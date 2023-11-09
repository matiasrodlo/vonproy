<?php

if ( ! function_exists( 'dessau_select_map_content_bottom_meta' ) ) {
	function dessau_select_map_content_bottom_meta() {
		
		$content_bottom_meta_box = dessau_select_create_meta_box(
			array(
				'scope' => apply_filters( 'dessau_select_set_scope_for_meta_boxes', array( 'page', 'post' ), 'content_bottom_meta' ),
				'title' => esc_html__( 'Content Bottom', 'dessau' ),
				'name'  => 'content_bottom_meta'
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_enable_content_bottom_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'dessau' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'dessau' ),
				'parent'        => $content_bottom_meta_box,
				'options'       => dessau_select_get_yes_no_select_array()
			)
		);
		
		$show_content_bottom_meta_container = dessau_select_add_admin_container(
			array(
				'parent'          => $content_bottom_meta_box,
				'name'            => 'qodef_show_content_bottom_meta_container',
				'dependency' => array(
					'show' => array(
						'qodef_enable_content_bottom_area_meta' => 'yes'
					)
				)
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_content_bottom_sidebar_custom_display_meta',
				'type'          => 'selectblank',
				'default_value' => '',
				'label'         => esc_html__( 'Sidebar to Display', 'dessau' ),
				'description'   => esc_html__( 'Choose a content bottom sidebar to display', 'dessau' ),
				'options'       => dessau_select_get_custom_sidebars(),
				'parent'        => $show_content_bottom_meta_container,
				'args'          => array(
					'select2' => true
				)
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'qodef_content_bottom_in_grid_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Display in Grid', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will place content bottom in grid', 'dessau' ),
				'options'       => dessau_select_get_yes_no_select_array(),
				'parent'        => $show_content_bottom_meta_container
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'type'        => 'color',
				'name'        => 'qodef_content_bottom_background_color_meta',
				'label'       => esc_html__( 'Background Color', 'dessau' ),
				'description' => esc_html__( 'Choose a background color for content bottom area', 'dessau' ),
				'parent'      => $show_content_bottom_meta_container
			)
		);
	}
	
	add_action( 'dessau_select_meta_boxes_map', 'dessau_select_map_content_bottom_meta', 71 );
}