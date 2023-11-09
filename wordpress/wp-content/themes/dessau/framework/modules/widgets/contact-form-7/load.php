<?php

if ( dessau_select_contact_form_7_installed() ) {
	include_once SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'dessau_select_register_widgets', 'dessau_select_register_cf7_widget' );
}

if ( ! function_exists( 'dessau_select_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function dessau_select_register_cf7_widget( $widgets ) {
		$widgets[] = 'DessauSelectContactForm7Widget';
		
		return $widgets;
	}
}