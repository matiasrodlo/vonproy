<?php

class DessauSelectButtonWidget extends DessauSelectWidget {
	public function __construct() {
		parent::__construct(
			'qodef_button_widget',
			esc_html__( 'Dessau Button Widget', 'dessau' ),
			array( 'description' => esc_html__( 'Add button element to widget areas', 'dessau' ) )
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
					'solid'   => esc_html__( 'Solid', 'dessau' ),
					'outline' => esc_html__( 'Outline', 'dessau' ),
					'simple'  => esc_html__( 'Simple', 'dessau' )
				)
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'size',
				'title'       => esc_html__( 'Size', 'dessau' ),
				'options'     => array(
					'small'  => esc_html__( 'Small', 'dessau' ),
					'medium' => esc_html__( 'Medium', 'dessau' ),
					'large'  => esc_html__( 'Large', 'dessau' ),
					'huge'   => esc_html__( 'Huge', 'dessau' )
				),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'dessau' )
			),
			array(
				'type'    => 'textfield',
				'name'    => 'text',
				'title'   => esc_html__( 'Text', 'dessau' ),
				'default' => esc_html__( 'Button Text', 'dessau' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'link',
				'title' => esc_html__( 'Link', 'dessau' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'target',
				'title'   => esc_html__( 'Link Target', 'dessau' ),
				'options' => dessau_select_get_link_target_array()
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'dessau' )
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'hover_color',
				'title' => esc_html__( 'Hover Color', 'dessau' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'background_color',
				'title'       => esc_html__( 'Background Color', 'dessau' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'dessau' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_background_color',
				'title'       => esc_html__( 'Hover Background Color', 'dessau' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'dessau' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'border_color',
				'title'       => esc_html__( 'Border Color', 'dessau' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'dessau' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_border_color',
				'title'       => esc_html__( 'Hover Border Color', 'dessau' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'dessau' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__( 'Margin', 'dessau' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'dessau' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$params = '';
		
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		// Filter out all empty params
		$instance = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		
		// Default values
		if ( ! isset( $instance['text'] ) ) {
			$instance['text'] = 'Button Text';
		}
		
		// Generate shortcode params
		foreach ( $instance as $key => $value ) {
			$params .= " $key='$value' ";
		}
		
		echo '<div class="widget qodef-button-widget">';
			echo do_shortcode( "[qodef_button $params]" ); // XSS OK
		echo '</div>';
	}
}