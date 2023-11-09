<?php

if ( ! function_exists( 'dessau_core_masonry_gallery_meta_box_functions' ) ) {
	function dessau_core_masonry_gallery_meta_box_functions( $post_types ) {
		$post_types[] = 'masonry-gallery';
		
		return $post_types;
	}
	
	add_filter( 'dessau_select_meta_box_post_types_save', 'dessau_core_masonry_gallery_meta_box_functions' );
	add_filter( 'dessau_select_meta_box_post_types_remove', 'dessau_core_masonry_gallery_meta_box_functions' );
}

if ( ! function_exists( 'dessau_core_register_masonry_gallery_cpt' ) ) {
	function dessau_core_register_masonry_gallery_cpt( $cpt_class_name ) {
		$cpt_class = array(
			'DessauCore\CPT\MasonryGallery\MasonryGalleryRegister'
		);
		
		$cpt_class_name = array_merge( $cpt_class_name, $cpt_class );
		
		return $cpt_class_name;
	}
	
	add_filter( 'dessau_core_filter_register_custom_post_types', 'dessau_core_register_masonry_gallery_cpt' );
}

if ( ! function_exists( 'dessau_core_add_proofing_gallery_to_search_types' ) ) {
	function dessau_core_add_proofing_gallery_to_search_types( $post_types ) {
		$post_types['masonry-gallery'] = esc_html__( 'Masonry Gallery', 'dessau-core' );
		
		return $post_types;
	}
	
	add_filter( 'dessau_select_search_post_type_widget_params_post_type', 'dessau_core_add_proofing_gallery_to_search_types' );
}

// Load masonry gallery shortcodes
if(!function_exists('dessau_core_include_masonry_gallery_shortcodes_files')) {
    /**
     * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
     */
    function dessau_core_include_masonry_gallery_shortcodes_files() {
        foreach(glob(DESSAU_CORE_CPT_PATH.'/masonry-gallery/shortcodes/*/load.php') as $shortcode_load) {
            include_once $shortcode_load;
        }
    }

    add_action('dessau_core_action_include_shortcodes_file', 'dessau_core_include_masonry_gallery_shortcodes_files');
}