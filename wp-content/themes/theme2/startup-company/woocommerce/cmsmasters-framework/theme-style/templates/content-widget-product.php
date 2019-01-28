<?php
/**
 * @cmsmasters_package 	Startup Company
 * @cmsmasters_version 	1.0.6
 */


global $product;
?>
<li>
	<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>

	<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
		<?php print $product->get_image(); ?>
		<span class="product-title"><?php echo wp_kses_post($product->get_name()); ?></span>
	</a>

	<?php startup_company_woocommerce_rating('cmsmasters_theme_icon_star_empty', 'cmsmasters_theme_icon_star_full'); ?>

	<?php print $product->get_price_html(); ?>

	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>
</li>