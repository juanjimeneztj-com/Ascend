<?php 

 /**
   * Custom Woocommerce Account Functions 2.6
   */
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

add_action('woocommerce_before_cart', 'juanjimeneztj_woo_cart_form_wrap_before');
function juanjimeneztj_woo_cart_form_wrap_before() {
    echo '<div class="kt-woo-cart-form-wrap">';
}

add_action('woocommerce_after_cart', 'juanjimeneztj_woo_cart_form_wrap_after');
function juanjimeneztj_woo_cart_form_wrap_after() {
    echo '</div>';
}

add_action('woocommerce_before_cart_table', 'juanjimeneztj_woo_cart_summary_title');
function juanjimeneztj_woo_cart_summary_title() {
    echo '<div class="cart-summary"><h2>'.__('Cart Summary', 'juanjimeneztj').'</h2></div>';
}
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' ); 
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' ); 
