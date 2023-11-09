<?php

if ( ! function_exists( 'dessau_select_map_post_video_meta' ) ) {
	function dessau_select_map_post_video_meta() {
		$video_post_format_meta_box = dessau_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'dessau' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'dessau' ),
				'description'   => esc_html__( 'Choose video type', 'dessau' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'dessau' ),
					'self'            => esc_html__( 'Self Hosted', 'dessau' )
				)
			)
		);
		
		$qodef_video_embedded_container = dessau_select_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name'   => 'qodef_video_embedded_container'
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'dessau' ),
				'description' => esc_html__( 'Enter Video URL', 'dessau' ),
				'parent'      => $qodef_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_video_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'dessau' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'dessau' ),
				'parent'      => $qodef_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_video_type_meta' => 'self'
					)
				)
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'dessau' ),
				'description' => esc_html__( 'Enter video image', 'dessau' ),
				'parent'      => $qodef_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_video_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'dessau_select_meta_boxes_map', 'dessau_select_map_post_video_meta', 22 );
}