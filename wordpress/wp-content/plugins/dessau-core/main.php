<?php
/*
Plugin Name: Dessau Core
Description: Plugin that adds all post types needed by our theme
Author: Select Themes
Version: 1.1.2
*/

require_once 'load.php';

add_action('after_setup_theme', array(DessauCore\CPT\PostTypesRegister::getInstance(), 'register'));

if ( !function_exists('dessau_core_activation') ) {
	/**
	 * Triggers when plugin is activated. It calls flush_rewrite_rules
	 * and defines dessau_select_core_on_activate action
	 */
	function dessau_core_activation() {
		do_action('dessau_select_core_on_activate');
		
		DessauCore\CPT\PostTypesRegister::getInstance()->register();
		flush_rewrite_rules();
	}
	
	register_activation_hook(__FILE__, 'dessau_core_activation');
}

if ( !function_exists('dessau_core_text_domain') ) {
	/**
	 * Loads plugin text domain so it can be used in translation
	 */
	function dessau_core_text_domain() {
		load_plugin_textdomain('dessau-core', false, DESSAU_CORE_REL_PATH . '/languages');
	}
	
	add_action('plugins_loaded', 'dessau_core_text_domain');
}

if ( !function_exists('dessau_core_version_class') ) {
	/**
	 * Adds plugins version class to body
	 *
	 * @param $classes
	 *
	 * @return array
	 */
	function dessau_core_version_class($classes) {
		$classes[] = 'dessau-core-' . DESSAU_CORE_VERSION;
		
		return $classes;
	}
	
	add_filter('body_class', 'dessau_core_version_class');
}

if ( !function_exists('dessau_core_theme_installed') ) {
	/**
	 * Checks whether theme is installed or not
	 * @return bool
	 */
	function dessau_core_theme_installed() {
		return defined('SELECT_ROOT');
	}
}

if ( !function_exists('dessau_core_is_woocommerce_installed') ) {
	/**
	 * Function that checks if woocommerce is installed
	 * @return bool
	 */
	function dessau_core_is_woocommerce_installed() {
		return function_exists('is_woocommerce');
	}
}

if ( !function_exists('dessau_core_is_woocommerce_integration_installed') ) {
	//is Select Woocommerce Integration installed?
	function dessau_core_is_woocommerce_integration_installed() {
		return defined('DESSAU_CHECKOUT_INTEGRATION');
	}
}

if ( !function_exists('dessau_core_is_revolution_slider_installed') ) {
	function dessau_core_is_revolution_slider_installed() {
		return class_exists('RevSliderFront');
	}
}

if ( !function_exists('dessau_core_is_wpml_installed') ) {
	/**
	 * Function that checks if WPML plugin is installed
	 * @return bool
	 *
	 * @version 0.1
	 */
	function dessau_core_is_wpml_installed() {
		return defined('ICL_SITEPRESS_VERSION');
	}
}

