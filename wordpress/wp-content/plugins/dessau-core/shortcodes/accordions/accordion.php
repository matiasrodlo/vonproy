<?php
namespace DessauCore\CPT\Shortcodes\Accordion;

use DessauCore\Lib;

class Accordion implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'qodef_accordion';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                    => esc_html__( 'Accordion', 'dessau-core' ),
					'base'                    => $this->base,
					'as_parent'               => array( 'only' => 'qodef_accordion_tab' ),
					'content_element'         => true,
					'category'                => esc_html__( 'by DESSAU', 'dessau-core' ),
					'icon'                    => 'icon-wpb-accordion extended-custom-icon',
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
							'type'       => 'dropdown',
							'param_name' => 'style',
							'heading'    => esc_html__( 'Style', 'dessau-core' ),
							'value'      => array(
								esc_html__( 'Accordion', 'dessau-core' ) => 'accordion',
								esc_html__( 'Toggle', 'dessau-core' )    => 'toggle'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'content_width',
							'heading'    => esc_html__( 'Content Width', 'dessau-core' ),
							'value'      => array(
								esc_html__( 'In Grid', 'dessau-core' )    => 'in-grid',
								esc_html__( 'Full Width', 'dessau-core' ) => 'full-width',
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'background_skin',
							'heading'    => esc_html__( 'Background Skin', 'dessau-core' ),
							'value'      => array(
								esc_html__( 'Default', 'dessau-core' ) => '',
								esc_html__( 'White', 'dessau-core' )   => 'white'
							),
							'dependency' => array( 'element' => 'layout', 'value' => array( 'boxed' ) )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'custom_class'    => '',
			'title'           => 'h5',
			'style'           => 'accordion',
			'background_skin' => '',
			'content_width'   => 'in-grid',
		);
		$params       = shortcode_atts( $default_atts, $atts );
		
		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['content']        = $content;
		
		$output = dessau_core_get_shortcode_module_template_part( 'templates/accordion-holder-template', 'accordions', '', $params );
		
		return $output;
	}
	
	private function getHolderClasses( $params ) {
		$holder_classes = array( 'qodef-ac-default' );
		
		$holder_classes[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holder_classes[] = $params['style'] == 'toggle' ? 'qodef-toggle' : 'qodef-accordion';
		$holder_classes[] = ! empty( $params['content_width'] ) ? 'qodef-' . esc_attr( $params['content_width'] ) : '';
		$holder_classes[] = ! empty( $params['background_skin'] ) ? 'qodef-' . esc_attr( $params['background_skin'] ) . '-skin' : '';
		
		return implode( ' ', $holder_classes );
	}
}
