<?php 
/**
 * @package 	WordPress
 * @subpackage 	Startup Company
 * @version		1.0.0
 * 
 * Theme Admin Settings
 * Created by CMSMasters
 * 
 */


/* Color Settings */
function startup_company_theme_options_color_fields($options, $tab) {
	$defaults = startup_company_color_schemes_defaults();
	
	
	if ($tab != 'header' && $tab != 'navigation' && $tab != 'header_top') {
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => 'startup-company' . '_' . $tab . '_secondary', 
			'title' => esc_html__('Secondary Color', 'startup-company'), 
			'desc' => esc_html__('Secondary color for some elements', 'startup-company'), 
			'type' => 'rgba', 
			'std' => (isset($defaults[$tab])) ? $defaults[$tab]['secondary'] : $defaults['default']['secondary'] 
		);
	}
	
	
	return $options;
}

add_filter('cmsmasters_options_color_fields_filter', 'startup_company_theme_options_color_fields', 10, 2);



