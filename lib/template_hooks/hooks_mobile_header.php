<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
add_action('juanjimeneztj_mobile_header_left', 'juanjimeneztj_mobile_left', 20);
function juanjimeneztj_mobile_left() {
	$juanjimeneztj = juanjimeneztj_get_options();
	if(isset($juanjimeneztj['mobile_header_menu']) && $juanjimeneztj['mobile_header_menu'] == 'left') {
		juanjimeneztj_mobile_menu_ouput('left');
	}
	if(isset($juanjimeneztj['mobile_header_cart']) && $juanjimeneztj['mobile_header_cart'] == 'left') {
		juanjimeneztj_mobile_header_cart('left');
	}
	if(isset($juanjimeneztj['mobile_header_account']) && $juanjimeneztj['mobile_header_account'] == 'left')  {
		juanjimeneztj_mobile_header_account('left');
	}
	if(isset($juanjimeneztj['mobile_header_search']) && $juanjimeneztj['mobile_header_search'] == 'left')  {
		juanjimeneztj_mobile_header_search('left');
	}
	if(isset($juanjimeneztj['mobile_header_layout']) && $juanjimeneztj['mobile_header_layout'] == 'center') {
		// Do nothing
	} else {
		juanjimeneztj_the_custom_mobile_logo();
	}
}
add_action('juanjimeneztj_mobile_header_center', 'juanjimeneztj_mobile_center', 20);
function juanjimeneztj_mobile_center() {
	$juanjimeneztj = juanjimeneztj_get_options();
	if(isset($juanjimeneztj['mobile_header_layout']) && $juanjimeneztj['mobile_header_layout'] == 'center') {
		juanjimeneztj_the_custom_mobile_logo('center');
		juanjimeneztj_the_custom_mobile_logo_decoy();
	}
}
add_action('juanjimeneztj_mobile_header_right', 'juanjimeneztj_mobile_right', 20);
function juanjimeneztj_mobile_right() {
	$juanjimeneztj = juanjimeneztj_get_options();
	if(isset($juanjimeneztj['mobile_header_search']) && $juanjimeneztj['mobile_header_search'] == 'right')  {
		juanjimeneztj_mobile_header_search('right');
	}
	if(isset($juanjimeneztj['mobile_header_account']) && $juanjimeneztj['mobile_header_account'] == 'right')  {
		juanjimeneztj_mobile_header_account('right');
	}
	if(isset($juanjimeneztj['mobile_header_cart']) && $juanjimeneztj['mobile_header_cart'] == 'right')  {
		juanjimeneztj_mobile_header_cart('right');
	}
	if( ( isset( $juanjimeneztj['mobile_header_menu'] ) && $juanjimeneztj['mobile_header_menu'] == 'right' ) || ! isset( $juanjimeneztj['mobile_header_menu'] ) ) {
		juanjimeneztj_mobile_menu_ouput('right');
	}
}
function juanjimeneztj_the_custom_mobile_logo($position = 'left') {
	$juanjimeneztj = juanjimeneztj_get_options();
	echo '<div id="mobile-logo" class="logocase kad-mobile-header-height kad-mobile-logo-'.esc_attr($position).'">';
		echo '<a class="brand logofont" href="'.esc_url(apply_filters('juanjimeneztj_logo_link', home_url())).'">';
		$liu = '';
		if(isset($juanjimeneztj['mobile_logo_switch']) && $juanjimeneztj['mobile_logo_switch'] == '0') {
			if(isset($juanjimeneztj['logo']['id']) && !empty($juanjimeneztj['logo']['id'])) {
				if(isset($juanjimeneztj['mobile_logo_width']) && !empty($juanjimeneztj['mobile_logo_width'])) {
					$width = $juanjimeneztj['mobile_logo_width'];
				} else {
					$width = 300;
				}
				$width = apply_filters('juanjimeneztj_mobile_logo_width', $width);
				$alt = get_bloginfo('name');
				echo juanjimeneztj_get_full_image_output($width, null, false, 'juanjimeneztj-mobile-logo', $alt, $juanjimeneztj['logo']['id'], false, false, false);
				if(isset($juanjimeneztj['trans_logo']['id']) && !empty($juanjimeneztj['trans_logo']['id'])) {
					$img = juanjimeneztj_get_image_array($width, null, false, 'juanjimeneztj-trans-logo', $alt, $juanjimeneztj['trans_logo']['id'], false);
					echo '<img src="'.esc_url($img['src']).'" width="'.esc_attr($img['width']).'" height="'.esc_attr($img['height']).'" '.$img['srcset'].' class="'.esc_attr($img['class']).'" style="max-height:'.esc_attr($img['height']).'px" alt="'.esc_attr($img['alt']).'">';
				}
				$liu = 'kad-logo-used';
			}
			if(isset($juanjimeneztj['site_title']) && $juanjimeneztj['site_title'] == 1) {
				echo '<span class="kad-site-title '.$liu.'">';
				echo apply_filters('kad_site_name', get_bloginfo('name')); 
				if(isset($juanjimeneztj['site_tagline']) && $juanjimeneztj['site_tagline'] == 1) {
					echo '<span class="kad-site-tagline">';
					echo apply_filters('kad_site_tagline', get_bloginfo('description'));
					echo '</span>';
				}
				echo '</span>';
			}
		} else {
			if(isset($juanjimeneztj['mobile_logo']['id']) && !empty($juanjimeneztj['mobile_logo']['id'])) {
				if(isset($juanjimeneztj['mobile_logo_width']) && !empty($juanjimeneztj['mobile_logo_width'])) {
					$width = $juanjimeneztj['mobile_logo_width'];
				} else {
					$width = 300;
				}
				$width = apply_filters('juanjimeneztj_mobile_logo_width', $width);
				$alt = get_bloginfo('name');
				echo juanjimeneztj_get_full_image_output($width, null, false, 'juanjimeneztj-mobile-logo', $alt, $juanjimeneztj['mobile_logo']['id'], false, false, false);
				if(isset($juanjimeneztj['trans_logo_mobile']['id']) && !empty($juanjimeneztj['trans_logo_mobile']['id'])) {
					$img = juanjimeneztj_get_image_array($width, null, false, 'juanjimeneztj-mobile-trans-logo', $alt, $juanjimeneztj['trans_logo_mobile']['id'], false);
					echo '<img src="'.esc_url($img['src']).'" width="'.esc_attr($img['width']).'" height="'.esc_attr($img['height']).'" '.$img['srcset'].' class="'.esc_attr($img['class']).'" style="max-height:'.esc_attr($img['height']).'px" alt="'.esc_attr($img['alt']).'">';
				}
				$liu = 'kad-logo-used';
			}
			if(isset($juanjimeneztj['mobile_site_title']) && $juanjimeneztj['mobile_site_title'] == 1) {
				echo '<span class="kad-mobile-site-title '.$liu.'">';
				echo apply_filters('kad_site_name', get_bloginfo('name'));
				if(isset($juanjimeneztj['mobile_site_tagline']) && $juanjimeneztj['mobile_site_tagline'] == 1) {
					echo '<span class="kad-mobile-site-tagline">';
					echo apply_filters('kad_site_tagline', get_bloginfo('description'));
					echo '</span>';
				}
				echo '</span>';
			}
		}
		echo '</a>';
	echo '</div>';
}
function juanjimeneztj_the_custom_mobile_logo_decoy() {
	echo '<div id="mobile-logo-placeholder" class="kad-mobile-header-height">';
	echo '</div>';
}
function juanjimeneztj_mobile_menu_ouput($side = 'right') {
	if (has_nav_menu('primary_navigation') || has_nav_menu('mobile_navigation')) : ?>
        	<div class="kad-mobile-menu-flex-item kad-mobile-header-height kt-mobile-header-toggle kad-mobile-menu-<?php echo esc_attr($side);?>">
             	<button class="mobile-navigation-toggle kt-sldr-pop-modal" rel="nofollow" data-mfp-src="#kt-mobile-menu" data-pop-sldr-direction="<?php echo esc_attr($side);?>" data-pop-sldr-class="sldr-menu-animi">
             		<span class="kt-mnt">
	                	<span></span>
						<span></span>
						<span></span>
					</span>
              	</button>
            </div>
   	<?php  endif; 
}
function juanjimeneztj_mobile_header_cart($side = 'right') {
	if (class_exists('woocommerce'))  { ?>
      	<div class="kad-mobile-cart-flex-item kad-mobile-header-height kt-mobile-header-toggle kad-mobile-cart-<?php echo esc_attr($side);?>">
             	<button class="kt-woo-cart-toggle kt-sldr-pop-modal" rel="nofollow" data-mfp-src="#kt-mobile-cart" data-pop-sldr-direction="<?php echo esc_attr($side);?>"  data-pop-sldr-class="sldr-cart-animi">
					<span class="kt-extras-label"><i class="kt-icon-shopping-bag"></i><span class="kt-cart-total"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span></span>
              	</button>
        </div>
    <?php } 
}
function juanjimeneztj_mobile_header_account($side = 'right') {
	if (class_exists('woocommerce'))  { ?>
      	<div class="kad-mobile-account-flex-item kad-mobile-header-height kt-mobile-header-toggle kad-mobile-account-<?php echo esc_attr($side);?>">
      		<?php if ( is_user_logged_in() ) { ?>
             	<button class="kt-woo-account-toggle  kt-sldr-pop-modal" rel="nofollow" data-mfp-src="#kt-mobile-account" data-pop-sldr-direction="<?php echo esc_attr($side);?>"  data-pop-sldr-class="sldr-account-animi">
					<span class="kt-extras-label header-underscore-icon"><i class="kt-icon-user"></i></span>
          		</button>
            <?php } else { ?>
            	<button class="kt-woo-account-toggle kt-pop-modal" rel="nofollow" data-mfp-src="#kt-extras-modal-login">
					<span class="kt-extras-label"><i class="kt-icon-user"></i></span>
              	</button>
             <?php 	} ?>
        </div>
    <?php } 
}
function juanjimeneztj_mobile_header_search($side = 'right') {  ?>
      	<div class="kad-mobile-seearch-flex-item kad-mobile-header-height kt-mobile-header-toggle kad-mobile-search-<?php echo esc_attr($side);?>">
             	<button class="kt-search-toggle kt-pop-modal" rel="nofollow" data-mfp-src="#kt-extras-modal-search">
					<span class="kt-extras-label"><i class="kt-icon-search"></i></span>
          		</button>
        </div>
    <?php
}