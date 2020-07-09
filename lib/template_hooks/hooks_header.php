<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
add_action( 'juanjimeneztj_header', 'juanjimeneztj_header_markup', 10 );
function juanjimeneztj_header_markup() {
	$juanjimeneztj = juanjimeneztj_get_options();
	if(isset($juanjimeneztj['site_layout'])) {
		$site_layout = $juanjimeneztj['site_layout'];
	} else {
		$site_layout = 'above';
	}
	if($site_layout == 'left' || $site_layout == 'right') {
		get_template_part('templates/header-vertical');
	} else {
		get_template_part('templates/header-above');
	}
	get_template_part('templates/header-mobile');
}

add_action('juanjimeneztj_start_vertical_header', 'juanjimeneztj_the_custom_logo', 10);
add_action('juanjimeneztj_below_logo_header_center', 'juanjimeneztj_the_custom_logo', 20);
add_action('juanjimeneztj_center_logo_header_center', 'juanjimeneztj_the_custom_logo', 20);
add_action('juanjimeneztj_header_left', 'juanjimeneztj_the_custom_logo', 20);
function juanjimeneztj_the_custom_logo() {
	$juanjimeneztj = juanjimeneztj_get_options();
	echo '<div id="logo" class="logocase kad-header-height">';
		echo '<a class="brand logofont" href="'.esc_url(apply_filters('juanjimeneztj_logo_link', home_url())).'">';
		$liu = '';
		$logo = get_theme_mod( 'custom_logo' );
		if(isset($logo) && !empty($logo) ) {
			$juanjimeneztj['logo']['id'] = $logo;
		} else {
			if(isset($juanjimeneztj['logo']['id']) && !empty($juanjimeneztj['logo']['id'])){
				set_theme_mod( 'custom_logo', $juanjimeneztj['logo']['id']);
			}
		}
		//$juanjimeneztj['logo']['id'] = get_theme_mod( 'custom_logo' );
		if(isset($juanjimeneztj['logo']['id']) && !empty($juanjimeneztj['logo']['id'])) {
			if(isset($juanjimeneztj['logo_width']) && !empty($juanjimeneztj['logo_width'])) {
				$width = $juanjimeneztj['logo_width'];
			} else {
				$width = 300;
			}
			$width = apply_filters('juanjimeneztj_logo_width', $width);
			$alt = get_bloginfo('name');
			$img = juanjimeneztj_get_image_array($width, null, false, 'juanjimeneztj-logo', $alt, $juanjimeneztj['logo']['id'], false);
			echo '<img src="'.esc_url($img['src']).'" width="'.esc_attr($img['width']).'" height="'.esc_attr($img['height']).'" '.$img['srcset'].' class="'.esc_attr($img['class']).'" style="max-height:'.esc_attr($img['height']).'px" alt="'.esc_attr($img['alt']).'">';
			if(isset($juanjimeneztj['trans_logo']['id']) && !empty($juanjimeneztj['trans_logo']['id'])) {
				$img = juanjimeneztj_get_image_array($width, null, false, 'juanjimeneztj-trans-logo', $alt, $juanjimeneztj['trans_logo']['id'], false);
				echo '<img src="'.esc_url($img['src']).'" width="'.esc_attr($img['width']).'" height="'.esc_attr($img['height']).'" '.$img['srcset'].' class="'.esc_attr($img['class']).'" style="max-height:'.esc_attr($img['height']).'px" alt="'.esc_attr($img['alt']).'">';
			}
			$liu = 'kad-logo-used';
		}
		if(isset($juanjimeneztj['site_title']) && $juanjimeneztj['site_title'] == 1 || !isset($juanjimeneztj['site_title'])) {
			echo '<span class="kad-site-title '.esc_attr($liu).'">';
			echo apply_filters('kad_site_name', get_bloginfo('name')); 
			if(isset($juanjimeneztj['site_tagline']) && $juanjimeneztj['site_tagline'] == 1 || !isset($juanjimeneztj['site_tagline'])) {
				echo '<span class="kad-site-tagline">';
				echo apply_filters('kad_site_tagline', get_bloginfo('description'));
				echo '</span>';
			}
			echo '</span>';
		}
		echo '</a>';
	echo '</div>';
}

add_action('juanjimeneztj_menu_vertical_header', 'juanjimeneztj_primary_vertical_menu', 20);
function juanjimeneztj_primary_vertical_menu() {
		if (has_nav_menu('primary_navigation')) : ?>
		<div class="kad-header-menu">
	        <nav class="nav-main clearfix">
                <?php wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'sf-menu sf-vertical'));  ?>
            </nav>
        </div> <!-- Close v header menu -->    
        <?php 
        endif; 
}	

