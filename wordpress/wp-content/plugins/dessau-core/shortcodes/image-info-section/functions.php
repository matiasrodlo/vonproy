<?php

if ( ! function_exists( 'dessau_core_add_image_info_section_shortcodes' ) ) {
	function dessau_core_add_image_info_section_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'DessauCore\CPT\Shortcodes\ImageInfoSection\ImageInfoSection'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'dessau_core_filter_add_vc_shortcode', 'dessau_core_add_image_info_section_shortcodes' );
}

if ( ! function_exists( 'dessau_core_set_image_info_section_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for image info section shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function dessau_core_set_image_info_section_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-image-info-section';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'dessau_core_filter_add_vc_shortcodes_custom_icon_class', 'dessau_core_set_image_info_section_icon_class_name_for_vc_shortcodes' );
}