<?php

if ( ! function_exists( 'dessau_select_register_blog_standard_template_file' ) ) {
	/**
	 * Function that register blog standard template
	 */
	function dessau_select_register_blog_standard_template_file( $templates ) {
		$templates['blog-standard'] = esc_html__( 'Blog: Standard', 'dessau' );
		
		return $templates;
	}
	
	add_filter( 'dessau_select_register_blog_templates', 'dessau_select_register_blog_standard_template_file' );
}

if ( ! function_exists( 'dessau_select_set_blog_standard_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function dessau_select_set_blog_standard_type_global_option( $options ) {
		$options['standard'] = esc_html__( 'Blog: Standard', 'dessau' );
		
		return $options;
	}
	
	add_filter( 'dessau_select_blog_list_type_global_option', 'dessau_select_set_blog_standard_type_global_option' );
}