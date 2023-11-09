<?php

if ( ! function_exists( 'dessau_select_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function dessau_select_reset_options_map() {
		
		dessau_select_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'dessau' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = dessau_select_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'dessau' )
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'dessau' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'dessau' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'dessau_select_options_map', 'dessau_select_reset_options_map', 100 );
}