<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product ); ?>>


	<!-- product -->
		<div class="my-product">
			<div class="product-img" style="background-image:url()">
				<?php echo get_the_post_thumbnail();?>
				<div class="product-label">
					<span class="sale">-30%</span>
					<span class="new">NEW</span>
				</div>
			</div>
			<div class="product-body">
				<h3 class="product-name"><a href="#"><?php echo do_action('woocommerce_shop_loop_item_title');?></a></h3>
				<h4 class="product-price"><?php echo woocommerce_template_loop_price();?></h4>
				<div class="product-rating">
					<?php echo woocommerce_template_loop_rating();?>
				</div>
				<div class="product-btns">
					<button class="add-to-wishlist"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]');?><span class="tooltipp">add to wishlist</span></button>
					<button class="add-to-compare"><a href="<?php echo site_url();?>/?action=yith-woocompare-add-product&amp;id=<?php echo get_the_ID();?>" class="compare button" data-product_id="<?php echo get_the_ID();?>" rel="nofollow"><i class="fa fa-exchange" aria-hidden="true"></i></a><span class="tooltipp">add to compare</span></button>
					<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
				</div>
			</div>
			<div class="add-to-cart">
				<button class="add-to-cart-btn"><i class="fa fa-shopping-basket"></i><?php echo woocommerce_template_loop_add_to_cart();?></button>
			</div>
		</div>

	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	//do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	//do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	//do_action( 'woocommerce_after_shop_loop_item' );
	?>
</li>
