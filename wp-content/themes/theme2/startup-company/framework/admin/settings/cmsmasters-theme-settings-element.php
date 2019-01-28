<?php 
/**
 * @package 	WordPress
 * @subpackage 	Startup Company
 * @version 	1.0.1
 * 
 * Admin Panel Element Options
 * Created by CMSMasters
 * 
 */


function startup_company_options_element_tabs() {
	$tabs = array();
	
	$tabs['sidebar'] = esc_attr__('Sidebars', 'startup-company');
	
	if (class_exists('Cmsmasters_Content_Composer')) {
		$tabs['icon'] = esc_attr__('Social Icons', 'startup-company');
	}
	
	$tabs['lightbox'] = esc_attr__('Lightbox', 'startup-company');
	$tabs['sitemap'] = esc_attr__('Sitemap', 'startup-company');
	$tabs['error'] = esc_attr__('404', 'startup-company');
	$tabs['code'] = esc_attr__('Custom Codes', 'startup-company');
	
	if (class_exists('Cmsmasters_Form_Builder')) {
		$tabs['recaptcha'] = esc_attr__('reCAPTCHA', 'startup-company');
	}
	
	return apply_filters('cmsmasters_options_element_tabs_filter', $tabs);
}


function startup_company_options_element_sections() {
	$tab = startup_company_get_the_tab();
	
	switch ($tab) {
	case 'sidebar':
		$sections = array();
		
		$sections['sidebar_section'] = esc_attr__('Custom Sidebars', 'startup-company');
		
		break;
	case 'icon':
		$sections = array();
		
		$sections['icon_section'] = esc_attr__('Social Icons', 'startup-company');
		
		break;
	case 'lightbox':
		$sections = array();
		
		$sections['lightbox_section'] = esc_attr__('Theme Lightbox Options', 'startup-company');
		
		break;
	case 'sitemap':
		$sections = array();
		
		$sections['sitemap_section'] = esc_attr__('Sitemap Page Options', 'startup-company');
		
		break;
	case 'error':
		$sections = array();
		
		$sections['error_section'] = esc_attr__('404 Error Page Options', 'startup-company');
		
		break;
	case 'code':
		$sections = array();
		
		$sections['code_section'] = esc_attr__('Custom Codes', 'startup-company');
		
		break;
	case 'recaptcha':
		$sections = array();
		
		$sections['recaptcha_section'] = esc_attr__('Form Builder Plugin reCAPTCHA Keys', 'startup-company');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return apply_filters('cmsmasters_options_element_sections_filter', $sections, $tab);	
} 


function startup_company_options_element_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = startup_company_get_the_tab();
	}
	
	
	$options = array();
	
	
	$defaults = startup_company_settings_element_defaults();
	
	
	switch ($tab) {
	case 'sidebar':
		$options[] = array( 
			'section' => 'sidebar_section', 
			'id' => 'startup-company' . '_sidebar', 
			'title' => esc_html__('Custom Sidebars', 'startup-company'), 
			'desc' => '', 
			'type' => 'sidebar', 
			'std' => $defaults[$tab]['startup-company' . '_sidebar'] 
		);
		
		break;
	case 'icon':
		$options[] = array( 
			'section' => 'icon_section', 
			'id' => 'startup-company' . '_social_icons', 
			'title' => esc_html__('Social Icons', 'startup-company'), 
			'desc' => '', 
			'type' => 'social', 
			'std' => $defaults[$tab]['startup-company' . '_social_icons'] 
		);
		
		break;
	case 'lightbox':
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'startup-company' . '_ilightbox_skin', 
			'title' => esc_html__('Skin', 'startup-company'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['startup-company' . '_ilightbox_skin'], 
			'choices' => array( 
				esc_html__('Dark', 'startup-company') . '|dark', 
				esc_html__('Light', 'startup-company') . '|light', 
				esc_html__('Mac', 'startup-company') . '|mac', 
				esc_html__('Metro Black', 'startup-company') . '|metro-black', 
				esc_html__('Metro White', 'startup-company') . '|metro-white', 
				esc_html__('Parade', 'startup-company') . '|parade', 
				esc_html__('Smooth', 'startup-company') . '|smooth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'startup-company' . '_ilightbox_path', 
			'title' => esc_html__('Path', 'startup-company'), 
			'desc' => esc_html__('Sets path for switching windows', 'startup-company'), 
			'type' => 'radio', 
			'std' => $defaults[$tab]['startup-company' . '_ilightbox_path'], 
			'choices' => array( 
				esc_html__('Vertical', 'startup-company') . '|vertical', 
				esc_html__('Horizontal', 'startup-company') . '|horizontal' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'startup-company' . '_ilightbox_infinite', 
			'title' => esc_html__('Infinite', 'startup-company'), 
			'desc' => esc_html__('Sets the ability to infinite the group', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_ilightbox_infinite'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'startup-company' . '_ilightbox_aspect_ratio', 
			'title' => esc_html__('Keep Aspect Ratio', 'startup-company'), 
			'desc' => esc_html__('Sets the resizing method used to keep aspect ratio within the viewport', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_ilightbox_aspect_ratio'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'startup-company' . '_ilightbox_mobile_optimizer', 
			'title' => esc_html__('Mobile Optimizer', 'startup-company'), 
			'desc' => esc_html__('Make lightboxes optimized for giving better experience with mobile devices', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_ilightbox_mobile_optimizer'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'startup-company' . '_ilightbox_max_scale', 
			'title' => esc_html__('Max Scale', 'startup-company'), 
			'desc' => esc_html__('Sets the maximum viewport scale of the content', 'startup-company'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['startup-company' . '_ilightbox_max_scale'], 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'startup-company' . '_ilightbox_min_scale', 
			'title' => esc_html__('Min Scale', 'startup-company'), 
			'desc' => esc_html__('Sets the minimum viewport scale of the content', 'startup-company'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['startup-company' . '_ilightbox_min_scale'], 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'startup-company' . '_ilightbox_inner_toolbar', 
			'title' => esc_html__('Inner Toolbar', 'startup-company'), 
			'desc' => esc_html__('Bring buttons into windows, or let them be over the overlay', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_ilightbox_inner_toolbar'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'startup-company' . '_ilightbox_smart_recognition', 
			'title' => esc_html__('Smart Recognition', 'startup-company'), 
			'desc' => esc_html__('Sets content auto recognize from web pages', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_ilightbox_smart_recognition'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'startup-company' . '_ilightbox_fullscreen_one_slide', 
			'title' => esc_html__('Fullscreen One Slide', 'startup-company'), 
			'desc' => esc_html__('Decide to fullscreen only one slide or hole gallery the fullscreen mode', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_ilightbox_fullscreen_one_slide'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'startup-company' . '_ilightbox_fullscreen_viewport', 
			'title' => esc_html__('Fullscreen Viewport', 'startup-company'), 
			'desc' => esc_html__('Sets the resizing method used to fit content within the fullscreen mode', 'startup-company'), 
			'type' => 'select', 
			'std' => $defaults[$tab]['startup-company' . '_ilightbox_fullscreen_viewport'], 
			'choices' => array( 
				esc_html__('Center', 'startup-company') . '|center', 
				esc_html__('Fit', 'startup-company') . '|fit', 
				esc_html__('Fill', 'startup-company') . '|fill', 
				esc_html__('Stretch', 'startup-company') . '|stretch' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'startup-company' . '_ilightbox_controls_toolbar', 
			'title' => esc_html__('Toolbar Controls', 'startup-company'), 
			'desc' => esc_html__('Sets buttons be available or not', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_ilightbox_controls_toolbar'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'startup-company' . '_ilightbox_controls_arrows', 
			'title' => esc_html__('Arrow Controls', 'startup-company'), 
			'desc' => esc_html__('Enable the arrow buttons', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_ilightbox_controls_arrows'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'startup-company' . '_ilightbox_controls_fullscreen', 
			'title' => esc_html__('Fullscreen Controls', 'startup-company'), 
			'desc' => esc_html__('Sets the fullscreen button', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_ilightbox_controls_fullscreen'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'startup-company' . '_ilightbox_controls_thumbnail', 
			'title' => esc_html__('Thumbnails Controls', 'startup-company'), 
			'desc' => esc_html__('Sets the thumbnail navigation', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_ilightbox_controls_thumbnail'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'startup-company' . '_ilightbox_controls_keyboard', 
			'title' => esc_html__('Keyboard Controls', 'startup-company'), 
			'desc' => esc_html__('Sets the keyboard navigation', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_ilightbox_controls_keyboard'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'startup-company' . '_ilightbox_controls_mousewheel', 
			'title' => esc_html__('Mouse Wheel Controls', 'startup-company'), 
			'desc' => esc_html__('Sets the mousewheel navigation', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_ilightbox_controls_mousewheel'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'startup-company' . '_ilightbox_controls_swipe', 
			'title' => esc_html__('Swipe Controls', 'startup-company'), 
			'desc' => esc_html__('Sets the swipe navigation', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_ilightbox_controls_swipe'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'startup-company' . '_ilightbox_controls_slideshow', 
			'title' => esc_html__('Slideshow Controls', 'startup-company'), 
			'desc' => esc_html__('Enable the slideshow feature and button', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_ilightbox_controls_slideshow'] 
		);
		
		break;
	case 'sitemap':
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'startup-company' . '_sitemap_nav', 
			'title' => esc_html__('Website Pages', 'startup-company'), 
			'desc' => esc_html__('show', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_sitemap_nav'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'startup-company' . '_sitemap_categs', 
			'title' => esc_html__('Blog Archives by Categories', 'startup-company'), 
			'desc' => esc_html__('show', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_sitemap_categs'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'startup-company' . '_sitemap_tags', 
			'title' => esc_html__('Blog Archives by Tags', 'startup-company'), 
			'desc' => esc_html__('show', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_sitemap_tags'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'startup-company' . '_sitemap_month', 
			'title' => esc_html__('Blog Archives by Month', 'startup-company'), 
			'desc' => esc_html__('show', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_sitemap_month'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'startup-company' . '_sitemap_pj_categs', 
			'title' => esc_html__('Portfolio Archives by Categories', 'startup-company'), 
			'desc' => esc_html__('show', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_sitemap_pj_categs'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'startup-company' . '_sitemap_pj_tags', 
			'title' => esc_html__('Portfolio Archives by Tags', 'startup-company'), 
			'desc' => esc_html__('show', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_sitemap_pj_tags'] 
		);
		
		break;
	case 'error':
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'startup-company' . '_error_color', 
			'title' => esc_html__('Text Color', 'startup-company'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['startup-company' . '_error_color'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'startup-company' . '_error_bg_color', 
			'title' => esc_html__('Background Color', 'startup-company'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['startup-company' . '_error_bg_color'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'startup-company' . '_error_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'startup-company'), 
			'desc' => esc_html__('show', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_error_bg_img_enable'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'startup-company' . '_error_bg_image', 
			'title' => esc_html__('Background Image', 'startup-company'), 
			'desc' => esc_html__('Choose your custom error page background image.', 'startup-company'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['startup-company' . '_error_bg_image'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'startup-company' . '_error_bg_rep', 
			'title' => esc_html__('Background Repeat', 'startup-company'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['startup-company' . '_error_bg_rep'], 
			'choices' => array( 
				esc_html__('No Repeat', 'startup-company') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'startup-company') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'startup-company') . '|repeat-y', 
				esc_html__('Repeat', 'startup-company') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'startup-company' . '_error_bg_pos', 
			'title' => esc_html__('Background Position', 'startup-company'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['startup-company' . '_error_bg_pos'], 
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
			'section' => 'error_section', 
			'id' => 'startup-company' . '_error_bg_att', 
			'title' => esc_html__('Background Attachment', 'startup-company'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['startup-company' . '_error_bg_att'], 
			'choices' => array( 
				esc_html__('Scroll', 'startup-company') . '|scroll', 
				esc_html__('Fixed', 'startup-company') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'startup-company' . '_error_bg_size', 
			'title' => esc_html__('Background Size', 'startup-company'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['startup-company' . '_error_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'startup-company') . '|auto', 
				esc_html__('Cover', 'startup-company') . '|cover', 
				esc_html__('Contain', 'startup-company') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'startup-company' . '_error_search', 
			'title' => esc_html__('Search Line', 'startup-company'), 
			'desc' => esc_html__('show', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_error_search'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'startup-company' . '_error_sitemap_button', 
			'title' => esc_html__('Sitemap Button', 'startup-company'), 
			'desc' => esc_html__('show', 'startup-company'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['startup-company' . '_error_sitemap_button'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'startup-company' . '_error_sitemap_link', 
			'title' => esc_html__('Sitemap Page URL', 'startup-company'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['startup-company' . '_error_sitemap_link'], 
			'class' => '' 
		);
		
		break;
	case 'code':
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'startup-company' . '_custom_css', 
			'title' => esc_html__('Custom CSS', 'startup-company'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['startup-company' . '_custom_css'], 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'startup-company' . '_custom_js', 
			'title' => esc_html__('Custom JavaScript', 'startup-company'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['startup-company' . '_custom_js'], 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'startup-company' . '_gmap_api_key', 
			'title' => esc_html__('Google Maps API key', 'startup-company'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['startup-company' . '_gmap_api_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'startup-company' . '_api_key', 
			'title' => esc_html__('Twitter API key', 'startup-company'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['startup-company' . '_api_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'startup-company' . '_api_secret', 
			'title' => esc_html__('Twitter API secret', 'startup-company'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['startup-company' . '_api_secret'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'startup-company' . '_access_token', 
			'title' => esc_html__('Twitter Access token', 'startup-company'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['startup-company' . '_access_token'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'startup-company' . '_access_token_secret', 
			'title' => esc_html__('Twitter Access token secret', 'startup-company'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['startup-company' . '_access_token_secret'], 
			'class' => '' 
		);
		
		break;
	case 'recaptcha':
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'startup-company' . '_recaptcha_public_key', 
			'title' => esc_html__('reCAPTCHA Public Key', 'startup-company'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['startup-company' . '_recaptcha_public_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'startup-company' . '_recaptcha_private_key', 
			'title' => esc_html__('reCAPTCHA Private Key', 'startup-company'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['startup-company' . '_recaptcha_private_key'], 
			'class' => '' 
		);
		
		break;
	}
	
	return apply_filters('cmsmasters_options_element_fields_filter', $options, $tab);	
}

