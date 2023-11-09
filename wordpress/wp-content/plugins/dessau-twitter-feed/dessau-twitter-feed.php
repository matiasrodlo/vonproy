<?php
/*
Plugin Name: Dessau Twitter Feed
Description: Plugin that adds Twitter feed functionality to our theme
Author: Select Themes
Version: 1.0.1
*/

define( 'DESSAU_TWITTER_FEED_VERSION', '1.0.1' );
define( 'DESSAU_TWITTER_ABS_PATH', dirname( __FILE__ ) );
define( 'DESSAU_TWITTER_REL_PATH', dirname( plugin_basename( __FILE__ ) ) );
define( 'DESSAU_TWITTER_URL_PATH', plugin_dir_url( __FILE__ ) );
define( 'DESSAU_TWITTER_ASSETS_PATH', DESSAU_TWITTER_ABS_PATH . '/assets' );
define( 'DESSAU_TWITTER_ASSETS_URL_PATH', DESSAU_TWITTER_URL_PATH . 'assets' );
define( 'DESSAU_TWITTER_SHORTCODES_PATH', DESSAU_TWITTER_ABS_PATH . '/shortcodes' );
define( 'DESSAU_TWITTER_SHORTCODES_URL_PATH', DESSAU_TWITTER_URL_PATH . 'shortcodes' );

include_once 'load.php';

if ( ! function_exists( 'dessau_twitter_theme_installed' ) ) {
	/**
	 * Checks whether theme is installed or not
	 * @return bool
	 */
	function dessau_twitter_theme_installed() {
		return defined( 'SELECT_ROOT' );
	}
}

if ( ! function_exists( 'dessau_twitter_feed_text_domain' ) ) {
	/**
	 * Loads plugin text domain so it can be used in translation
	 */
	function dessau_twitter_feed_text_domain() {
		load_plugin_textdomain( 'dessau-twitter-feed', false, DESSAU_TWITTER_REL_PATH . '/languages' );
	}
	
	add_action( 'plugins_loaded', 'dessau_twitter_feed_text_domain' );
}