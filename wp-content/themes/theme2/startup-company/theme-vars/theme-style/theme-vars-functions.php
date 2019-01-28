<?php
/**
 * @package 	WordPress
 * @subpackage 	Startup Company
 * @version 	1.0.6
 * 
 * Theme Vars Functions
 * Created by CMSMasters
 * 
 */


/* Register CSS Styles */
function startup_company_vars_register_css_styles() {
	wp_enqueue_style('startup-company-theme-vars-style', get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/css/vars-style.css', array('startup-company-retina'), '1.0.0', 'screen, print');
}

add_action('wp_enqueue_scripts', 'startup_company_vars_register_css_styles');

