<?php

if ( ! function_exists( 'dessau_select_map_post_gallery_meta' ) ) {
	
	function dessau_select_map_post_gallery_meta() {
		$gallery_post_format_meta_box = dessau_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'dessau' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		dessau_select_add_multiple_images_field(
			array(
				'name'        => 'qodef_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'dessau' ),
				'description' => esc_html__( 'Choose your gallery images', 'dessau' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'dessau_select_meta_boxes_map', 'dessau_select_map_post_gallery_meta', 21 );
}
