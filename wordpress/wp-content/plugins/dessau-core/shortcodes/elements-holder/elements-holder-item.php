<?php
namespace DessauCore\CPT\Shortcodes\ElementsHolder;

use DessauCore\Lib;

class ElementsHolderItem implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'qodef_elements_holder_item';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                    => esc_html__( 'Elements Holder Item', 'dessau-core' ),
					'base'                    => $this->base,
					'as_child'                => array( 'only' => 'qodef_elements_holder' ),
					'as_parent'               => array( 'except' => 'vc_row, vc_accordion' ),
					'content_element'         => true,
					'category'                => esc_html__( 'by DESSAU', 'dessau-core' ),
					'icon'                    => 'icon-wpb-elements-holder-item extended-custom-icon',
					'show_settings_on_create' => true,
					'js_view'                 => 'VcColumnView',
					'params'                  => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'dessau-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'dessau-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'background_color',
							'heading'    => esc_html__( 'Background Color', 'dessau-core' )
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'background_image',
							'heading'    => esc_html__( 'Background Image', 'dessau-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding',
							'heading'     => esc_html__( 'Padding', 'dessau-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'dessau-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'horizontal_alignment',
							'heading'    => esc_html__( 'Horizontal Alignment', 'dessau-core' ),
							'value'      => array(
								esc_html__( 'Left', 'dessau-core' )   => 'left',
								esc_html__( 'Right', 'dessau-core' )  => 'right',
								esc_html__( 'Center', 'dessau-core' ) => 'center'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'vertical_alignment',
							'heading'    => esc_html__( 'Vertical Alignment', 'dessau-core' ),
							'value'      => array(
								esc_html__( 'Middle', 'dessau-core' ) => 'middle',
								esc_html__( 'Top', 'dessau-core' )    => 'top',
								esc_html__( 'Bottom', 'dessau-core' ) => 'bottom'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'animation',
							'heading'    => esc_html__( 'Animation Type', 'dessau-core' ),
							'value'      => array(
								esc_html__( 'Default (No Animation)', 'dessau-core' )   => '',
								esc_html__( 'Element Grow In', 'dessau-core' )          => 'qodef-grow-in',
								esc_html__( 'Element Fade In Down', 'dessau-core' )     => 'qodef-fade-in-down',
								esc_html__( 'Element From Fade', 'dessau-core' )        => 'qodef-element-from-fade',
								esc_html__( 'Element From Left', 'dessau-core' )        => 'qodef-element-from-left',
								esc_html__( 'Element From Right', 'dessau-core' )       => 'qodef-element-from-right',
								esc_html__( 'Element From Top', 'dessau-core' )         => 'qodef-element-from-top',
								esc_html__( 'Element From Bottom', 'dessau-core' )      => 'qodef-element-from-bottom',
								esc_html__( 'Element Flip In', 'dessau-core' )          => 'qodef-flip-in',
								esc_html__( 'Element X Rotate', 'dessau-core' )         => 'qodef-x-rotate',
								esc_html__( 'Element Z Rotate', 'dessau-core' )         => 'qodef-z-rotate',
								esc_html__( 'Element Y Translate', 'dessau-core' )      => 'qodef-y-translate',
								esc_html__( 'Element Fade In X Rotate', 'dessau-core' ) => 'qodef-fade-in-left-x-rotate',
							)
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'animation_delay',
							'heading'    => esc_html__( 'Animation Delay (ms)', 'dessau-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'box_shadow',
							'heading'     => esc_html__( 'Enable Box Shadow', 'dessau-core' ),
							'value'       => array_flip( dessau_select_get_yes_no_select_array( false, true ) ),
							'save_always' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_1366_1600',
							'heading'     => esc_html__( 'Padding on screen size between 1366px-1600px', 'dessau-core' ),
							'description' => esc_html__( 'Please insert padding in format top right bottom left. For example 10px 0 10px 0', 'dessau-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'dessau-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_1024_1366',
							'heading'     => esc_html__( 'Padding on screen size between 1024px-1366px', 'dessau-core' ),
							'description' => esc_html__( 'Please insert padding in format top right bottom left. For example 10px 0 10px 0', 'dessau-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'dessau-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_768_1024',
							'heading'     => esc_html__( 'Padding on screen size between 768px-1024px', 'dessau-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'dessau-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'dessau-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_680_768',
							'heading'     => esc_html__( 'Padding on screen size between 680px-768px', 'dessau-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'dessau-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'dessau-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_680',
							'heading'     => esc_html__( 'Padding on screen size bellow 680px', 'dessau-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'dessau-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'dessau-core' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'           => '',
			'background_color'       => '',
			'background_image'       => '',
			'item_padding'           => '',
			'horizontal_alignment'   => '',
			'vertical_alignment'     => '',
			'animation'              => '',
			'animation_delay'        => '',
			'item_padding_1366_1600' => '',
			'item_padding_1024_1366' => '',
			'item_padding_768_1024'  => '',
			'item_padding_680_768'   => '',
			'item_padding_680'       => '',
			'box_shadow'             => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['content']           = $content;
		$params['holder_classes']    = $this->getHolderClasses( $params );
		$params['holder_rand_class'] = 'qodef-eh-custom-' . mt_rand( 1000, 10000 );
		$params['holder_styles']     = $this->getHolderStyles( $params );
		$params['content_styles']    = $this->getContentStyles( $params );
		$params['holder_data']       = $this->getHolderData( $params );

		$html = dessau_core_get_shortcode_module_template_part( 'templates/elements-holder-item-template', 'elements-holder', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['vertical_alignment'] ) ? 'qodef-vertical-alignment-' . $params['vertical_alignment'] : '';
		$holderClasses[] = ! empty( $params['horizontal_alignment'] ) ? 'qodef-horizontal-alignment-' . $params['horizontal_alignment'] : '';
		$holderClasses[] = ! empty( $params['animation'] ) ? $params['animation'] : '';
		$holderClasses[] =  $params['box_shadow'] === 'yes' ? 'qodef-eh-shadow' : '';

		return implode( ' ', $holderClasses );
	}
	
	private function getHolderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['background_color'] ) ) {
			$styles[] = 'background-color: ' . $params['background_color'];
		}
		
		if ( ! empty( $params['background_image'] ) ) {
			$styles[] = 'background-image: url(' . wp_get_attachment_url( $params['background_image'] ) . ')';
		}
		
		return implode( ';', $styles );
	}
	
	private function getContentStyles( $params ) {
		$styles = array();
		
		if ( $params['item_padding'] !== '' ) {
			$styles[] = 'padding: ' . $params['item_padding'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getHolderData( $params ) {
		$data                    = array();
		$data['data-item-class'] = $params['holder_rand_class'];
		
		if ( ! empty( $params['animation'] ) ) {
			$data['data-animation'] = $params['animation'];
		}
		
		if ( $params['animation_delay'] !== '' ) {
			$data['data-animation-delay'] = esc_attr( $params['animation_delay'] );
		}
		
		if ( $params['item_padding_1366_1600'] !== '' ) {
			$data['data-1366-1600'] = $params['item_padding_1366_1600'];
		}
		
		if ( $params['item_padding_1024_1366'] !== '' ) {
			$data['data-1024-1366'] = $params['item_padding_1024_1366'];
		}
		
		if ( $params['item_padding_768_1024'] !== '' ) {
			$data['data-768-1024'] = $params['item_padding_768_1024'];
		}
		
		if ( $params['item_padding_680_768'] !== '' ) {
			$data['data-680-768'] = $params['item_padding_680_768'];
		}
		
		if ( $params['item_padding_680'] !== '' ) {
			$data['data-680'] = $params['item_padding_680'];
		}
		
		return $data;
	}
}