if ( !function_exists('dessau_core_theme_menu') ) {
	/**
	 * Function that generates admin menu for options page.
	 * It generates one admin page per options page.
	 */
	function dessau_core_theme_menu() {
		if ( dessau_core_theme_installed() ) {
			
			global $dessau_select_Framework;
			dessau_select_init_theme_options();
			
			$page_hook_suffix = add_menu_page(
				esc_html__('Dessau Options', 'dessau-core'), // The value used to populate the browser's title bar when the menu page is active
				esc_html__('Dessau Options', 'dessau-core'), // The text of the menu in the administrator's sidebar
				'administrator',                            // What roles are able to access the menu
				SELECT_OPTIONS_SLUG,            // The ID used to bind submenu items to this menu
				array($dessau_select_Framework->getSkin(), 'renderOptions'), // The callback function used to render this menu
				$dessau_select_Framework->getSkin()->getSkinURI() . '/assets/img/admin-logo-icon.png', // Icon For menu Item
				100                                                                                            // Position
			);
			
			foreach ( $dessau_select_Framework->qodeOptions->adminPages as $key => $value ) {
				$slug = "";
				
				if ( !empty($value->slug) ) {
					$slug = "_tab" . $value->slug;
				}
				
				$subpage_hook_suffix = add_submenu_page(
					SELECT_OPTIONS_SLUG,
					esc_html__('Dessau Options - ', 'dessau-core') . $value->title, // The value used to populate the browser's title bar when the menu page is active
					$value->title,                                                 // The text of the menu in the administrator's sidebar
					'administrator',                                               // What roles are able to access the menu
					SELECT_OPTIONS_SLUG . $slug,                       // The ID used to bind submenu items to this menu
					array($dessau_select_Framework->getSkin(), 'renderOptions')
				);
				
				add_action('admin_print_scripts-' . $subpage_hook_suffix, 'dessau_select_enqueue_admin_scripts');
				add_action('admin_print_styles-' . $subpage_hook_suffix, 'dessau_select_enqueue_admin_styles');
			};
			
			add_action('admin_print_scripts-' . $page_hook_suffix, 'dessau_select_enqueue_admin_scripts');
			add_action('admin_print_styles-' . $page_hook_suffix, 'dessau_select_enqueue_admin_styles');
		}
	}
	
	add_action('admin_menu', 'dessau_core_theme_menu');
}

if ( !function_exists('dessau_core_theme_menu_backup_options') ) {
	/**
	 * Function that generates admin menu for options page.
	 * It generates one admin page per options page.
	 */
	function dessau_core_theme_menu_backup_options() {
		if ( dessau_core_theme_installed() ) {
			global $dessau_select_Framework;
			
			$slug = "_backup_options";
			$page_hook_suffix = add_submenu_page(
				SELECT_OPTIONS_SLUG,
				esc_html__('Dessau Options - Backup Options', 'dessau-core'), // The value used to populate the browser's title bar when the menu page is active
				esc_html__('Backup Options', 'dessau-core'),                // The text of the menu in the administrator's sidebar
				'administrator',                                             // What roles are able to access the menu
				SELECT_OPTIONS_SLUG . $slug,                     // The ID used to bind submenu items to this menu
				array($dessau_select_Framework->getSkin(), 'renderBackupOptions')
			);
			
			add_action('admin_print_scripts-' . $page_hook_suffix, 'dessau_select_enqueue_admin_scripts');
			add_action('admin_print_styles-' . $page_hook_suffix, 'dessau_select_enqueue_admin_styles');
		}
	}
	
	add_action('admin_menu', 'dessau_core_theme_menu_backup_options');
}

if ( !function_exists('dessau_core_theme_admin_bar_menu_options') ) {
	/**
	 * Add a link to the WP Toolbar
	 */
	if ( dessau_core_theme_installed() ) {
		function dessau_core_theme_admin_bar_menu_options($wp_admin_bar) {
			global $dessau_select_Framework;
			
			$args = array(
				'id'    => 'dessau-admin-bar-options',
				'title' => sprintf('<span class="ab-icon dashicons-before dashicons-admin-generic"></span> %s', esc_html__('Dessau Options', 'dessau-core')),
				'href'  => esc_url(admin_url('admin.php?page=' . SELECT_OPTIONS_SLUG))
			);
			
			$wp_admin_bar->add_node($args);
			
			foreach ( $dessau_select_Framework->qodeOptions->adminPages as $key => $value ) {
				$suffix = !empty($value->slug) ? '_tab' . $value->slug : '';
				
				$args = array(
					'id'     => 'dessau-admin-bar-options-' . $suffix,
					'title'  => $value->title,
					'parent' => 'dessau-admin-bar-options',
					'href'   => esc_url(admin_url('admin.php?page=' . SELECT_OPTIONS_SLUG . $suffix))
				);
				
				$wp_admin_bar->add_node($args);
			};
		}
		
		add_action('admin_bar_menu', 'dessau_core_theme_admin_bar_menu_options', 999);
	}
	
}