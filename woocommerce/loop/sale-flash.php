<?php
/**
 * Product loop sale flash
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;
	$juanjimeneztj = juanjimeneztj_get_options();
	if(isset($juanjimeneztj['outofstocktag']) && $juanjimeneztj['outofstocktag'] == 1) {

		if (! $product->is_in_stock() ) : 
	 		if(!empty($juanjimeneztj['sold_placeholder_text'])) {
	 			$sold_text = $juanjimeneztj['sold_placeholder_text'];
	 		} else {
	 			$sold_text = __( 'Sold', 'juanjimeneztj');
	 		} 
	    	echo apply_filters('juanjimeneztj_woocommerce_soldout_flash', '<span class="onsale kad-out-of-stock">' . $sold_text . '</span>', $post, $product);

	    elseif ($product->is_on_sale()) : 
	        if(!empty($juanjimeneztj['sale_placeholder_text'])) {
	        	$sale_text = $juanjimeneztj['sale_placeholder_text'];
	        } else {
	        	$sale_text = __( 'Sale!', 'juanjimeneztj');
	        } 
	      	echo apply_filters('woocommerce_sale_flash', '<span class="onsale">'.$sale_text.'</span>', $post, $product); 
	    endif; 

	} elseif ($product->is_on_sale()) { 
  		if(!empty($juanjimeneztj['sale_placeholder_text'])) {
  			$sale_text = $juanjimeneztj['sale_placeholder_text'];
  		} else {
  			$sale_text = __( 'Sale!', 'juanjimeneztj');
  		}
  		echo apply_filters('woocommerce_sale_flash', '<span class="onsale">'.$sale_text.'</span>', $post, $product); 
  	} ?>