<?php

if ( ! function_exists( 'dessau_select_logo_meta_box_map' ) ) {
	function dessau_select_logo_meta_box_map() {
		
		$logo_meta_box = dessau_select_create_meta_box(
			array(
				'scope' => apply_filters( 'dessau_select_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'dessau' ),
				'name'  => 'logo_meta'
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'dessau' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'dessau' ),
				'parent'      => $logo_meta_box
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'dessau' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'dessau' ),
				'parent'      => $logo_meta_box
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'dessau' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'dessau' ),
				'parent'      => $logo_meta_box
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'dessau' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'dessau' ),
				'parent'      => $logo_meta_box
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'dessau' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'dessau' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'dessau_select_meta_boxes_map', 'dessau_select_logo_meta_box_map', 47 );
}