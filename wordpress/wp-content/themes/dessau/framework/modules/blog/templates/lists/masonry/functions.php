<?php

if ( ! function_exists( 'dessau_select_register_blog_masonry_template_file' ) ) {
	/**
	 * Function that register blog masonry template
	 */
	function dessau_select_register_blog_masonry_template_file( $templates ) {
		$templates['blog-masonry'] = esc_html__( 'Blog: Masonry', 'dessau' );
		
		return $templates;
	}
	
	add_filter( 'dessau_select_register_blog_templates', 'dessau_select_register_blog_masonry_template_file' );
}

if ( ! function_exists( 'dessau_select_set_blog_masonry_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function dessau_select_set_blog_masonry_type_global_option( $options ) {
		$options['masonry'] = esc_html__( 'Blog: Masonry', 'dessau' );
		
		return $options;
	}
	
	add_filter( 'dessau_select_blog_list_type_global_option', 'dessau_select_set_blog_masonry_type_global_option' );
}