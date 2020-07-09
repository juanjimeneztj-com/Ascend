<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
add_action( 'juanjimeneztj_footer', 'juanjimeneztj_footer_markup', 10 );
function juanjimeneztj_footer_markup() {
	get_template_part('templates/footer');
}
add_action('wp_footer', 'juanjimeneztj_header_extras_login_modal', 20);
function juanjimeneztj_header_extras_login_modal() {
	$juanjimeneztj = juanjimeneztj_get_options();
		if(isset($juanjimeneztj['header_extras']['login']) && $juanjimeneztj['header_extras']['login'] == '1' || isset($juanjimeneztj['topbar_account']) && $juanjimeneztj['topbar_account'] != 'none' || (isset($juanjimeneztj['mobile_header_account']) && ($juanjimeneztj['mobile_header_account'] == 'right' || $juanjimeneztj['mobile_header_account'] == 'left') ) && !is_user_logged_in() ){ ?>
	        	<div class="mag-pop-modal mfp-hide mfp-with-anim kt-loggin-modal" id="kt-extras-modal-login" tabindex="-1" role="dialog" aria-hidden="true">
	                <div class="pop-modal-content">
	                    <div class="pop-modal-body">
	                        <?php 
	                        	if (class_exists('woocommerce'))  {
	                        		wc_get_template( 'myaccount/form-login.php' );
	                        	} else {
	                        		wp_login_form();
	                        		wp_register('<p>'.__("Don't have an account?", "juanjimeneztj"), '</p>');
	                        	}
	                        ?>
	                    </div>
	                </div>
		        </div>
	        <?php
	    }
}
add_action('wp_footer', 'juanjimeneztj_header_extras_search_modal', 20);
function juanjimeneztj_header_extras_search_modal() {
	$juanjimeneztj = juanjimeneztj_get_options();
		if((isset($juanjimeneztj['header_extras']['search']) && $juanjimeneztj['header_extras']['search'] == '1') || (isset($juanjimeneztj['mobile_header_search']) && $juanjimeneztj['mobile_header_search'] != 'none') || (isset($juanjimeneztj['topbar_search']) && $juanjimeneztj['topbar_search'] != 'none')) { ?>
    		<div class="mag-pop-modal mfp-hide mfp-with-anim kt-search-modal" id="kt-extras-modal-search" tabindex="-1" role="dialog" aria-hidden="true">
	            <div class="pop-modal-content">
	                <div class="pop-modal-body">
                        <?php
                        if(class_exists('woocommerce') && isset($juanjimeneztj['header_extras_search_woo']) && $juanjimeneztj['header_extras_search_woo'] == '1') { 
							get_product_search_form();
			        	} else { 
			              	get_search_form();
			            } ?>
	                </div>
	            </div>
	        </div>
	   	<?php 
	   }
}

add_action('wp_footer', 'juanjimeneztj_mobile_menu_sldr', 30);
function juanjimeneztj_mobile_menu_sldr() {
	$juanjimeneztj = juanjimeneztj_get_options(); ?>
    		<div class="mag-pop-sldr mfp-hide mfp-with-anim kt-mobile-menu" id="kt-mobile-menu" tabindex="-1" role="dialog" aria-hidden="true">
	            <div class="pop-modal-content">
	                <div class="pop-modal-body">
                    <?php do_action('juanjimeneztj_mobile_menu_before'); 
                  	if(has_nav_menu('mobile_navigation')) {
                  		$menu_location = 'mobile_navigation';
                  	} else {
                  		$menu_location = 'primary_navigation';
                  	}
                  	if(isset($juanjimeneztj['mobile_menu_search']) && $juanjimeneztj['mobile_menu_search'] == '1') { 
	                  	if(class_exists('woocommerce') && isset($juanjimeneztj['mobile_menu_search_woo']) && $juanjimeneztj['mobile_menu_search_woo'] == '1') { 
	            			get_product_search_form();
			          	} else { 
			              	get_search_form();
			            } 
                  	} 
                  	if(has_nav_menu($menu_location)) {
	                  	if(isset($juanjimeneztj['mobile_submenu_collapse']) && $juanjimeneztj['mobile_submenu_collapse'] == '1') {
	                    	wp_nav_menu( array('theme_location' => $menu_location,'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'menu_class' => 'kad-mobile-nav', 'walker' => new juanjimeneztj_mobile_walker()));
	                  	} else {
	                    	wp_nav_menu( array('theme_location' => $menu_location,'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'menu_class' => 'kad-mobile-nav'));
	                  	} 
	                }
                  	do_action('juanjimeneztj_mobile_menu_after'); ?>
	                </div>
	            </div>
	        </div>
	   	<?php 
	   
}
add_action('wp_footer', 'juanjimeneztj_mobile_cart_sldr', 30);
function juanjimeneztj_mobile_cart_sldr() { 
	if (class_exists('woocommerce'))  { 
		$juanjimeneztj = juanjimeneztj_get_options();  
		if(isset($juanjimeneztj['mobile_header_cart']) && ($juanjimeneztj['mobile_header_cart'] == 'right' || $juanjimeneztj['mobile_header_cart'] == 'left'))  {?>
    		<div class="mag-pop-sldr mfp-hide mfp-with-anim kt-mobile-cart" id="kt-mobile-cart" tabindex="-1" role="dialog" aria-hidden="true">
	            <div class="pop-modal-content">
	                <div class="pop-modal-body">
                    <?php do_action('juanjimeneztj_mobile_cart_before'); ?>
                  	
                  	<div class="kt-mini-cart-refreash">
						<?php woocommerce_mini_cart(); ?>
					</div>
                  	<?php do_action('juanjimeneztj_mobile_cart_after'); ?>
	                </div>
	            </div>
	        </div>
	   	<?php 
	   }
	}
}
add_action('wp_footer', 'juanjimeneztj_mobile_account_sldr', 30);
function juanjimeneztj_mobile_account_sldr() { 
	if (class_exists('woocommerce'))  { 
		$juanjimeneztj = juanjimeneztj_get_options();  
		if(isset($juanjimeneztj['mobile_header_account']) && ($juanjimeneztj['mobile_header_account'] == 'right' || $juanjimeneztj['mobile_header_account'] == 'left') ) {
			if(is_user_logged_in()) {?>
    		<div class="mag-pop-sldr mfp-hide mfp-with-anim kt-mobile-account" id="kt-mobile-account" tabindex="-1" role="dialog" aria-hidden="true">
	            <div class="pop-modal-content">
	                <div class="pop-modal-body">
                    <?php do_action('juanjimeneztj_mobile_account_before'); ?>
                  	<?php 
			            wc_get_template( 'myaccount/navigation.php' );
			            ?>
                  	<?php do_action('juanjimeneztj_mobile_account_after'); ?>
	                </div>
	            </div>
	        </div>
	   		<?php 
		  	}
	   	}
	}
}