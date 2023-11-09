<?php

namespace DessauCore\CPT\MasonryGallery;

use DessauCore\Lib;

/**
 * Class MasonryGalleryRegister
 * @package DessauCore\CPT\MasonryGallery
 */
class MasonryGalleryRegister implements Lib\PostTypeInterface {
	private $base;
	
	public function __construct() {
		$this->base    = 'masonry-gallery';
		$this->taxBase = 'masonry-gallery-category';
	}
	
	/**
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}
	
	/**
	 * Registers custom post type with WordPress
	 */
	public function register() {
		$this->registerPostType();
		$this->registerTax();
	}
	
	/**
	 * Registers custom post type with WordPress
	 */
	private function registerPostType() {
		$menuPosition = 5;
		$menuIcon     = 'dashicons-schedule';
		
		register_post_type( $this->base,
			array(
				'labels'        => array(
					'name'          => esc_html__( 'Dessau Masonry Gallery', 'dessau-core' ),
					'all_items'     => esc_html__( 'Masonry Gallery Items', 'dessau-core' ),
					'singular_name' => esc_html__( 'Masonry Gallery Item', 'dessau-core' ),
					'add_item'      => esc_html__( 'New Masonry Gallery Item', 'dessau-core' ),
					'add_new_item'  => esc_html__( 'Add New Masonry Gallery Item', 'dessau-core' ),
					'edit_item'     => esc_html__( 'Edit Masonry Gallery Item', 'dessau-core' )
				),
				'public'        => false,
				'show_in_menu'  => true,
				'rewrite'       => array( 'slug' => 'masonry-gallery' ),
				'menu_position' => $menuPosition,
				'show_ui'       => true,
				'has_archive'   => false,
				'hierarchical'  => false,
				'supports'      => array( 'title', 'thumbnail' ),
				'menu_icon'     => $menuIcon
			)
		);
	}
	
	/**
	 * Registers custom taxonomy with WordPress
	 */
	private function registerTax() {
		$labels = array(
			'name'              => esc_html__( 'Masonry Gallery Categories', 'dessau-core' ),
			'singular_name'     => esc_html__( 'Masonry Gallery Category', 'dessau-core' ),
			'search_items'      => esc_html__( 'Search Masonry Gallery Categories', 'dessau-core' ),
			'all_items'         => esc_html__( 'All Masonry Gallery Categories', 'dessau-core' ),
			'parent_item'       => esc_html__( 'Parent Masonry Gallery Category', 'dessau-core' ),
			'parent_item_colon' => esc_html__( 'Parent Masonry Gallery Category:', 'dessau-core' ),
			'edit_item'         => esc_html__( 'Edit Masonry Gallery Category', 'dessau-core' ),
			'update_item'       => esc_html__( 'Update Masonry Gallery Category', 'dessau-core' ),
			'add_new_item'      => esc_html__( 'Add New Masonry Gallery Category', 'dessau-core' ),
			'new_item_name'     => esc_html__( 'New Masonry Gallery Category Name', 'dessau-core' ),
			'menu_name'         => esc_html__( 'Masonry Gallery Categories', 'dessau-core' )
		);
		
		register_taxonomy( $this->taxBase, array( $this->base ), array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'query_var'         => true,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'masonry-gallery-category' )
		) );
	}
}