<?php

if ( ! function_exists( 'dessau_core_add_dropcaps_shortcodes' ) ) {
	function dessau_core_add_dropcaps_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'DessauCore\CPT\Shortcodes\Dropcaps\Dropcaps'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'dessau_core_filter_add_vc_shortcode', 'dessau_core_add_dropcaps_shortcodes' );
}