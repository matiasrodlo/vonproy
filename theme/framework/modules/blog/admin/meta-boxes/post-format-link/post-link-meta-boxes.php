<?php

if ( ! function_exists( 'dessau_select_map_post_link_meta' ) ) {
	function dessau_select_map_post_link_meta() {
		$link_post_format_meta_box = dessau_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'dessau' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'dessau' ),
				'description' => esc_html__( 'Enter link', 'dessau' ),
				'parent'      => $link_post_format_meta_box
			)
		);
	}
	
	add_action( 'dessau_select_meta_boxes_map', 'dessau_select_map_post_link_meta', 24 );
}