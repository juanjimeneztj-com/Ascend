<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
add_action('juanjimeneztj_before_above_header', 'juanjimeneztj_topbar', 20);
function juanjimeneztj_topbar() {
	$juanjimeneztj = juanjimeneztj_get_options();
	if(isset($juanjimeneztj['topbar_enable']) && $juanjimeneztj['topbar_enable'] == '1') {
		get_template_part('templates/header', 'topbar');
	}
}
add_action('juanjimeneztj_header_topbar_left', 'juanjimeneztj_topbar_left', 20);
function juanjimeneztj_topbar_left() {
	$juanjimeneztj = juanjimeneztj_get_options();
	if(isset($juanjimeneztj['topbar_search']) && $juanjimeneztj['topbar_search'] == 'left')  {
		juanjimeneztj_topbar_search('left');
	}
	if(isset($juanjimeneztj['topbar_menu_location']) && $juanjimeneztj['topbar_menu_location'] == 'left') {
		juanjimeneztj_topbar_menu('left');
	}
	if(isset($juanjimeneztj['topbar_account']) && $juanjimeneztj['topbar_account'] == 'left')  {
		juanjimeneztj_topbar_account('left');
	}
	if(isset($juanjimeneztj['topbar_cart']) && $juanjimeneztj['topbar_cart'] == 'left') {
		juanjimeneztj_topbar_cart('left');
	}
	if(isset($juanjimeneztj['topbar_widget_area']) && $juanjimeneztj['topbar_widget_area'] == 'left') {
		juanjimeneztj_topbar_widget_area('left');
	}
}
add_action('juanjimeneztj_header_topbar_right', 'juanjimeneztj_topbar_right', 20);
function juanjimeneztj_topbar_right() {
	$juanjimeneztj = juanjimeneztj_get_options();
	if(isset($juanjimeneztj['topbar_search']) && $juanjimeneztj['topbar_search'] == 'right')  {
		juanjimeneztj_topbar_search('right');
	}
	if(isset($juanjimeneztj['topbar_menu_location']) && $juanjimeneztj['topbar_menu_location'] == 'right') {
		juanjimeneztj_topbar_menu('right');
	}
	if(isset($juanjimeneztj['topbar_account']) && $juanjimeneztj['topbar_account'] == 'right')  {
		juanjimeneztj_topbar_account('right');
	}
	if(isset($juanjimeneztj['topbar_widget_area']) && $juanjimeneztj['topbar_widget_area'] == 'right') {
		juanjimeneztj_topbar_widget_area('right');
	}
	if(isset($juanjimeneztj['topbar_cart']) && $juanjimeneztj['topbar_cart'] == 'right')  {
		juanjimeneztj_topbar_cart('right');
	}
}
function juanjimeneztj_topbar_menu($side = 'left') {
	if (has_nav_menu('topbar_navigation')) : ?>
        	<div class="kad-topbar-flex-item kad-topbar-menu kad-topbar-item-<?php echo esc_attr($side);?>">
             	<?php 
             		wp_nav_menu(array('theme_location' => 'topbar_navigation', 'menu_class' => 'sf-menu sf-menu-normal')); 
             	?>
            </div>
   	<?php  endif; 
}
function juanjimeneztj_topbar_cart($side = 'right') {
	if (class_exists('woocommerce'))  { 
		$juanjimeneztj = juanjimeneztj_get_options(); ?>
      	<div class="kad-topbar-flex-item kad-topbar-cart kt-header-extras kad-topbar-item-<?php echo esc_attr($side);?>">
	      	<ul class="sf-menu sf-menu-normal">
			  	<li class="menu-cart-icon-kt sf-dropdown">
					<a class="menu-cart-btn" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
			  			<div class="kt-top-extras-label">
			  			<?php if(isset($juanjimeneztj['topbar_cart_label']) && !empty($juanjimeneztj['topbar_cart_label'])) { 
	          				if(isset($juanjimeneztj['tl_cart']) && !empty($juanjimeneztj['tl_cart'])) {
			                   	$title =  $juanjimeneztj['tl_cart'];
			                } else {
			                	$title =  __('Cart', 'juanjimeneztj');
			                }?>
	          				<span class="cart-extras-title"><?php echo esc_html($title);?></span>
	          			<?php } ?>
	          			 <i class="kt-icon-shopping-bag"></i><span class="kt-cart-total"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span></div>
					</a>
					<ul id="topbar-kad-head-cart-popup" class="sf-dropdown-menu kad-head-cart-popup">
			    		<li class="kt-mini-cart-refreash">
			    			<?php woocommerce_mini_cart(); 
			    				do_action( 'juanjimeneztj_cart_menu_popup_after' ); ?>
			    		</li>
			  		</ul>
				</li>
			</ul>
        </div>
    <?php } 
}
function juanjimeneztj_topbar_account($side = 'right') {
	if (class_exists('woocommerce'))  { 
		$juanjimeneztj = juanjimeneztj_get_options(); ?>
	<div class="kad-topbar-flex-item kad-topbar-account kt-header-extras kad-topbar-item-<?php echo esc_attr($side);?>">
	      	<ul class="sf-menu sf-menu-normal">
		    	<li class="menu-account-icon-kt sf-dropdown">
		        	<?php if ( is_user_logged_in() ) { 
		        		if(isset($juanjimeneztj['tl_my_account']) && !empty($juanjimeneztj['tl_my_account'])) {
		                   	$title =  $juanjimeneztj['tl_my_account'];
		                }  else {
		                	$title = get_the_title(get_option('woocommerce_myaccount_page_id'));
		                }?>
			            <a class="menu-account-btn" href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">
			                <div class=" kt-top-extras-label"><span><?php echo esc_html($title);?></span></div>
			            </a>
			            <ul id="topbar-kad-head-my-account-menu" class="sf-dropdown-menu kad-head-my-account-menu">
			            <?php 
			            wc_get_template( 'myaccount/navigation.php' );
			            ?>
			            </ul>
		        	<?php } else { 
		                if(isset($juanjimeneztj['tl_login_signup']) && !empty($juanjimeneztj['tl_login_signup'])) {
		                   	$title =  $juanjimeneztj['tl_login_signup'];
		                } else if(get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes') {
		                   	$title =  __('Login/Signup', 'juanjimeneztj');
		                } else {
		                    $title =  __('Login', 'juanjimeneztj');
		                } ?>
		         		<a class="menu-account-btn kt-pop-modal" data-mfp-src="#kt-extras-modal-login">
		            		<div class="kt-extras-label"><span><?php echo esc_html($title);?></span></div>
		        		</a>

		          	<?php  } ?>
		    	</li>
		    </ul>
        </div>
    <?php
    }  
}
function juanjimeneztj_topbar_search($side = 'right') {  ?>
      	<div class="kad-topbar-flex-item kad-topbar-search kad-topbar-item-<?php echo esc_attr($side);?>">
      		<ul class="sf-menu">
      			<li>
	             	<a class="kt-menu-search-btn kt-pop-modal" data-mfp-src="#kt-extras-modal-search" href="<?php echo esc_url(home_url().'/?s='); ?>">
						<div class="kt-extras-label"><i class="kt-icon-search"></i></div>
					</a>
				</li>
			</ul>
        </div>
    <?php
}
function juanjimeneztj_topbar_widget_area($side = 'right') { ?>
	<div class="kad-topbar-flex-item kad-topbar-widget-area kad-topbar-item-<?php echo esc_attr($side);?>">
	<?php 
		if(is_active_sidebar('topbar_widget')) {
			dynamic_sidebar('topbar_widget');
		}
	?>
	</div>
	<?php 
}