add_action('juanjimeneztj_below_logo_header_below', 'juanjimeneztj_primary_menu_area', 20);
add_action('juanjimeneztj_header_center', 'juanjimeneztj_primary_menu_area', 20);
function juanjimeneztj_primary_menu_area() {
		if (has_nav_menu('primary_navigation')) : ?>
	        <nav class="nav-main clearfix">
	            <?php wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'sf-menu sf-menu-normal'));  ?>
	        </nav>
        <?php 
        endif; 
}	
add_action('juanjimeneztj_center_logo_header_left', 'juanjimeneztj_left_header_menu', 10);
function juanjimeneztj_left_header_menu() {
		if (has_nav_menu('left_navigation')) : ?>
	        <nav class="nav-main clearfix">
	            <?php wp_nav_menu(array('theme_location' => 'left_navigation', 'menu_class' => 'sf-menu sf-menu-normal'));  ?>
	        </nav>
        <?php 
        endif; 
}	
add_action('juanjimeneztj_center_logo_header_right', 'juanjimeneztj_right_header_menu', 10);
function juanjimeneztj_right_header_menu() {
		if (has_nav_menu('right_navigation')) : ?>
	        <nav class="nav-main clearfix">
	            <?php wp_nav_menu(array('theme_location' => 'right_navigation', 'menu_class' => 'sf-menu sf-menu-normal'));  ?>
	        </nav>
        <?php 
        endif;  
}
add_action('juanjimeneztj_below_logo_header_left', 'juanjimeneztj_header_extras_hook_left', 20);
function juanjimeneztj_header_extras_hook_left() {
		juanjimeneztj_header_extras('sf-menu-normal', 'left');
}
add_action('juanjimeneztj_below_logo_header_right', 'juanjimeneztj_header_extras_hook_right', 20);
function juanjimeneztj_header_extras_hook_right() {
		juanjimeneztj_header_extras('sf-menu-normal', 'right');
}
add_action('juanjimeneztj_center_logo_header_right', 'juanjimeneztj_header_extras_hook', 20);
add_action('juanjimeneztj_header_right', 'juanjimeneztj_header_extras_hook', 20);
function juanjimeneztj_header_extras_hook() {
		juanjimeneztj_header_extras('sf-menu-normal');
}
add_action('juanjimeneztj_start_vertical_header', 'juanjimeneztj_header_vertical_extras_top', 20);
function juanjimeneztj_header_vertical_extras_top() {
	$juanjimeneztj = juanjimeneztj_get_options();
	if(isset($juanjimeneztj['beside_header_style']) && $juanjimeneztj['beside_header_style'] == 'extras_above_menu') {
		juanjimeneztj_header_extras('sf-vertical');
	}
}
add_action('juanjimeneztj_end_vertical_header', 'juanjimeneztj_header_vertical_extras_bottom', 20);
function juanjimeneztj_header_vertical_extras_bottom() {
	$juanjimeneztj = juanjimeneztj_get_options();
	if((isset($juanjimeneztj['beside_header_style']) && $juanjimeneztj['beside_header_style'] == 'standard') || !isset($juanjimeneztj['beside_header_style'])) {
		juanjimeneztj_header_extras('sf-vertical');
	}
}
function juanjimeneztj_header_extras($class = 'sf-menu-normal', $side = null) {
	global $woocommerce;
	$juanjimeneztj = juanjimeneztj_get_options();
	if(isset($juanjimeneztj['header_extras']) ){
		$header_extras = $juanjimeneztj['header_extras'];
	}
	// For logo Above menu
	if(isset($side) && ($side == 'left' || $side == 'right')) {
		if (isset($header_extras) && !empty($header_extras)){
			$n = 0;
			foreach ($header_extras as $key=>$value) {
				if($value == 1) {
					$n ++;
				}
			}
			if($n >= 4) {
				$switch_number = 2;
			} else {
				$switch_number = 1;
			}
			if($side == 'left') {
				$header_extras = array_slice($header_extras, 0, $switch_number);
			} else {
				$header_extras = array_slice($header_extras, $switch_number);
			}
		}
	}
	// For vertical header lets see if cart is after search
	$outerclass = '';
	if($class == 'sf-vertical') {
		if (isset($header_extras) && !empty($header_extras)){
			$search_in_loop = 9;
			$i = 1;
			foreach ($header_extras as $key=>$value) {
				if($key == 'search' && $value == '1') {$search_in_loop = $i;}
				if($key == 'cart' && $value == '1') { 
					if($i == ($search_in_loop + 1)) {
						$outerclass = 'kt-search-and-cart';
					} else {
						$outerclass = '';
					} 
				}
				$i ++;
			}
		}
	}
	?>
	<div class="kt-header-extras clearfix">
		<ul class="sf-menu <?php echo esc_attr($class.' '.$outerclass);?>">
		<?php 
		 /* 
	    */
	    do_action('juanjimeneztj_before_header_extras');
	    if (isset($header_extras) && !empty($header_extras)):
			foreach ($header_extras as $key=>$value) {

				switch($key) {
					case 'search':
						if($value == '1') { ?>
				        	 <li class="menu-search-icon-kt">
								<a class="kt-menu-search-btn kt-pop-modal" data-mfp-src="#kt-extras-modal-search" href="<?php echo esc_url(home_url().'/?s='); ?>">
									<span class="kt-extras-label"><i class="kt-icon-search"></i></span>
								</a>
				        	</li>
							<?php 
						}
					break;
		    		case 'login' :
			    		if($value == '1') { 
							if (class_exists('woocommerce'))  {?>
					        	<li class="menu-account-icon-kt sf-dropdown">
					            	<?php if ( is_user_logged_in() ) { 
					            		if(isset($juanjimeneztj['tl_my_account']) && !empty($juanjimeneztj['tl_my_account'])) {
						                   	$title =  $juanjimeneztj['tl_my_account'];
						                }  else {
						                	$title = get_the_title(get_option('woocommerce_myaccount_page_id'));
						                }

						                ?>
							            <a class="menu-account-btn" href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">
							                <span class=" kt-extras-label"><span><?php echo esc_html($title);?></span></span>
							            </a>
							            <ul id="kad-head-my-account-menu" class="sf-dropdown-menu kad-head-my-account-menu">
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
					                		<span class="kt-extras-label"><span><?php echo esc_html($title);?></span></span>
					            		</a>

					              	<?php  } ?>
					        	</li>
					        <?php
					    	}
						}
					break;
					case 'cart':
						if($value == '1') { 
							if (class_exists('woocommerce'))  {  ?>
						        	<li class="menu-cart-icon-kt sf-dropdown">
						        		<a class="menu-cart-btn" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
						          			<span class="kt-extras-label">
							          			<?php if(isset($juanjimeneztj['header_extras_cart']) && !empty($juanjimeneztj['header_extras_cart'])) { 
							          				if(isset($juanjimeneztj['tl_cart']) && !empty($juanjimeneztj['tl_cart'])) {
									                   	$title =  $juanjimeneztj['tl_cart'];
									                } else {
									                	$title =  __('Cart', 'juanjimeneztj');
									                }?>
							          				<span class="cart-extras-title"><?php echo esc_html($title);?></span>
							          			<?php } ?>
							          			<i class="kt-icon-shopping-bag"></i><span class="kt-cart-total"><?php echo $woocommerce->cart->get_cart_contents_count(); ?></span>
						          			</span>
						        		</a>
						        		<ul id="kad-head-cart-popup" class="sf-dropdown-menu kad-head-cart-popup">
						            		<li class="kt-mini-cart-refreash">
						            			<?php woocommerce_mini_cart(); 
						            				do_action( 'juanjimeneztj_cart_menu_popup_after' ); ?>
						            		</li>
						          		</ul>
						        	</li>
						        <?php
						    }
						}
					break;
					case 'widget':
						if($value == '1') { 
							if (is_active_sidebar('header_extras_widget') ) { ?> 
							<li class="menu-widget-area-kt">
								<?php dynamic_sidebar('header_extras_widget'); ?>
							</li> 
		        			<?php }
						}
					break;
				}
			}
		endif;
	    /* 
	    */
	    do_action('juanjimeneztj_after_header_extras');
	    ?>
	    </ul>
	</div>
    <?php 
}
add_action('juanjimeneztj_after_above_header', 'juanjimeneztj_secondary_menu_area', 20);
add_action('juanjimeneztj_after_vertical_header', 'juanjimeneztj_secondary_menu_area', 20);
function juanjimeneztj_secondary_menu_area() {
		if (has_nav_menu('secondary_navigation')) : 
			$juanjimeneztj = juanjimeneztj_get_options();
			$data_second_sticky = "none";
			if(isset($juanjimeneztj['site_layout']) && $juanjimeneztj['site_layout'] != 'above') { 
				if(isset($juanjimeneztj['second_sticky']) && $juanjimeneztj['second_sticky'] == '1') {
					$data_second_sticky = "second";
				}
			} 
			?>
			<div class="outside-second">	
			<div class="second-navclass" data-sticky="<?php echo esc_attr($data_second_sticky);?>">
				<div class="second-nav-container container">
			        <nav class="nav-second clearfix">
			            <?php wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'sf-menu sf-menu-normal'));  ?>
			        </nav>
			    </div>
			</div>
			</div>
	        <?php 
        endif; 
}	