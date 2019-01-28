<?php 
/**
 * @package 	WordPress
 * @subpackage 	Startup Company
 * @version		1.0.6
 * 
 * WooCommerce Template Functions
 * Created by CMSMasters
 * 
 */


/* Dynamic Cart */
function startup_company_woocommerce_cart_dropdown($cmsmasters_option) {
	global $woocommerce;
	
	
	$cart_count = $woocommerce->cart->get_cart_contents_count();
	
	
	if ($cmsmasters_option['startup-company' . '_header_styles'] != 'c_nav') {
		echo '<div class="cmsmasters_dynamic_cart_wrap">' . 
			'<div class="cmsmasters_dynamic_cart">' .  
				'<a href="' . esc_js("javascript:void(0)") . '" class="cmsmasters_dynamic_cart_button">' . 
					'<span class="count_wrap cmsmasters_icon_custom_basket">' . 
						'<span class="count cmsmasters_dynamic_cart_count">' . esc_html($cart_count) . '</span>' . 
					'</span>' . 
				'</a>' . 
				'<div class="widget_shopping_cart_content"></div>' . 
			'</div>' . 
		'</div>';
	}
}

add_action('cmsmasters_after_logo', 'startup_company_woocommerce_cart_dropdown');


function startup_company_woocommerce_cart_dropdown_count_update($fragments) {
	global $woocommerce;
	
	
	ob_start();
	
	
	echo '<span class="count cmsmasters_dynamic_cart_count">' . $woocommerce->cart->get_cart_contents_count() . '</span>';
	
	$fragments['span.cmsmasters_dynamic_cart_count'] = ob_get_clean();
	
	
	return $fragments;
}

add_filter('woocommerce_add_to_cart_fragments', 'startup_company_woocommerce_cart_dropdown_count_update');


/* Dynamic Cart */
function startup_company_bottom_woocommerce_cart_dropdown($cmsmasters_option) {
	global $woocommerce;
	
	
	$cart_count = $woocommerce->cart->get_cart_contents_count();
	
	
	if ($cmsmasters_option['startup-company' . '_header_styles'] == 'c_nav') {
		echo '<div class="cmsmasters_dynamic_cart_wrap">' . 
			'<div class="cmsmasters_dynamic_cart">' . 
				'<a href="' . esc_js("javascript:void(0)") . '" class="cmsmasters_dynamic_cart_button">' . 
					'<span class="count_wrap cmsmasters_icon_custom_basket">' . 
						'<span class="count cmsmasters_dynamic_cart_count">' . esc_html($cart_count) . '</span>' . 
					'</span>' . 
				'</a>' . 
				'<div class="widget_shopping_cart_content"></div>' . 
			'</div>' . 
		'</div>';
	}
}

add_action('cmsmasters_after_header_bot', 'startup_company_bottom_woocommerce_cart_dropdown');


/* Header Cart */
function startup_company_woocommerce_header_cart_link() {
	global $woocommerce;
	
	
	$cart_count = $woocommerce->cart->get_cart_contents_count();
	
	
	echo '<a href="' . esc_url(wc_get_cart_url()) . '" class="cmsmasters_header_cart_link">' . 
		'<span class="count_wrap cmsmasters_icon_custom_basket">' . 
			'<span class="count cmsmasters_dynamic_cart_count">' . esc_html($cart_count) . '</span>' . 
		'</span>' . 
	'</a>';
}


/* Add to Cart Button */
function startup_company_woocommerce_add_to_cart_button() {
	global $woocommerce, 
		$product;
	
	
	if ( 
		$product->is_purchasable() && 
		$product->is_type( 'simple' ) && 
		$product->is_in_stock() 
	) {
		echo '<a href="' . esc_url($product->add_to_cart_url()) . '" data-product_id="' . esc_attr($product->get_id()) . '" data-product_sku="' . esc_attr($product->get_sku()) . '" class="cmsmasters_product_button add_to_cart_button cmsmasters_add_to_cart_button product_type_simple ajax_add_to_cart" title="' . esc_attr__('Add to Cart', 'startup-company') . '">' . 
			'<span>' . esc_html__('Add to Cart', 'startup-company') . '</span>' . 
		'</a>' . 
		'<a href="' . esc_url(wc_get_cart_url()) . '" class="cmsmasters_product_button added_to_cart wc-forward" title="' . esc_attr__('View Cart', 'startup-company') . '">' . 
			'<span>' . esc_html__('View Cart', 'startup-company') . '</span>' . 
		'</a>';
	} else {
		echo '<a href="' . esc_url(get_permalink($product->get_id())) . '" data-product_id="' . esc_attr($product->get_id()) . '" data-product_sku="' . esc_attr($product->get_sku()) . '" class="cmsmasters_details_button">' . 
			'<span>' . esc_html__('Show Details', 'startup-company') . '</span>' . 
		'</a>';
	}
}


/* Rating */
function startup_company_woocommerce_rating($icon_trans = '', $icon_color = '', $in_review = false, $comment_id = '', $show = true) {
	global $product;
	
	
	if (get_option( 'woocommerce_enable_review_rating') === 'no') {
		return;
	}
	
	
	$rating = (($in_review) ? intval(get_comment_meta($comment_id, 'rating', true)) : ($product->get_average_rating() ? $product->get_average_rating() : '0'));
	
	$itemtype = $in_review ? 'Rating' : 'AggregateRating';
	
	
	$out = "
<div class=\"cmsmasters_star_rating\" itemscope itemtype=\"http://schema.org/{$itemtype}\" title=\"" . sprintf(esc_html__('Rated %s out of 5', 'startup-company'), $rating) . "\">
<div class=\"cmsmasters_star_trans_wrap\">
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
</div>
<div class=\"cmsmasters_star_color_wrap\" style=\"width:" . (($rating / 5) * 100) . "%\">
	<div class=\"cmsmasters_star_color_inner\">
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
	</div>
</div>
<span class=\"rating dn\"><strong itemprop=\"ratingValue\">" . esc_html($rating) . "</strong> " . esc_html__('out of 5', 'startup-company') . "</span>
</div>
";
	
	
	if ($show) {
		print $out;
	} else {
		return $out;
	}
}


/* Price Format */
function startup_company_woocommerce_price_format($format, $currency_pos) {
	$format = '%2$s<span>%1$s</span>';

	switch ( $currency_pos ) {
		case 'left' :
			$format = '<span>%1$s</span>%2$s';
		break;
		case 'right' :
			$format = '%2$s<span>%1$s</span>';
		break;
		case 'left_space' :
			$format = '<span>%1$s&nbsp;</span>%2$s';
		break;
		case 'right_space' :
			$format = '%2$s<span>&nbsp;%1$s</span>';
		break;
	}
	
	return $format;
}
 
add_action('woocommerce_price_format', 'startup_company_woocommerce_price_format', 1, 2);

