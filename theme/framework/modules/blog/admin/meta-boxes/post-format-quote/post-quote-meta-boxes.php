<?php

if ( ! function_exists( 'dessau_select_map_post_quote_meta' ) ) {
	function dessau_select_map_post_quote_meta() {
		$quote_post_format_meta_box = dessau_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'dessau' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'dessau' ),
				'description' => esc_html__( 'Enter Quote text', 'dessau' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'dessau' ),
				'description' => esc_html__( 'Enter Quote author', 'dessau' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
	}
	
	add_action( 'dessau_select_meta_boxes_map', 'dessau_select_map_post_quote_meta', 25 );
}