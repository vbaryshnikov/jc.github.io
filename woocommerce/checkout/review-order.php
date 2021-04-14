<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="shop_table woocommerce-checkout-review-order-table table">
	<?php
	do_action( 'woocommerce_review_order_before_cart_contents' );

	$i = 0;
	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

		if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
			?>
            <div class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?> row">
                <div class="col col-3-4">
			        <?php if ($i == 0) { ?><div class="table__head">Товар</div><?php } ?>
                    <div class="table__value name">
                        <?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; ?>
                        <span class="count"><?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', sprintf( '&times; %s', $cart_item['quantity'] ) , $cart_item, $cart_item_key ); ?></span>
					    <?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
                    </div>
                </div>
                <div class="col col-1-4">
			        <?php if ($i == 0) { ?><div class="table__head">Итого</div><?php } ?>
                    <div class="table__value ">
                        <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
                    </div>
                </div>
            </div>
			<?php
		}
		$i++;
	}

	do_action( 'woocommerce_review_order_after_cart_contents' );
	?>
    <div class="row">
        <div class="col col-3-4"><?php _e( 'Subtotal', 'woocommerce' ); ?></div>
        <div class="col col-1-4"><?php wc_cart_totals_subtotal_html(); ?></div>
    </div>

	<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
        <div class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?> row">
            <div class="col col-3-4"><?php wc_cart_totals_coupon_label( $coupon ); ?></div>
            <div class="col col-1-4"><?php wc_cart_totals_coupon_html( $coupon ); ?></div>
        </div>
	<?php endforeach; ?>

	<?php /* if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

		<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

		<?php wc_cart_totals_shipping_html(); ?>

		<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

	<?php endif; */ ?>

	<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
        <div class="fee row">
            <div class="col col-3-4"><?php echo esc_html( $fee->name ); ?></div>
            <div class="col col-1-4"><?php wc_cart_totals_fee_html( $fee ); ?></div>
        </div>
	<?php endforeach; ?>

	<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
		<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
			<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
                <div class="tax-rate row tax-rate-<?php echo sanitize_title( $code ); ?>">
                    <div class="col col-3-4"><?php echo esc_html( $tax->label ); ?></div>
                    <div class="col col-1-4"><?php echo wp_kses_post( $tax->formatted_amount ); ?></div>
                </div>
			<?php endforeach; ?>
		<?php else : ?>
            <div class="tax-total row">
                <div class="col col-3-4"><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></div>
                <div class="col col-1-4"><?php wc_cart_totals_taxes_total_html(); ?></div>
            </div>
		<?php endif; ?>
	<?php endif; ?>

	<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

    <div class="order-total row">
        <div class="col col-3-4"><?php _e( 'Total', 'woocommerce' ); ?></div>
        <div class="col col-1-4"><?php wc_cart_totals_order_total_html(); ?></div>
    </div>
</div>
		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

