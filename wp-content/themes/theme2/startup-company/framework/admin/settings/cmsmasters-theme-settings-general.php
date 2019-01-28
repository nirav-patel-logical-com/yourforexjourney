<?php 
/**
 * @package 	WordPress
 * @subpackage 	Startup Company
 * @version 	1.0.3
 * 
 * Admin Panel General Options
 * Created by CMSMasters
 * 
 */


function startup_company_options_general_tabs() {
	$cmsmasters_option = startup_company_get_global_options();
	
	$tabs = array();
	
	$tabs['general'] = esc_attr__('General', 'startup-company');
	
	if ($cmsmasters_option['startup-company' . '_theme_layout'] === 'boxed') {
		$tabs['bg'] = esc_attr__('Background', 'startup-company');
	}
	
	if (CMSMASTERS_THEME_STYLE_COMPATIBILITY) {
		$tabs['theme_style'] = esc_attr__('Theme Style', 'startup-company');
	}
	
	$tabs['header'] = esc_attr__('Header', 'startup-company');
	$tabs['content'] = esc_attr__('Content', 'startup-company');
	$tabs['footer'] = esc_attr__('Footer', 'startup-company');
	
	return apply_filters('cmsmasters_options_general_tabs_filter', $tabs);
}


function startup_company_options_general_sections() {
	$tab = startup_company_get_the_tab();
	
	switch ($tab) {
	case 'general':
		$sections = array();
		
		$sections['general_section'] = esc_attr__('General Options', 'startup-company');
		
		break;
	case 'bg':
		$sections = array();
		
		$sections['bg_section'] = esc_attr__('Background Options', 'startup-company');
		
		break;
	case 'theme_style':
		$sections = array();
		
		$sections['theme_style_section'] = esc_attr__('Theme Design Style', 'startup-company');
		
		break;
	case 'header':
		$sections = array();
		
		$sections['header_section'] = esc_attr__('Header Options', 'startup-company');
		
		break;
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_attr__('Content Options', 'startup-company');
		
		break;
	case 'footer':
		$sections = array();
		
		$sections['footer_section'] = esc_attr__('Footer Options', 'startup-company');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return apply_filters('cmsmasters_options_general_sections_filter', $sections, $tab);
} 


function startup_company_options_general_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = startup_company_get_the_tab();
	}
	
	$options = array();
	
	
	$defaults = startup_company_settings_general_defaults();
	
	
	switch ($tab) {
	case 'general':
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'startup-company' . '_theme_layout', 
			'title' => esc_html__('Theme Layout', 'startup-company'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['startup-company' . '_theme_layout'], 
			'choices' => array( 
				esc_html__('Liquid', 'startup-company') . '|liquid', 
				esc_html__('Boxed', 'startup-company') . '|boxed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'startup-company' . '_logo_type', 
			'title' => esc_html__('Logo Type', 'startup-company'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['startup-company' . '_logo_type'], 
			'choices' => array( 
				esc_html__('Image', 'startup-company') . '|image', 
				esc_html__('Text', 'startup-company') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'startup-company' . '_logo_url', 
			'title' => esc_html__('Logo Image', 'startup-company'), 
			'desc' => esc_html__('Choose your website logo image.', 'startup-company'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['startup-company' . '_logo_url'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'startup-company' . '_logo_url_retina', 
			'title' => esc_html__('Retina Logo Image', 'startup-company'), 
			'desc' => esc_html__('Choose logo image for retina displays. Logo for Retina displays should be twice the size of the default one.', 'startup-company'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['startup-company' . '_logo_url_retina'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'startup-company' . '_logo_title', 
			'title' => esc_html__('Logo Title', 'startup-company'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['startup-company' . '_logo_title'], 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'startup-company' . '_logo_subtitle', 
			'title' => esc_html__('Logo Subtitle', 'startup-company'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['startup-company' . '_logo_subtitle'], 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'startup-company' . '_logo_custom_color', 
			'title' => esc_html__('Custom Text Colors', 'startup-company'), 
			'desc' => esc_html__('enable', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_logo_custom_color'] 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'startup-company' . '_logo_title_color', 
			'title' => esc_html__('Logo Title Color', 'startup-company'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['startup-company' . '_logo_title_color'] 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'startup-company' . '_logo_subtitle_color', 
			'title' => esc_html__('Logo Subtitle Color', 'startup-company'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['startup-company' . '_logo_subtitle_color'] 
		);
		
		break;
	case 'bg':
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'startup-company' . '_bg_col', 
			'title' => esc_html__('Background Color', 'startup-company'), 
			'desc' => '', 
			'type' => 'color', 
			'std' => $defaults[$tab]['startup-company' . '_bg_col'] 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'startup-company' . '_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'startup-company'), 
			'desc' => esc_html__('show', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_bg_img_enable'] 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'startup-company' . '_bg_img', 
			'title' => esc_html__('Background Image', 'startup-company'), 
			'desc' => esc_html__('Choose your custom website background image url.', 'startup-company'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['startup-company' . '_bg_img'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'startup-company' . '_bg_rep', 
			'title' => esc_html__('Background Repeat', 'startup-company'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['startup-company' . '_bg_rep'], 
			'choices' => array( 
				esc_html__('No Repeat', 'startup-company') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'startup-company') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'startup-company') . '|repeat-y', 
				esc_html__('Repeat', 'startup-company') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'startup-company' . '_bg_pos', 
			'title' => esc_html__('Background Position', 'startup-company'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['startup-company' . '_bg_pos'], 
			'choices' => array( 
				esc_html__('Top Left', 'startup-company') . '|top left', 
				esc_html__('Top Center', 'startup-company') . '|top center', 
				esc_html__('Top Right', 'startup-company') . '|top right', 
				esc_html__('Center Left', 'startup-company') . '|center left', 
				esc_html__('Center Center', 'startup-company') . '|center center', 
				esc_html__('Center Right', 'startup-company') . '|center right', 
				esc_html__('Bottom Left', 'startup-company') . '|bottom left', 
				esc_html__('Bottom Center', 'startup-company') . '|bottom center', 
				esc_html__('Bottom Right', 'startup-company') . '|bottom right' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'startup-company' . '_bg_att', 
			'title' => esc_html__('Background Attachment', 'startup-company'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['startup-company' . '_bg_att'], 
			'choices' => array( 
				esc_html__('Scroll', 'startup-company') . '|scroll', 
				esc_html__('Fixed', 'startup-company') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'startup-company' . '_bg_size', 
			'title' => esc_html__('Background Size', 'startup-company'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['startup-company' . '_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'startup-company') . '|auto', 
				esc_html__('Cover', 'startup-company') . '|cover', 
				esc_html__('Contain', 'startup-company') . '|contain' 
			) 
		);
		
		break;
	case 'theme_style':
		$options[] = array( 
			'section' => 'theme_style_section', 
			'id' => 'startup-company' . '_theme_style', 
			'title' => esc_html__('Choose Theme Style', 'startup-company'), 
			'desc' => '', 
			'type' => 'select_theme_style', 
			'std' => '', 
			'choices' => startup_company_all_theme_styles() 
		);
		
		break;
	case 'header':
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'startup-company' . '_fixed_header', 
			'title' => esc_html__('Fixed Header', 'startup-company'), 
			'desc' => esc_html__('enable', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_fixed_header'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'startup-company' . '_header_overlaps', 
			'title' => esc_html__('Header Overlaps Content by Default', 'startup-company'), 
			'desc' => esc_html__('enable', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_header_overlaps'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'startup-company' . '_header_top_line', 
			'title' => esc_html__('Top Line', 'startup-company'), 
			'desc' => esc_html__('show', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_header_top_line'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'startup-company' . '_header_top_height', 
			'title' => esc_html__('Top Height', 'startup-company'), 
			'desc' => esc_html__('pixels', 'startup-company'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['startup-company' . '_header_top_height'], 
			'min' => '10' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'startup-company' . '_header_top_line_short_info', 
			'title' => esc_html__('Top Short Info', 'startup-company'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'startup-company') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['startup-company' . '_header_top_line_short_info'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'startup-company' . '_header_top_line_add_cont', 
			'title' => esc_html__('Top Additional Content', 'startup-company'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['startup-company' . '_header_top_line_add_cont'], 
			'choices' => array( 
				esc_html__('None', 'startup-company') . '|none', 
				esc_html__('Top Line Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'startup-company') . '|social', 
				esc_html__('Top Line Navigation', 'startup-company') . '|nav' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'startup-company' . '_header_styles', 
			'title' => esc_html__('Header Styles', 'startup-company'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['startup-company' . '_header_styles'], 
			'choices' => array( 
				esc_html__('Default Style', 'startup-company') . '|default', 
				esc_html__('Compact Style Left Navigation', 'startup-company') . '|l_nav', 
				esc_html__('Compact Style Right Navigation', 'startup-company') . '|r_nav', 
				esc_html__('Compact Style Center Navigation', 'startup-company') . '|c_nav'
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'startup-company' . '_header_mid_height', 
			'title' => esc_html__('Header Middle Height', 'startup-company'), 
			'desc' => esc_html__('pixels', 'startup-company'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['startup-company' . '_header_mid_height'], 
			'min' => '40' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'startup-company' . '_header_bot_height', 
			'title' => esc_html__('Header Bottom Height', 'startup-company'), 
			'desc' => esc_html__('pixels', 'startup-company'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['startup-company' . '_header_bot_height'], 
			'min' => '20' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'startup-company' . '_header_search', 
			'title' => esc_html__('Header Search', 'startup-company'), 
			'desc' => esc_html__('show', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_header_search'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'startup-company' . '_header_add_cont', 
			'title' => esc_html__('Header Additional Content', 'startup-company'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['startup-company' . '_header_add_cont'], 
			'choices' => array( 
				esc_html__('None', 'startup-company') . '|none', 
				esc_html__('Header Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'startup-company') . '|social', 
				esc_html__('Header Custom HTML', 'startup-company') . '|cust_html' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'startup-company' . '_header_add_cont_cust_html', 
			'title' => esc_html__('Header Custom HTML', 'startup-company'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'startup-company') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['startup-company' . '_header_add_cont_cust_html'], 
			'class' => '' 
		);
		
		break;
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'startup-company' . '_layout', 
			'title' => esc_html__('Layout Type by Default', 'startup-company'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['startup-company' . '_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'startup-company') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'startup-company') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'startup-company') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'startup-company' . '_archives_layout', 
			'title' => esc_html__('Archives Layout Type', 'startup-company'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['startup-company' . '_archives_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'startup-company') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'startup-company') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'startup-company') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'startup-company' . '_search_layout', 
			'title' => esc_html__('Search Layout Type', 'startup-company'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['startup-company' . '_search_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'startup-company') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'startup-company') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'startup-company') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'startup-company' . '_other_layout', 
			'title' => esc_html__('Other Layout Type', 'startup-company'), 
			'desc' => 'Layout for pages of non-listed types', 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['startup-company' . '_other_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'startup-company') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'startup-company') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'startup-company') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'startup-company' . '_heading_alignment', 
			'title' => esc_html__('Heading Alignment by Default', 'startup-company'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['startup-company' . '_heading_alignment'], 
			'choices' => array( 
				esc_html__('Left', 'startup-company') . '|left', 
				esc_html__('Right', 'startup-company') . '|right', 
				esc_html__('Center', 'startup-company') . '|center' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'startup-company' . '_heading_scheme', 
			'title' => esc_html__('Heading Custom Color Scheme by Default', 'startup-company'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['startup-company' . '_heading_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'startup-company' . '_heading_bg_image_enable', 
			'title' => esc_html__('Heading Background Image Visibility by Default', 'startup-company'), 
			'desc' => esc_html__('show', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_heading_bg_image_enable'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'startup-company' . '_heading_bg_image', 
			'title' => esc_html__('Heading Background Image by Default', 'startup-company'), 
			'desc' => esc_html__('Choose your custom heading background image by default.', 'startup-company'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['startup-company' . '_heading_bg_image'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'startup-company' . '_heading_bg_repeat', 
			'title' => esc_html__('Heading Background Repeat by Default', 'startup-company'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['startup-company' . '_heading_bg_repeat'], 
			'choices' => array( 
				esc_html__('No Repeat', 'startup-company') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'startup-company') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'startup-company') . '|repeat-y', 
				esc_html__('Repeat', 'startup-company') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'startup-company' . '_heading_bg_attachment', 
			'title' => esc_html__('Heading Background Attachment by Default', 'startup-company'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['startup-company' . '_heading_bg_attachment'], 
			'choices' => array( 
				esc_html__('Scroll', 'startup-company') . '|scroll', 
				esc_html__('Fixed', 'startup-company') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'startup-company' . '_heading_bg_size', 
			'title' => esc_html__('Heading Background Size by Default', 'startup-company'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['startup-company' . '_heading_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'startup-company') . '|auto', 
				esc_html__('Cover', 'startup-company') . '|cover', 
				esc_html__('Contain', 'startup-company') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'startup-company' . '_heading_bg_color', 
			'title' => esc_html__('Heading Background Color Overlay by Default', 'startup-company'), 
			'desc' => '',  
			'type' => 'rgba', 
			'std' => $defaults[$tab]['startup-company' . '_heading_bg_color'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'startup-company' . '_heading_height', 
			'title' => esc_html__('Heading Height by Default', 'startup-company'), 
			'desc' => esc_html__('pixels', 'startup-company'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['startup-company' . '_heading_height'], 
			'min' => '0' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'startup-company' . '_breadcrumbs', 
			'title' => esc_html__('Breadcrumbs Visibility by Default', 'startup-company'), 
			'desc' => esc_html__('show', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_breadcrumbs'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'startup-company' . '_bottom_scheme', 
			'title' => esc_html__('Bottom Custom Color Scheme', 'startup-company'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['startup-company' . '_bottom_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'startup-company' . '_bottom_sidebar', 
			'title' => esc_html__('Bottom Sidebar Visibility by Default', 'startup-company'), 
			'desc' => esc_html__('show', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_bottom_sidebar'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'startup-company' . '_bottom_sidebar_layout', 
			'title' => esc_html__('Bottom Sidebar Layout by Default', 'startup-company'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['startup-company' . '_bottom_sidebar_layout'], 
			'choices' => array( 
				'1/1|11', 
				'1/2 + 1/2|1212', 
				'1/3 + 2/3|1323', 
				'2/3 + 1/3|2313', 
				'1/4 + 3/4|1434', 
				'3/4 + 1/4|3414', 
				'1/3 + 1/3 + 1/3|131313', 
				'1/2 + 1/4 + 1/4|121414', 
				'1/4 + 1/2 + 1/4|141214', 
				'1/4 + 1/4 + 1/2|141412', 
				'1/4 + 1/4 + 1/4 + 1/4|14141414' 
			) 
		);
		
		break;
	case 'footer':
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'startup-company' . '_footer_scheme', 
			'title' => esc_html__('Footer Custom Color Scheme', 'startup-company'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['startup-company' . '_footer_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'startup-company' . '_footer_type', 
			'title' => esc_html__('Footer Type', 'startup-company'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['startup-company' . '_footer_type'], 
			'choices' => array( 
				esc_html__('Default', 'startup-company') . '|default', 
				esc_html__('Small', 'startup-company') . '|small' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'startup-company' . '_footer_additional_content', 
			'title' => esc_html__('Footer Additional Content', 'startup-company'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['startup-company' . '_footer_additional_content'], 
			'choices' => array( 
				esc_html__('None', 'startup-company') . '|none', 
				esc_html__('Footer Navigation', 'startup-company') . '|nav', 
				esc_html__('Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'startup-company') . '|social', 
				esc_html__('Custom HTML', 'startup-company') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'startup-company' . '_footer_logo', 
			'title' => esc_html__('Footer Logo', 'startup-company'), 
			'desc' => esc_html__('show', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_footer_logo'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'startup-company' . '_footer_logo_url', 
			'title' => esc_html__('Footer Logo', 'startup-company'), 
			'desc' => esc_html__('Choose your website footer logo image.', 'startup-company'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['startup-company' . '_footer_logo_url'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'startup-company' . '_footer_logo_url_retina', 
			'title' => esc_html__('Footer Logo for Retina', 'startup-company'), 
			'desc' => esc_html__('Choose your website footer logo image for retina.', 'startup-company'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['startup-company' . '_footer_logo_url_retina'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'startup-company' . '_footer_nav', 
			'title' => esc_html__('Footer Navigation', 'startup-company'), 
			'desc' => esc_html__('show', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_footer_nav'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'startup-company' . '_footer_social', 
			'title' => esc_html__('Footer Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'startup-company'), 
			'desc' => esc_html__('show', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_footer_social'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'startup-company' . '_footer_html', 
			'title' => esc_html__('Footer Custom HTML', 'startup-company'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'startup-company') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['startup-company' . '_footer_html'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'startup-company' . '_footer_copyright', 
			'title' => esc_html__('Copyright Text', 'startup-company'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['startup-company' . '_footer_copyright'], 
			'class' => '' 
		);
		
		break;
	}
	
	return apply_filters('cmsmasters_options_general_fields_filter', $options, $tab);	
}

