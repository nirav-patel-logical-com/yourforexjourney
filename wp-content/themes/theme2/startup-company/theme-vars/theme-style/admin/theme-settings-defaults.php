<?php 
/**
 * @package 	WordPress
 * @subpackage 	Startup Company
 * @version		1.0.6
 * 
 * Theme Settings Defaults
 * Created by CMSMasters
 * 
 */


/* Theme Settings General Default Values */
if (!function_exists('startup_company_settings_general_defaults')) {

function startup_company_settings_general_defaults($id = false) {
	$settings = array( 
		'general' => array( 
			'startup-company' . '_theme_layout' => 			'liquid', 
			'startup-company' . '_logo_type' => 			'image', 
			'startup-company' . '_logo_url' => 				'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo.png', 
			'startup-company' . '_logo_url_retina' => 		'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_retina.png', 
			'startup-company' . '_logo_title' => 			get_bloginfo('name') ? get_bloginfo('name') : 'Startup Company', 
			'startup-company' . '_logo_subtitle' => 		'', 
			'startup-company' . '_logo_custom_color' => 	0, 
			'startup-company' . '_logo_title_color' => 		'', 
			'startup-company' . '_logo_subtitle_color' => 	'' 
		), 
		'bg' => array( 
			'startup-company' . '_bg_col' => 			'#ffffff', 
			'startup-company' . '_bg_img_enable' => 	0, 
			'startup-company' . '_bg_img' => 			'', 
			'startup-company' . '_bg_rep' => 			'no-repeat', 
			'startup-company' . '_bg_pos' => 			'top center', 
			'startup-company' . '_bg_att' => 			'scroll', 
			'startup-company' . '_bg_size' => 			'cover' 
		), 
		'header' => array( 
			'startup-company' . '_fixed_header' => 					1, 
			'startup-company' . '_header_overlaps' => 				1, 
			'startup-company' . '_header_top_line' => 				0, 
			'startup-company' . '_header_top_height' => 			'40', 
			'startup-company' . '_header_top_line_short_info' => 	'', 
			'startup-company' . '_header_top_line_add_cont' => 		'social', 
			'startup-company' . '_header_styles' => 				'default', 
			'startup-company' . '_header_mid_height' => 			'120', 
			'startup-company' . '_header_bot_height' => 			'68', 
			'startup-company' . '_header_search' => 				0, 
			'startup-company' . '_header_add_cont' => 				'social', 
			'startup-company' . '_header_add_cont_cust_html' => 	'' 
		), 
		'content' => array( 
			'startup-company' . '_layout' => 					'fullwidth', 
			'startup-company' . '_archives_layout' => 			'fullwidth', 
			'startup-company' . '_search_layout' => 			'fullwidth', 
			'startup-company' . '_other_layout' => 				'fullwidth', 
			'startup-company' . '_heading_alignment' => 		'center', 
			'startup-company' . '_heading_scheme' => 			'default', 
			'startup-company' . '_heading_bg_image_enable' => 	1, 
			'startup-company' . '_heading_bg_image' => 			'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/headline_bg.jpg', 
			'startup-company' . '_heading_bg_repeat' => 		'no-repeat', 
			'startup-company' . '_heading_bg_attachment' => 	'scroll', 
			'startup-company' . '_heading_bg_size' => 			'cover', 
			'startup-company' . '_heading_bg_color' => 			'', 
			'startup-company' . '_heading_height' => 			'430', 
			'startup-company' . '_breadcrumbs' => 				1, 
			'startup-company' . '_bottom_scheme' => 			'footer', 
			'startup-company' . '_bottom_sidebar' => 			1, 
			'startup-company' . '_bottom_sidebar_layout' => 	'14141414' 
		), 
		'footer' => array( 
			'startup-company' . '_footer_scheme' => 				'footer', 
			'startup-company' . '_footer_type' => 					'small', 
			'startup-company' . '_footer_additional_content' => 	'social', 
			'startup-company' . '_footer_logo' => 					1, 
			'startup-company' . '_footer_logo_url' => 				'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_footer.png', 
			'startup-company' . '_footer_logo_url_retina' => 		'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_footer_retina.png', 
			'startup-company' . '_footer_nav' => 					1, 
			'startup-company' . '_footer_social' => 				1, 
			'startup-company' . '_footer_html' => 					'', 
			'startup-company' . '_footer_copyright' => 				'Startup Company' . ' &copy; ' . date('Y') . ' / ' . esc_html__('All Rights Reserved', 'startup-company') 
		) 
	);
	
	
	$settings = apply_filters('startup_company_settings_general_defaults_filter', $settings);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



/* Add Google Font */
if (!function_exists('startup_company_add_google_font')) {

function startup_company_add_google_font($fonts) {
	$fonts_new = array();
	
	foreach ($fonts as $key => $val) {
		if ($val == 'Roboto') {
			$fonts_new['Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic'] = 'Roboto';
		} else {
			$fonts_new[$key] = $val;
		}
	}

	$fonts = $fonts_new;
	
	
	return $fonts;
}

}

add_filter('startup_company_google_fonts_list_filter', 'startup_company_add_google_font');



/* Theme Settings Fonts Default Values */
if (!function_exists('startup_company_settings_font_defaults')) {

function startup_company_settings_font_defaults($id = false) {
	$settings = array( 
		'content' => array( 
			'startup-company' . '_content_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'15', 
				'line_height' => 		'22', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal' 
			) 
		), 
		'link' => array( 
			'startup-company' . '_link_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'15', 
				'line_height' => 		'22', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'startup-company' . '_link_hover_decoration' => 	'none' 
		), 
		'nav' => array( 
			'startup-company' . '_nav_title_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'14', 
				'line_height' => 		'20', 
				'font_weight' => 		'400', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			), 
			'startup-company' . '_nav_dropdown_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'13', 
				'line_height' => 		'20', 
				'font_weight' => 		'300', 
				'font_style' => 		'italic', 
				'text_transform' => 	'none' 
			) 
		), 
		'heading' => array( 
			'startup-company' . '_h1_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'36', 
				'line_height' => 		'44', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'startup-company' . '_h2_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'24', 
				'line_height' => 		'30', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'startup-company' . '_h3_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'20', 
				'line_height' => 		'26', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'startup-company' . '_h4_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'18', 
				'line_height' => 		'24', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'startup-company' . '_h5_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'15', 
				'line_height' => 		'22', 
				'font_weight' => 		'300', 
				'font_style' => 		'italic', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'startup-company' . '_h6_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'14', 
				'line_height' => 		'20', 
				'font_weight' => 		'500', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			) 
		), 
		'other' => array( 
			'startup-company' . '_button_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'14', 
				'line_height' => 		'40', 
				'font_weight' => 		'500', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			), 
			'startup-company' . '_small_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'11', 
				'line_height' => 		'20', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			), 
			'startup-company' . '_input_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'14', 
				'line_height' => 		'20', 
				'font_weight' => 		'300', 
				'font_style' => 		'normal' 
			), 
			'startup-company' . '_quote_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic', 
				'font_size' => 			'24', 
				'line_height' => 		'36', 
				'font_weight' => 		'300', 
				'font_style' => 		'italic' 
			) 
		) 
	);
	
	
	$settings = apply_filters('startup_company_settings_font_defaults_filter', $settings);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// WP Color Picker Palettes
