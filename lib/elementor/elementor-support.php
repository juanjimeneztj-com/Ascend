<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_action('after_setup_theme', 'juanjimeneztj_elementor_support');
function juanjimeneztj_elementor_support() {
	if ( juanjimeneztj_Plugin_Check::active_check( 'elementor/elementor.php' ) ){
		add_action('init', 'juanjimeneztj_elementor_woo_editing_issue', 1);
		require_once( trailingslashit( get_template_directory() ) . 'lib/elementor/class-juanjimeneztj-elementor-header-footer.php');
	}
}
function juanjimeneztj_elementor_woo_editing_issue() {
	add_action( 'admin_action_elementor', 'juanjimeneztj_woo_archive_hooks_re_remove', 9 );
}
function juanjimeneztj_woo_archive_hooks_re_remove() {
	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );    
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
    remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );
	remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
    remove_action( 'woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10 );
    remove_action( 'woocommerce_after_subcategory', 'woocommerce_template_loop_category_link_close', 10 );
}