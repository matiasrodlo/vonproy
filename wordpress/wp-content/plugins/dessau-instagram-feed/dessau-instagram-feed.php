<?php
/*
Plugin Name: Dessau Instagram Feed
Description: Plugin that adds Instagram feed functionality to our theme
Author: Select Themes
Version: 1.0.1
*/
define('DESSAU_INSTAGRAM_FEED_VERSION', '1.0.1');
define('DESSAU_INSTAGRAM_ABS_PATH', dirname(__FILE__));
define('DESSAU_INSTAGRAM_REL_PATH', dirname(plugin_basename(__FILE__ )));

if (!function_exists('dessau_instagram_theme_installed')) {
	/**
	 * Checks whether theme is installed or not
	 * @return bool
	 */
	function dessau_instagram_theme_installed() {
		return defined('SELECT_ROOT');
	}
}

include_once 'load.php';

if(!function_exists('dessau_instagram_feed_text_domain')) {
    /**
     * Loads plugin text domain so it can be used in translation
     */
    function dessau_instagram_feed_text_domain() {
        load_plugin_textdomain('dessau-instagram-feed', false, DESSAU_INSTAGRAM_REL_PATH.'/languages');
    }

    add_action('plugins_loaded', 'dessau_instagram_feed_text_domain');
}
