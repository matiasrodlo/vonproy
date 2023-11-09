<?php
namespace DessauCore\CPT\Shortcodes\FrameScrollSlider;

use DessauCore\Lib;

class FrameScrollSlider implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'qodef_frame_scroll_slider';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Frame Scroll Slider', 'dessau-core' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-frame-scroll-slider extended-custom-icon',
					'category'                  => esc_html__( 'by DESSAU', 'dessau-core' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'attach_images',
							'param_name'  => 'images',
							'heading'     => esc_html__( 'Images', 'dessau-core' ),
							'description' => esc_html__( 'Select images from media library', 'dessau-core' )
						),
						array(
							'type'        => 'attach_images',
							'param_name'  => 'frame_image',
							'heading'     => esc_html__( 'Frame Image', 'dessau-core' ),
							'description' => esc_html__( 'Select images from media library', 'dessau-core' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args = array(
			'images'       => '',
			'frame_image'  => '',
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['images']      = $this->getGalleryImages( $params );
		$params['frame_styles'] = $this->getFrameStyles( $params );
		
		$html = dessau_core_get_shortcode_module_template_part( 'templates/frame-scroll-slider', 'frame-scroll-slider', '', $params );
		
		return $html;
	}

	private function getFrameStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['frame_image'] ) ){
			$image_src = wp_get_attachment_image_src( $params['frame_image'], 'full' );

			if ( is_array( $image_src ) ) {
				$image_src = $image_src[0];
			}

			$styles[] = 'background-image: url(' . $image_src . ')';
		}

		return implode( ';', $styles );
	}
	
	private function getGalleryImages( $params ) {
		$image_ids = array();
		$images    = array();
		$i         = 0;
		
		if ( $params['images'] !== '' ) {
			$image_ids = explode( ',', $params['images'] );
		}
		
		foreach ( $image_ids as $id ) {
			
			$image['image_id'] = $id;
			$image_original    = wp_get_attachment_image_src( $id, 'full' );
			$image['url']      = $image_original[0];
			$image['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );
			
			$images[ $i ] = $image;
			$i ++;
		}
		
		return $images;
	}
}
