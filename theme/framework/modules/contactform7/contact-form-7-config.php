<?php

if ( ! function_exists('dessau_select_contact_form_map') ) {
	/**
	 * Map Contact Form 7 shortcode
	 * Hooks on vc_after_init action
	 */
	function dessau_select_contact_form_map() {
		vc_add_param('contact-form-7', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Style', 'dessau'),
			'param_name' => 'html_class',
			'value' => array(
				esc_html__('Default', 'dessau') => 'default',
				esc_html__('Custom Style 1', 'dessau') => 'cf7_custom_style_1',
				esc_html__('Custom Style 2', 'dessau') => 'cf7_custom_style_2',
				esc_html__('Custom Style 3', 'dessau') => 'cf7_custom_style_3'
			),
			'description' => esc_html__('You can style each form element individually in Select Options > Contact Form 7', 'dessau')
		));
	}
	
	add_action('vc_after_init', 'dessau_select_contact_form_map');
}