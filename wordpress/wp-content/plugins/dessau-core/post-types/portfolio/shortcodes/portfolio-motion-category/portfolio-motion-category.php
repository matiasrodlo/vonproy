<?php

namespace DessauCore\CPT\Shortcodes\Portfolio;

use DessauCore\Lib;

class PortfolioMotionCategory implements Lib\ShortcodeInterface {
	private $base;

	private $categories = array();
	private $links = array();
	
	public function __construct() {
		$this->base = 'qodef_portfolio_motion_category';

		$cat_ids = array(1,2,3,4,5);
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );

		foreach( $cat_ids as $cat_id ) {
			//Portfolio category filter
			add_filter( 'vc_autocomplete_qodef_portfolio_motion_category_category_'. esc_attr($cat_id) .'_callback', array( &$this, 'portfolioCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

			//Portfolio category render
			add_filter( 'vc_autocomplete_qodef_portfolio_motion_category_category_'. esc_attr($cat_id) .'_render', array( &$this, 'portfolioCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
		}
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'     => esc_html__( 'Portfolio Motion Category', 'dessau-core' ),
					'base'     => $this->base,
					'category' => esc_html__( 'by DESSAU', 'dessau-core' ),
					'icon'     => 'icon-wpb-portfolio-motion-category extended-custom-icon',
					'params'   => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'number_of_items',
							'heading'     => esc_html__( 'Number of Portfolios Items', 'dessau-core' ),
							'admin_label' => true,
							'description' => esc_html__( 'Set number of items for your portfolio slider. Enter -1 to show all', 'dessau-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'item_type',
							'heading'    => esc_html__( 'Click Behavior', 'dessau-core' ),
							'value'      => array(
								esc_html__( 'Open portfolio single page on click', 'dessau-core' )   => 'category',
								esc_html__( 'Open gallery in Pretty Photo on click', 'dessau-core' ) => 'gallery',
							)
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'image_proportions',
							'heading'     => esc_html__( 'Image Proportions', 'dessau-core' ),
							'value'       => array(
								esc_html__( 'Original', 'dessau-core' )  => 'full',
								esc_html__( 'Square', 'dessau-core' )    => 'square',
								esc_html__( 'Landscape', 'dessau-core' ) => 'landscape',
								esc_html__( 'Portrait', 'dessau-core' )  => 'portrait',
								esc_html__( 'Medium', 'dessau-core' )    => 'medium',
								esc_html__( 'Large', 'dessau-core' )     => 'large'
							),
							'description' => esc_html__( 'Set image proportions for your portfolio slider.', 'dessau-core' ),
							'save_always' => true
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'category_1',
							'heading'     => esc_html__( 'First Column Category', 'dessau-core' ),
							'description' => esc_html__( 'Choose first category from which you want to display portfolio items.', 'dessau-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'category_1_link',
							'heading'     => esc_html__( 'First Column Category Link', 'dessau-core' ),
							'description' => esc_html__( 'Add link for this category page for mobile devices', 'dessau-core' )
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'category_2',
							'heading'     => esc_html__( 'Second Column Category', 'dessau-core' ),
							'description' => esc_html__( 'Choose second category from which you want to display portfolio items.', 'dessau-core' ),
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'category_2_link',
							'heading'     => esc_html__( 'Second Column Category Link', 'dessau-core' ),
							'description' => esc_html__( 'Add link for this category page for mobile devices', 'dessau-core' )
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'category_3',
							'heading'     => esc_html__( 'Third Column Category', 'dessau-core' ),
							'description' => esc_html__( 'Choose third category from which you want to display portfolio items.', 'dessau-core' ),
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'category_3_link',
							'heading'     => esc_html__( 'Third Column Category Link', 'dessau-core' ),
							'description' => esc_html__( 'Add link for this category page for mobile devices', 'dessau-core' )
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'category_4',
							'heading'     => esc_html__( 'Fourth Column Category', 'dessau-core' ),
							'description' => esc_html__( 'Choose fourth category from which you want to display portfolio items.', 'dessau-core' ),
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'category_4_link',
							'heading'     => esc_html__( 'Fourth Column Category Link', 'dessau-core' ),
							'description' => esc_html__( 'Add link for this category page for mobile devices', 'dessau-core' )
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'category_5',
							'heading'     => esc_html__( 'Fifth Column Category', 'dessau-core' ),
							'description' => esc_html__( 'Choose fifth category from which you want to display portfolio items.', 'dessau-core' ),
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'category_5_link',
							'heading'     => esc_html__( 'Fifth Column Category Link', 'dessau-core' ),
							'description' => esc_html__( 'Add link for this category page for mobile devices', 'dessau-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order_by',
							'heading'     => esc_html__( 'Order By', 'dessau-core' ),
							'value'       => array_flip( dessau_select_get_query_order_by_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order',
							'heading'     => esc_html__( 'Order', 'dessau-core' ),
							'value'       => array_flip( dessau_select_get_query_order_array() ),
							'save_always' => true
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'number_of_items'        => '9',
			'item_type'              => 'category',
			'image_proportions'      => 'full',
			'category_1'             => '',
			'category_1_link'        => '',
			'category_2'             => '',
			'category_2_link'        => '',
			'category_3'             => '',
			'category_3_link'        => '',
			'category_4'             => '',
			'category_4_link'        => '',
			'category_5'             => '',
			'category_5_link'        => '',
			'selected_projects'      => '',
			'order_by'               => 'date',
			'order'                  => 'ASC',
			'title_tag'              => 'h6'
		);
		$params = shortcode_atts( $args, $atts );

		$column_count                        = $this->getActiveColumnsNumber( $params );
		$query_results                       = $this->getQueries( $params );
		$params['columns_count']             = $column_count;
		$params['holder_classes']            = $this->getHolderClasses( $params );
		$params['type']                      = 'gallery';
		$params['space_between_items']       = 'slightly';
		$params['enable_title']              = 'yes';
		$additional_params['query_results']  = $query_results;
		$additional_params['categories']     = $this->categories;
		$additional_params['links']          = $this->links;

		$params['this_object'] = $this;

		if( $column_count > 0 ) {
			$html = dessau_core_get_cpt_shortcode_module_template_part( 'portfolio', 'portfolio-motion-category', 'portfolio-holder', 'motion-category', $params, $additional_params );
		} else {
			$html = sprintf( '<p style="color: indianred; font-size: 17px; font-style: italic">%s</p>', esc_html__('You need to enter at least one column category to display this element', 'dessau-core') );
		}

		return $html;
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();

		$holderClasses[] = ! empty( $params['columns_count'] ) ? 'qodef-portfolio-mc-' . esc_attr($params['columns_count']) . '-columns' : '';

		return implode( ' ', $holderClasses );
	}

	/**
	 * Get total count of used categories
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getActiveColumnsNumber( $params ) {
		$columns = ! empty( $params['category_1'] ) + ! empty( $params['category_2'] ) + ! empty( $params['category_3'] ) + ! empty( $params['category_4'] ) + ! empty( $params['category_5'] );

		return $columns;
	}

	/**
	 * Get queries
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getQueries( $params ) {
		$queries      = array();
		$query_array  = $this->getQueryArray( $params );
		$columns      = $this->getActiveColumnsNumber( $params );

		for( $n = 1; $n <= $columns + 1; $n++ ) {
			$category = 'category_' . $n;
			$link     = $category . '_link';

			if ( ! empty( $params[$category] ) ) {
				$query_array['portfolio-category'] = $params[$category];
				$this->categories[$n] = $params[$category];

				if ( ! empty($params[$link]) ) {
					$this->links[$n] = $params[$link];
				}

				$queries[$n] = new \WP_Query( $query_array );
			}
		}

		return $queries;
	}

	public function getQueryArray( $params ) {
		$query_array = array(
			'post_status'    => 'publish',
			'post_type'      => 'portfolio-item',
			'posts_per_page' => $params['number_of_items'],
			'orderby'        => $params['order_by'],
			'order'          => $params['order']
		);

		return $query_array;
	}

	public function getImageSize( $params ) {
		$thumb_size = 'full';

		if ( ! empty( $params['image_proportions'] ) && $params['type'] == 'gallery' ) {
			$image_size = $params['image_proportions'];

			switch ( $image_size ) {
				case 'landscape':
					$thumb_size = 'dessau_select_landscape';
					break;
				case 'portrait':
					$thumb_size = 'dessau_select_portrait';
					break;
				case 'square':
					$thumb_size = 'dessau_select_square';
					break;
				case 'medium':
					$thumb_size = 'medium';
					break;
				case 'large':
					$thumb_size = 'large';
					break;
				case 'full':
					$thumb_size = 'full';
					break;
			}
		}

		return $thumb_size;
	}
	
	/**
	 * Filter portfolio categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS portfolio_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'portfolio-category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['portfolio_category_title'] ) > 0 ) ? esc_html__( 'Category', 'dessau-core' ) . ': ' . $value['portfolio_category_title'] : '' );
				$results[]     = $data;
			}
		}
		
		return $results;
	}

	public function getItemLink() {
		$portfolio_link_meta = get_post_meta( get_the_ID(), 'portfolio_external_link', true );
		$portfolio_link = ! empty( $portfolio_link_meta ) ? $portfolio_link_meta : get_permalink( get_the_ID() );

		return apply_filters( 'dessau_select_portfolio_external_link', $portfolio_link );
	}

	public function getItemLinkTarget() {
		$portfolio_link_meta = get_post_meta( get_the_ID(), 'portfolio_external_link', true );

		$portfolio_link_target = ! empty( $portfolio_link_meta ) ? '_blank' : '_self';

		return apply_filters( 'dessau_select_portfolio_external_link_target', $portfolio_link_target );
	}
	
	/**
	 * Find portfolio category by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function portfolioCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$portfolio_category = get_term_by( 'slug', $query, 'portfolio-category' );
			if ( is_object( $portfolio_category ) ) {
				
				$portfolio_category_slug  = $portfolio_category->slug;
				$portfolio_category_title = $portfolio_category->name;
				
				$portfolio_category_title_display = '';
				if ( ! empty( $portfolio_category_title ) ) {
					$portfolio_category_title_display = esc_html__( 'Category', 'dessau-core' ) . ': ' . $portfolio_category_title;
				}
				
				$data          = array();
				$data['value'] = $portfolio_category_slug;
				$data['label'] = $portfolio_category_title_display;
				
				return ! empty( $data ) ? $data : false;
			}
			
			return false;
		}
		
		return false;
	}
}