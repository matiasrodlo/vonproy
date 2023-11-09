<?php

if ( ! function_exists( 'dessau_select_logo_options_map' ) ) {
	function dessau_select_logo_options_map() {
		
		dessau_select_add_admin_page(
			array(
				'slug'  => '_logo_page',
				'title' => esc_html__( 'Logo', 'dessau' ),
				'icon'  => 'fa fa-coffee'
			)
		);
		
		$panel_logo = dessau_select_add_admin_panel(
			array(
				'page'  => '_logo_page',
				'name'  => 'panel_logo',
				'title' => esc_html__( 'Logo', 'dessau' )
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Logo', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will hide logo image', 'dessau' )
			)
		);
		
		$hide_logo_container = dessau_select_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'dependency' => array(
					'hide' => array(
						'hide_logo'  => 'yes'
					)
				)
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Default', 'dessau' ),
				'parent'        => $hide_logo_container
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Dark', 'dessau' ),
				'parent'        => $hide_logo_container
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo_white.png",
				'label'         => esc_html__( 'Logo Image - Light', 'dessau' ),
				'parent'        => $hide_logo_container
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Sticky', 'dessau' ),
				'parent'        => $hide_logo_container
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Mobile', 'dessau' ),
				'parent'        => $hide_logo_container
			)
		);
	}
	
	add_action( 'dessau_select_options_map', 'dessau_select_logo_options_map', 2 );
}