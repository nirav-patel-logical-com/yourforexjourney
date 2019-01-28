<?php
/**
 * @package 	WordPress
 * @subpackage 	Startup Company
 * @version 	1.0.0
 * 
 * WooCommerce Content Composer Functions
 * Created by CMSMasters
 * 
 */


/* Register JS Scripts */
function startup_company_woocommerce_register_c_c_scripts() {
	global $pagenow;
	
	
	if ( 
		$pagenow == 'post-new.php' || 
		($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
	) {
		wp_enqueue_script('startup-company-woocommerce-extend', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-c-c/js/cmsmasters-c-c-plugin-extend.js', array('cmsmasters_composer_shortcodes_js'), '1.0.0', true);
		
		wp_localize_script('startup-company-woocommerce-extend', 'cmsmasters_woocommerce_shortcodes', array( 
			'product_ids' => 								startup_company_woocommerce_product_ids(), 
			'products_title' =>								esc_html__('Products', 'startup-company'), 
			'products_shortcode_title' =>					esc_html__('WooCommerce Shortcode', 'startup-company'), 
			'products_shortcode_descr' =>					esc_html__('Choose a WooCommerce shortcode to use', 'startup-company'), 
			'choice_recent_products' =>						esc_html__('Recent Products', 'startup-company'), 
			'choice_featured_products' =>					esc_html__('Featured Products', 'startup-company'), 
			'choice_product_categories' =>					esc_html__('Product Categories', 'startup-company'), 
			'choice_sale_products' =>						esc_html__('Sale Products', 'startup-company'), 
			'choice_best_selling_products' =>				esc_html__('Best Selling Products', 'startup-company'), 
			'choice_top_rated_products' =>					esc_html__('Top Rated Products', 'startup-company'), 
			'products_field_orderby_descr' =>				esc_html__("Choose your products 'order by' parameter", 'startup-company'), 
			'products_field_orderby_descr_note' =>			esc_html__("Sorting will not be applied for", 'startup-company'), 
			'products_field_prod_number_title' =>			esc_html__('Number of Products', 'startup-company'), 
			'products_field_prod_number_descr' =>			esc_html__('Enter the number of products for showing per page', 'startup-company'), 
			'products_field_col_count_descr' =>				esc_html__('Choose number of products per row', 'startup-company'), 
			'selected_products_title' =>					esc_html__('Selected Products', 'startup-company'), 
			'selected_products_field_ids' => 				esc_html__('Products', 'startup-company'), 
			'selected_products_field_ids_descr' => 			esc_html__('Choose products to be shown', 'startup-company'), 
			'selected_products_field_ids_descr_note' => 	esc_html__('All products will be shown if empty', 'startup-company') 
		));
	}
}

add_action('admin_enqueue_scripts', 'startup_company_woocommerce_register_c_c_scripts');



/* Product IDs */
function startup_company_woocommerce_product_ids() {
	$product_ids = get_posts(array(
		'numberposts' => -1, 
		'post_type' => 'product'
	));
	
	
	$out = array();
	
	
	if (!empty($product_ids)) {
		foreach ($product_ids as $product_id) {
			$out[$product_id->ID] = esc_html($product_id->post_title);
		}
	}
	
	
	return $out;
}

