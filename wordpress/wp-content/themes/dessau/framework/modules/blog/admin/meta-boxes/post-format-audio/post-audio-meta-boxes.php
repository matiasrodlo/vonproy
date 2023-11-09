<?php

if ( ! function_exists( 'dessau_select_map_post_audio_meta' ) ) {
	function dessau_select_map_post_audio_meta() {
		$audio_post_format_meta_box = dessau_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'dessau' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'dessau' ),
				'description'   => esc_html__( 'Choose audio type', 'dessau' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'dessau' ),
					'self'            => esc_html__( 'Self Hosted', 'dessau' )
				)
			)
		);
		
		$qodef_audio_embedded_container = dessau_select_add_admin_container(
			array(
				'parent' => $audio_post_format_meta_box,
				'name'   => 'qodef_audio_embedded_container'
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'dessau' ),
				'description' => esc_html__( 'Enter audio URL', 'dessau' ),
				'parent'      => $qodef_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_audio_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'dessau' ),
				'description' => esc_html__( 'Enter audio link', 'dessau' ),
				'parent'      => $qodef_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_audio_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'dessau_select_meta_boxes_map', 'dessau_select_map_post_audio_meta', 23 );
}