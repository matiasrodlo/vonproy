<?php

if ( ! function_exists( 'dessau_select_vertical_closed_icon_styles' ) ) {
	function dessau_select_vertical_closed_icon_styles() {
		$icon_color       = dessau_select_options()->getOptionValue( 'vertical_closed_icon_color' );
		$icon_hover_color = dessau_select_options()->getOptionValue( 'vertical_closed_icon_hover_color' );
		
		$icon_hover_selector = array(
			'.qodef-vertical-area-opener:hover'
		);
		
		if ( ! empty( $icon_color ) ) {
			echo dessau_select_dynamic_css( '.qodef-vertical-area-opener', array(
				'color' => $icon_color
			) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo dessau_select_dynamic_css( $icon_hover_selector, array(
				'color' => $icon_hover_color . '!important'
			) );
		}
	}
	
	add_action( 'dessau_select_style_dynamic', 'dessau_select_vertical_closed_icon_styles' );
}