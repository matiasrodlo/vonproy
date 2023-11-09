<?php

if ( ! function_exists( 'dessau_core_import_object' ) ) {
	function dessau_core_import_object() {
		$dessau_core_import_object = new DessauCoreImport();
	}
	
	add_action( 'init', 'dessau_core_import_object' );
}

if ( ! function_exists( 'dessau_core_data_import' ) ) {
	function dessau_core_data_import() {
		$importObject = DessauCoreImport::getInstance();
		
		if ( $_POST['import_attachments'] == 1 ) {
			$importObject->attachments = true;
		} else {
			$importObject->attachments = false;
		}
		
		$folder = "dessau/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_content( $folder . $_POST['xml'] );
		
		die();
	}
	
	add_action( 'wp_ajax_dessau_core_data_import', 'dessau_core_data_import' );
}

if ( ! function_exists( 'dessau_core_widgets_import' ) ) {
	function dessau_core_widgets_import() {
		$importObject = DessauCoreImport::getInstance();
		
		$folder = "dessau/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_widgets( $folder . 'widgets.txt', $folder . 'custom_sidebars.txt' );
		
		die();
	}
	
	add_action( 'wp_ajax_dessau_core_widgets_import', 'dessau_core_widgets_import' );
}

if ( ! function_exists( 'dessau_core_options_import' ) ) {
	function dessau_core_options_import() {
		$importObject = DessauCoreImport::getInstance();
		
		$folder = "dessau/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_options( $folder . 'options.txt' );
		
		die();
	}
	
	add_action( 'wp_ajax_dessau_core_options_import', 'dessau_core_options_import' );
}

if ( ! function_exists( 'dessau_core_other_import' ) ) {
	function dessau_core_other_import() {
		$importObject = DessauCoreImport::getInstance();
		
		$folder = "dessau/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_options( $folder . 'options.txt' );
		$importObject->import_widgets( $folder . 'widgets.txt', $folder . 'custom_sidebars.txt' );
		$importObject->import_menus( $folder . 'menus.txt' );
		$importObject->import_settings_pages( $folder . 'settingpages.txt' );

		$importObject->qodef_update_meta_fields_after_import($folder);
		$importObject->qodef_update_options_after_import($folder);

		if ( dessau_core_is_revolution_slider_installed() ) {
			$importObject->rev_slider_import( $folder );
		}
		
		die();
	}
	
	add_action( 'wp_ajax_dessau_core_other_import', 'dessau_core_other_import' );
}