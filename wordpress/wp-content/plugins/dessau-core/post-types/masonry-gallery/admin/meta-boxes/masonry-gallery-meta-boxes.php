<?php

if ( ! function_exists( 'dessau_core_map_masonry_gallery_meta' ) ) {
	function dessau_core_map_masonry_gallery_meta() {
		
		$masonry_gallery_meta_box = dessau_select_create_meta_box(
			array(
				'scope' => array( 'masonry-gallery' ),
				'title' => esc_html__( 'Masonry Gallery General', 'dessau-core' ),
				'name'  => 'masonry_gallery_meta'
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_masonry_gallery_item_title_tag',
				'type'          => 'select',
				'default_value' => 'h5',
				'label'         => esc_html__( 'Title Tag', 'dessau-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => dessau_select_get_title_tag()
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'   => 'qodef_masonry_gallery_item_text',
				'type'   => 'text',
				'label'  => esc_html__( 'Text', 'dessau-core' ),
				'parent' => $masonry_gallery_meta_box
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'   => 'qodef_masonry_gallery_item_image',
				'type'   => 'image',
				'label'  => esc_html__( 'Custom Item Icon', 'dessau-core' ),
				'parent' => $masonry_gallery_meta_box
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'   => 'qodef_masonry_gallery_item_link',
				'type'   => 'text',
				'label'  => esc_html__( 'Link', 'dessau-core' ),
				'parent' => $masonry_gallery_meta_box
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_masonry_gallery_item_link_target',
				'type'          => 'select',
				'default_value' => '_self',
				'label'         => esc_html__( 'Link Target', 'dessau-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => dessau_select_get_link_target_array()
			)
		);
		
		dessau_select_add_admin_section_title( array(
			'name'   => 'qodef_section_style_title',
			'parent' => $masonry_gallery_meta_box,
			'title'  => esc_html__( 'Masonry Gallery Item Style', 'dessau-core' )
		) );
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_masonry_gallery_item_size',
				'type'          => 'select',
				'default_value' => 'small',
				'label'         => esc_html__( 'Size', 'dessau-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => array(
					'small'              => esc_html__( 'Small', 'dessau-core' ),
					'large-width'        => esc_html__( 'Large Width', 'dessau-core' ),
					'large-height'       => esc_html__( 'Large Height', 'dessau-core' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'dessau-core' )
				)
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_masonry_gallery_item_type',
				'type'          => 'select',
				'default_value' => 'standard',
				'label'         => esc_html__( 'Type', 'dessau-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => array(
					'standard'    => esc_html__( 'Standard', 'dessau-core' ),
					'with-button' => esc_html__( 'With Button', 'dessau-core' ),
					'simple'      => esc_html__( 'Simple', 'dessau-core' )
				)
			)
		);
		
		$masonry_gallery_item_button_type_container = dessau_select_add_admin_container_no_style(
			array(
				'name'            => 'masonry_gallery_item_button_type_container',
				'parent'          => $masonry_gallery_meta_box,
				'dependency' => array(
					'hide' => array(
						'qodef_masonry_gallery_item_type'  => array( 'standard', 'simple' )
					)
				)
			)
		);
		
		$masonry_gallery_item_simple_type_container = dessau_select_add_admin_container_no_style(
			array(
				'name'            => 'masonry_gallery_item_simple_type_container',
				'parent'          => $masonry_gallery_meta_box,
				'dependency' => array(
					'hide' => array(
						'qodef_masonry_gallery_item_type'  => array( 'standard', 'with-button' )
					)
				)
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_masonry_gallery_simple_content_background_skin',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Content Background Skin', 'dessau-core' ),
				'parent'        => $masonry_gallery_item_simple_type_container,
				'options'       => array(
					'default' => esc_html__( 'Default', 'dessau-core' ),
					'light'   => esc_html__( 'Light', 'dessau-core' ),
					'dark'    => esc_html__( 'Dark', 'dessau-core' )
				)
			)
		);
	}
	
	add_action( 'dessau_select_meta_boxes_map', 'dessau_core_map_masonry_gallery_meta', 45 );
}