if (!function_exists('cmsmasters_color_picker_palettes')) {

function cmsmasters_color_picker_palettes() {
	$palettes = array( 
		'#7e8890', 
		'#313131', 
		'#aaaaad', 
		'#292834', 
		'#ffffff', 
		'#f9f9fa', 
		'#d2d2d8', 
		'#f15039' 
	);
	
	
	return apply_filters('cmsmasters_color_picker_palettes_filter', $palettes);
}

}



// Theme Settings Color Schemes Default Colors
if (!function_exists('startup_company_color_schemes_defaults')) {

function startup_company_color_schemes_defaults($id = false) {
	$settings = array( 
		'default' => array( // content default color scheme
			'color' => 		'#7e8890', 
			'link' => 		'#313131', 
			'hover' => 		'#aaaaad', 
			'heading' => 	'#292834', 
			'bg' => 		'#ffffff', 
			'alternate' => 	'#f9f9fa', 
			'border' => 	'#d2d2d8', 
			'secondary' => 	'#f15039' 
		), 
		'header' => array( // Header color scheme
			'mid_color' => 		'rgba(255,255,255,0.6)', 
			'mid_link' => 		'#ffffff', 
			'mid_hover' => 		'rgba(255,255,255,0.7)', 
			'mid_bg' => 		'rgba(255,255,255,0)', 
			'mid_bg_scroll' => 	'#212427', 
			'mid_border' => 	'rgba(255,255,255,0)', 
			'bot_color' => 		'rgba(255,255,255,0.6)', 
			'bot_link' => 		'rgba(255,255,255,0.7)', 
			'bot_hover' => 		'#ffffff', 
			'bot_bg' => 		'rgba(255,255,255,0)', 
			'bot_bg_scroll' => 	'#212427', 
			'bot_border' => 	'rgba(255,255,255,0.3)' 
		), 
		'navigation' => array( // Navigation color scheme
			'title_link' => 			'rgba(255,255,255,0.75)', 
			'title_link_hover' => 		'#ffffff', 
			'title_link_current' => 	'#ffffff', 
			'title_link_subtitle' => 	'rgba(255,255,255,0.6)', 
			'title_link_bg' => 			'rgba(255,255,255,0)', 
			'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
			'title_link_bg_current' => 	'rgba(255,255,255,0)', 
			'title_link_border' => 		'rgba(255,255,255,0)', 
			'dropdown_text' => 			'rgba(255,255,255,0.3)', 
			'dropdown_bg' => 			'#2e3035', 
			'dropdown_border' => 		'#2e3035', 
			'dropdown_link' => 			'rgba(255,255,255,0.7)', 
			'dropdown_link_hover' => 	'#ffffff', 
			'dropdown_link_subtitle' => 'rgba(255,255,255,0.3)', 
			'dropdown_link_highlight' => 'rgba(241,80,57,0)', 
			'dropdown_link_border' => 	'#2e3035' 
		), 
		'header_top' => array( // Header Top color scheme
			'color' => 					'rgba(255,255,255,0.3)', 
			'link' => 					'rgba(255,255,255,0.6)', 
			'hover' => 					'#ffffff', 
			'bg' => 					'#1d2023', 
			'border' => 				'rgba(255,255,255,0.1)', 
			'title_link' => 			'rgba(255,255,255,0.6)', 
			'title_link_hover' => 		'#ffffff', 
			'title_link_bg' => 			'#1d2023', 
			'title_link_bg_hover' => 	'#1d2023', 
			'title_link_border' => 		'#1d2023', 
			'dropdown_bg' => 			'#2e3035', 
			'dropdown_border' => 		'#2e3035', 
			'dropdown_link' => 			'rgba(255,255,255,0.5)', 
			'dropdown_link_hover' => 	'#ffffff', 
			'dropdown_link_highlight' => '#f15039', 
			'dropdown_link_border' => 	'#2e3035' 
		), 
		'footer' => array( // Footer color scheme
			'color' => 		'rgba(255,255,255,0.5)', 
			'link' => 		'rgba(255,255,255,0.5)', 
			'hover' => 		'#ffffff', 
			'heading' => 	'#ffffff', 
			'bg' => 		'#262626', 
			'alternate' => 	'#262626', 
			'border' => 	'rgba(255,255,255,0.2)', 
			'secondary' => 	'#f15039' 
		), 
		'first' => array( // custom color scheme 1
			'color' => 		'rgba(255,255,255,0.35)', 
			'link' => 		'rgba(255,255,255,0.35)', 
			'hover' => 		'#ffffff', 
			'heading' => 	'#ffffff', 
			'bg' => 		'#262626', 
			'alternate' => 	'#ffffff', 
			'border' => 	'rgba(255,255,255,0.2)', 
			'secondary' => 	'#f15039' 
		), 
		'second' => array( // custom color scheme 2
			'color' => 		'rgba(255,255,255,0.55)', 
			'link' => 		'#ffffff', 
			'hover' => 		'#f15039', 
			'heading' => 	'#ffffff', 
			'bg' => 		'#313131', 
			'alternate' => 	'#ffffff', 
			'border' => 	'#e4e4e4', 
			'secondary' => 	'#ffffff' 
		), 
		'third' => array( // custom color scheme 3
			'color' => 		'#ededed', 
			'link' => 		'rgba(255,255,255,0.7)', 
			'hover' => 		'rgba(255,255,255,0.9)', 
			'heading' => 	'#ffffff', 
			'bg' => 		'#fbfbfb', 
			'alternate' => 	'#ffffff', 
			'border' => 	'#e4e4e4', 
			'secondary' => 	'#f15039' 
		) 
	);
	
	
	$settings = apply_filters('startup_company_color_schemes_defaults_filter', $settings);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// Theme Settings Elements Default Values
if (!function_exists('startup_company_settings_element_defaults')) {

function startup_company_settings_element_defaults($id = false) {
	$settings = array( 
		'sidebar' => array( 
			'startup-company' . '_sidebar' => 	'' 
		), 
		'icon' => array( 
			'startup-company' . '_social_icons' => array( 
				'cmsmasters-icon-facebook-1|#|' . esc_html__('Facebook', 'startup-company') . '|true||', 
				'cmsmasters-icon-gplus-1|#|' . esc_html__('Google+', 'startup-company') . '|true||', 
				'cmsmasters-icon-instagram|#|' . esc_html__('Instagram', 'startup-company') . '|true||', 
				'cmsmasters-icon-twitter|#|' . esc_html__('Twitter', 'startup-company') . '|true||', 
				'cmsmasters-icon-youtube-play|#|' . esc_html__('YouTube', 'startup-company') . '|true||' 
			) 
		), 
		'lightbox' => array( 
			'startup-company' . '_ilightbox_skin' => 					'dark', 
			'startup-company' . '_ilightbox_path' => 					'vertical', 
			'startup-company' . '_ilightbox_infinite' => 				0, 
			'startup-company' . '_ilightbox_aspect_ratio' => 			1, 
			'startup-company' . '_ilightbox_mobile_optimizer' => 		1, 
			'startup-company' . '_ilightbox_max_scale' => 				1, 
			'startup-company' . '_ilightbox_min_scale' => 				0.2, 
			'startup-company' . '_ilightbox_inner_toolbar' => 			0, 
			'startup-company' . '_ilightbox_smart_recognition' => 		0, 
			'startup-company' . '_ilightbox_fullscreen_one_slide' => 	0, 
			'startup-company' . '_ilightbox_fullscreen_viewport' => 	'center', 
			'startup-company' . '_ilightbox_controls_toolbar' => 		1, 
			'startup-company' . '_ilightbox_controls_arrows' => 		0, 
			'startup-company' . '_ilightbox_controls_fullscreen' => 	1, 
			'startup-company' . '_ilightbox_controls_thumbnail' => 		1, 
			'startup-company' . '_ilightbox_controls_keyboard' => 		1, 
			'startup-company' . '_ilightbox_controls_mousewheel' => 	1, 
			'startup-company' . '_ilightbox_controls_swipe' => 			1, 
			'startup-company' . '_ilightbox_controls_slideshow' => 		0 
		), 
		'sitemap' => array( 
			'startup-company' . '_sitemap_nav' => 			1, 
			'startup-company' . '_sitemap_categs' => 		1, 
			'startup-company' . '_sitemap_tags' => 			1, 
			'startup-company' . '_sitemap_month' => 		1, 
			'startup-company' . '_sitemap_pj_categs' => 	1, 
			'startup-company' . '_sitemap_pj_tags' => 		1 
		), 
		'error' => array( 
			'startup-company' . '_error_color' => 				'#313131', 
			'startup-company' . '_error_bg_color' => 			'#ffffff', 
			'startup-company' . '_error_bg_img_enable' => 		0, 
			'startup-company' . '_error_bg_image' => 			'', 
			'startup-company' . '_error_bg_rep' => 				'no-repeat', 
			'startup-company' . '_error_bg_pos' => 				'top center', 
			'startup-company' . '_error_bg_att' => 				'scroll', 
			'startup-company' . '_error_bg_size' => 			'cover', 
			'startup-company' . '_error_search' => 				1, 
			'startup-company' . '_error_sitemap_button' =>		1, 
			'startup-company' . '_error_sitemap_link' => 		'' 
		), 
		'code' => array( 
			'startup-company' . '_custom_css' => 			'', 
			'startup-company' . '_custom_js' => 			'', 
			'startup-company' . '_gmap_api_key' => 			'', 
			'startup-company' . '_api_key' => 				'', 
			'startup-company' . '_api_secret' => 			'', 
			'startup-company' . '_access_token' => 			'', 
			'startup-company' . '_access_token_secret' => 	'' 
		), 
		'recaptcha' => array( 
			'startup-company' . '_recaptcha_public_key' => 		'', 
			'startup-company' . '_recaptcha_private_key' => 	'' 
		) 
	);
	
	
	$settings = apply_filters('startup_company_settings_element_defaults_filter', $settings);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// Theme Settings Single Posts Default Values
if (!function_exists('startup_company_settings_single_defaults')) {

function startup_company_settings_single_defaults($id = false) {
	$settings = array( 
		'post' => array( 
			'startup-company' . '_blog_post_layout' => 			'fullwidth', 
			'startup-company' . '_blog_post_title' => 			1, 
			'startup-company' . '_blog_post_date' => 			1, 
			'startup-company' . '_blog_post_cat' => 			1, 
			'startup-company' . '_blog_post_author' => 			1, 
			'startup-company' . '_blog_post_comment' => 		1, 
			'startup-company' . '_blog_post_tag' => 			1, 
			'startup-company' . '_blog_post_like' => 			1, 
			'startup-company' . '_blog_post_nav_box' => 		1, 
			'startup-company' . '_blog_post_nav_order_cat' => 	0, 
			'startup-company' . '_blog_post_share_box' => 		1, 
			'startup-company' . '_blog_post_author_box' => 		1, 
			'startup-company' . '_blog_more_posts_box' => 		'popular', 
			'startup-company' . '_blog_more_posts_count' => 	'3', 
			'startup-company' . '_blog_more_posts_pause' => 	'5' 
		), 
		'project' => array( 
			'startup-company' . '_portfolio_project_title' => 			1, 
			'startup-company' . '_portfolio_project_details_title' => 	esc_html__('Project details', 'startup-company'), 
			'startup-company' . '_portfolio_project_date' => 			1, 
			'startup-company' . '_portfolio_project_cat' => 			1, 
			'startup-company' . '_portfolio_project_author' => 			1, 
			'startup-company' . '_portfolio_project_comment' => 		0, 
			'startup-company' . '_portfolio_project_tag' => 			0, 
			'startup-company' . '_portfolio_project_like' => 			1, 
			'startup-company' . '_portfolio_project_link' => 			0, 
			'startup-company' . '_portfolio_project_share_box' => 		1, 
			'startup-company' . '_portfolio_project_nav_box' => 		1, 
			'startup-company' . '_portfolio_project_nav_order_cat' => 	0, 
			'startup-company' . '_portfolio_project_author_box' => 		1, 
			'startup-company' . '_portfolio_more_projects_box' => 		'popular', 
			'startup-company' . '_portfolio_more_projects_count' => 	'4', 
			'startup-company' . '_portfolio_more_projects_pause' => 	'5', 
			'startup-company' . '_portfolio_project_slug' => 			'project', 
			'startup-company' . '_portfolio_pj_categs_slug' => 			'pj-categs', 
			'startup-company' . '_portfolio_pj_tags_slug' => 			'pj-tags' 
		), 
		'profile' => array( 
			'startup-company' . '_profile_post_title' => 			1, 
			'startup-company' . '_profile_post_details_title' => 	esc_html__('Profile details', 'startup-company'), 
			'startup-company' . '_profile_post_cat' => 				1, 
			'startup-company' . '_profile_post_comment' => 			1, 
			'startup-company' . '_profile_post_like' => 			1, 
			'startup-company' . '_profile_post_nav_box' => 			1, 
			'startup-company' . '_profile_post_nav_order_cat' => 	0, 
			'startup-company' . '_profile_post_share_box' => 		1, 
			'startup-company' . '_profile_post_slug' => 			'profile', 
			'startup-company' . '_profile_pl_categs_slug' => 		'pl-categs' 
		) 
	);
	
	
	$settings = apply_filters('startup_company_settings_single_defaults_filter', $settings);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



/* Project Puzzle Proportion */
if (!function_exists('startup_company_project_puzzle_proportion')) {

function startup_company_project_puzzle_proportion() {
	return 0.7069;
}

}



/* Theme Image Thumbnails Size */
if (!function_exists('startup_company_get_image_thumbnail_list')) {

function startup_company_get_image_thumbnail_list() {
	$list = array( 
		'cmsmasters-small-thumb' => array( 
			'width' => 		75, 
			'height' => 	75, 
			'crop' => 		true 
		), 
		'cmsmasters-square-thumb' => array( 
			'width' => 		300, 
			'height' => 	300, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Square', 'startup-company') 
		), 
		'cmsmasters-blog-masonry-thumb' => array( 
			'width' => 		580, 
			'height' => 	366, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Masonry Blog', 'startup-company') 
		), 
		'cmsmasters-project-thumb' => array( 
			'width' => 		580, 
			'height' => 	410, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Project', 'startup-company') 
		), 
		'cmsmasters-project-masonry-thumb' => array( 
			'width' => 		580, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry Project', 'startup-company') 
		), 
		'post-thumbnail' => array( 
			'width' => 		860, 
			'height' => 	575, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Featured', 'startup-company') 
		), 
		'cmsmasters-masonry-thumb' => array( 
			'width' => 		860, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry', 'startup-company') 
		), 
		'cmsmasters-full-thumb' => array( 
			'width' => 		1160, 
			'height' => 	770, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Full', 'startup-company') 
		), 
		'cmsmasters-project-full-thumb' => array( 
			'width' => 		1160, 
			'height' => 	820, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Project Full', 'startup-company') 
		), 
		'cmsmasters-full-masonry-thumb' => array( 
			'width' => 		1160, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry Full', 'startup-company') 
		) 
	);
	
	
	return $list;
}

}



/* Project Post Type Registration Rename */
if (!function_exists('startup_company_project_labels')) {

function startup_company_project_labels() {
	return array( 
		'name' => 					esc_html__('Projects', 'startup-company'), 
		'singular_name' => 			esc_html__('Project', 'startup-company'), 
		'menu_name' => 				esc_html__('Projects', 'startup-company'), 
		'all_items' => 				esc_html__('All Projects', 'startup-company'), 
		'add_new' => 				esc_html__('Add New', 'startup-company'), 
		'add_new_item' => 			esc_html__('Add New Project', 'startup-company'), 
		'edit_item' => 				esc_html__('Edit Project', 'startup-company'), 
		'new_item' => 				esc_html__('New Project', 'startup-company'), 
		'view_item' => 				esc_html__('View Project', 'startup-company'), 
		'search_items' => 			esc_html__('Search Projects', 'startup-company'), 
		'not_found' => 				esc_html__('No projects found', 'startup-company'), 
		'not_found_in_trash' => 	esc_html__('No projects found in Trash', 'startup-company') 
	);
}

}

// add_filter('cmsmasters_project_labels_filter', 'startup_company_project_labels');


if (!function_exists('startup_company_pj_categs_labels')) {

function startup_company_pj_categs_labels() {
	return array( 
		'name' => 					esc_html__('Project Categories', 'startup-company'), 
		'singular_name' => 			esc_html__('Project Category', 'startup-company') 
	);
}

}

// add_filter('cmsmasters_pj_categs_labels_filter', 'startup_company_pj_categs_labels');


if (!function_exists('startup_company_pj_tags_labels')) {

function startup_company_pj_tags_labels() {
	return array( 
		'name' => 					esc_html__('Project Tags', 'startup-company'), 
		'singular_name' => 			esc_html__('Project Tag', 'startup-company') 
	);
}

}

// add_filter('cmsmasters_pj_tags_labels_filter', 'startup_company_pj_tags_labels');



/* Profile Post Type Registration Rename */
if (!function_exists('startup_company_profile_labels')) {

function startup_company_profile_labels() {
	return array( 
		'name' => 					esc_html__('Profiles', 'startup-company'), 
		'singular_name' => 			esc_html__('Profiles', 'startup-company'), 
		'menu_name' => 				esc_html__('Profiles', 'startup-company'), 
		'all_items' => 				esc_html__('All Profiles', 'startup-company'), 
		'add_new' => 				esc_html__('Add New', 'startup-company'), 
		'add_new_item' => 			esc_html__('Add New Profile', 'startup-company'), 
		'edit_item' => 				esc_html__('Edit Profile', 'startup-company'), 
		'new_item' => 				esc_html__('New Profile', 'startup-company'), 
		'view_item' => 				esc_html__('View Profile', 'startup-company'), 
		'search_items' => 			esc_html__('Search Profiles', 'startup-company'), 
		'not_found' => 				esc_html__('No Profiles found', 'startup-company'), 
		'not_found_in_trash' => 	esc_html__('No Profiles found in Trash', 'startup-company') 
	);
}

}

// add_filter('cmsmasters_profile_labels_filter', 'startup_company_profile_labels');


if (!function_exists('startup_company_pl_categs_labels')) {

function startup_company_pl_categs_labels() {
	return array( 
		'name' => 					esc_html__('Profile Categories', 'startup-company'), 
		'singular_name' => 			esc_html__('Profile Category', 'startup-company') 
	);
}

}

// add_filter('cmsmasters_pl_categs_labels_filter', 'startup_company_pl_categs_labels');

