<?php

//define constants
define( 'SELECT_ROOT', get_template_directory_uri() );
define( 'SELECT_ROOT_DIR', get_template_directory() );
define( 'SELECT_ASSETS_ROOT', get_template_directory_uri() . '/assets' );
define( 'SELECT_ASSETS_ROOT_DIR', get_template_directory() . '/assets' );
define( 'SELECT_FRAMEWORK_ROOT', get_template_directory_uri() . '/framework' );
define( 'SELECT_FRAMEWORK_ROOT_DIR', get_template_directory() . '/framework' );
define( 'SELECT_FRAMEWORK_ADMIN_ASSETS_ROOT', get_template_directory_uri() . '/framework/admin/assets' );
define( 'SELECT_FRAMEWORK_ICONS_ROOT', get_template_directory_uri() . '/framework/lib/icons-pack' );
define( 'SELECT_FRAMEWORK_ICONS_ROOT_DIR', get_template_directory() . '/framework/lib/icons-pack' );
define( 'SELECT_FRAMEWORK_MODULES_ROOT', get_template_directory_uri() . '/framework/modules' );
define( 'SELECT_FRAMEWORK_MODULES_ROOT_DIR', get_template_directory() . '/framework/modules' );
define( 'SELECT_FRAMEWORK_HEADER_ROOT', get_template_directory_uri() . '/framework/modules/header' );
define( 'SELECT_FRAMEWORK_HEADER_ROOT_DIR', get_template_directory() . '/framework/modules/header' );
define( 'SELECT_FRAMEWORK_HEADER_TYPES_ROOT', SELECT_FRAMEWORK_HEADER_ROOT . '/types' );
define( 'SELECT_FRAMEWORK_HEADER_TYPES_ROOT_DIR', SELECT_FRAMEWORK_HEADER_ROOT_DIR . '/types' );
define( 'SELECT_FRAMEWORK_SEARCH_ROOT', get_template_directory_uri() . '/framework/modules/search' );
define( 'SELECT_FRAMEWORK_SEARCH_ROOT_DIR', get_template_directory() . '/framework/modules/search' );
define( 'SELECT_THEME_ENV', 'false' );
define( 'SELECT_PROFILE_SLUG', 'select' );
define( 'SELECT_OPTIONS_SLUG', 'dessau_select_theme_menu');

//include necessary files
include_once SELECT_ROOT_DIR . '/framework/qodef-framework.php';
include_once SELECT_ROOT_DIR . '/includes/nav-menu/qodef-menu.php';
require_once SELECT_ROOT_DIR . '/includes/plugins/class-tgm-plugin-activation.php';
include_once SELECT_ROOT_DIR . '/includes/plugins/plugins-activation.php';
include_once SELECT_ROOT_DIR . '/assets/custom-styles/general-custom-styles.php';
include_once SELECT_ROOT_DIR . '/assets/custom-styles/general-custom-styles-responsive.php';

if ( file_exists( SELECT_ROOT_DIR . '/export' ) ) {
	include_once SELECT_ROOT_DIR . '/export/export.php';
}

if ( ! is_admin() ) {
	include_once SELECT_ROOT_DIR . '/includes/qodef-body-class-functions.php';
	include_once SELECT_ROOT_DIR . '/includes/qodef-loading-spinners.php';
}