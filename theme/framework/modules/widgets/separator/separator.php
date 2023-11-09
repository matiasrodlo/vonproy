<?php

class DessauSelectSeparatorWidget extends DessauSelectWidget {
	public function __construct() {
		parent::__construct(
			'qodef_separator_widget',
			esc_html__( 'Dessau Separator Widget', 'dessau' ),
			array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'dessau' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'dessau' ),
				'options' => array(
					'normal'     => esc_html__( 'Normal', 'dessau' ),
					'full-width' => esc_html__( 'Full Width', 'dessau' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'position',
				'title'   => esc_html__( 'Position', 'dessau' ),
				'options' => array(
					'center' => esc_html__( 'Center', 'dessau' ),
					'left'   => esc_html__( 'Left', 'dessau' ),
					'right'  => esc_html__( 'Right', 'dessau' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'border_style',
				'title'   => esc_html__( 'Style', 'dessau' ),
				'options' => array(
					'solid'  => esc_html__( 'Solid', 'dessau' ),
					'dashed' => esc_html__( 'Dashed', 'dessau' ),
					'dotted' => esc_html__( 'Dotted', 'dessau' )
				)
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'dessau' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'width',
				'title' => esc_html__( 'Width (px or %)', 'dessau' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'thickness',
				'title' => esc_html__( 'Thickness (px)', 'dessau' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'top_margin',
				'title' => esc_html__( 'Top Margin (px or %)', 'dessau' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'bottom_margin',
				'title' => esc_html__( 'Bottom Margin (px or %)', 'dessau' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		//prepare variables
		$params = '';
		
		//is instance empty?
		if ( is_array( $instance ) && count( $instance ) ) {
			//generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
		}
		
		echo '<div class="widget qodef-separator-widget">';
			echo do_shortcode( "[qodef_separator $params]" ); // XSS OK
		echo '</div>';
	}
}