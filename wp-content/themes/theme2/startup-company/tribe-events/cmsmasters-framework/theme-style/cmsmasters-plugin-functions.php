<?php
/**
 * @package 	WordPress
 * @subpackage 	Startup Company
 * @version 	1.0.0
 * 
 * Tribe Events Functions
 * Created by CMSMasters
 * 
 */


/* Load Parts */
require_once(get_template_directory() . '/tribe-events/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/admin/plugin-settings.php');
require_once(get_template_directory() . '/tribe-events/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/function/plugin-colors.php');
require_once(get_template_directory() . '/tribe-events/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/function/plugin-fonts.php');


/* Register CSS Styles and Scripts */
function startup_company_tribe_events_register_styles_scripts() {
	// Styles
	wp_enqueue_style('startup-company-tribe-events-style', get_template_directory_uri() . '/tribe-events/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/css/plugin-style.css', array(), '1.0.0', 'screen');
	
	wp_enqueue_style('startup-company-tribe-events-adaptive', get_template_directory_uri() . '/tribe-events/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/css/plugin-adaptive.css', array(), '1.0.0', 'screen');
	
	
	if (is_rtl()) {
		wp_enqueue_style('startup-company-tribe-events-rtl', get_template_directory_uri() . '/tribe-events/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/css/plugin-rtl.css', array(), '1.0.0', 'screen');
	}
}

add_action('wp_enqueue_scripts', 'startup_company_tribe_events_register_styles_scripts');


/* Replace Styles */
function startup_company_tribe_events_stylesheet_url() {
	$styleUrl = '';
	
	
	return $styleUrl;
}

add_filter('tribe_events_stylesheet_url', 'startup_company_tribe_events_stylesheet_url');


/* Replace Pro Styles */
function startup_company_tribe_events_pro_stylesheet_url() {
	$styleUrl = '';
	
	
	return $styleUrl;
}

add_filter('tribe_events_pro_stylesheet_url', 'startup_company_tribe_events_pro_stylesheet_url');


/* Replace Widget Styles */
function startup_company_tribe_events_pro_widget_calendar_stylesheet_url() {
	$styleUrl = '';
	
	
	return $styleUrl;
}

add_filter('tribe_events_pro_widget_calendar_stylesheet_url', 'startup_company_tribe_events_pro_widget_calendar_stylesheet_url');


/* Replace Responsive Styles */
function startup_company_tribe_events_mobile_breakpoint() {
    return 768;
}

add_filter('tribe_events_mobile_breakpoint', 'startup_company_tribe_events_mobile_breakpoint');

