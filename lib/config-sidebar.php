<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
/**
 * Config Sidebar
 */

function juanjimeneztj_sidebar_id() {
    if(is_front_page()) {
      	$juanjimeneztj = juanjimeneztj_get_options();
        if (!empty($juanjimeneztj['home_sidebar'])) {
          $sidebar = $juanjimeneztj['home_sidebar'];
        } else {
          $sidebar = 'sidebar-primary';
        } 
    } elseif( class_exists('woocommerce') and (is_shop())) {
    	$shopid = get_option( 'woocommerce_shop_page_id' );
    	$sidebar_name = get_post_meta( $shopid, '_kad_sidebar_choice', true );
    	if (empty($sidebar_name) || $sidebar_name == 'default') {
            $juanjimeneztj = juanjimeneztj_get_options();
            if(!empty($juanjimeneztj['shop_cat_sidebar'])) {
                $sidebar = $juanjimeneztj['shop_cat_sidebar'];
            } else {
                $sidebar = 'sidebar-primary';
            }
        } elseif(!empty($sidebar_name)){
            $sidebar = $sidebar_name;
        } else {
          $sidebar = 'sidebar-primary';
        } 
    } elseif( class_exists('woocommerce') and (is_product_category() || is_product_tag())) {
        $juanjimeneztj = juanjimeneztj_get_options();
        if (!empty($juanjimeneztj['shop_cat_sidebar'])) {
          $sidebar = $juanjimeneztj['shop_cat_sidebar'];
        } else {
          $sidebar = 'sidebar-primary';
        } 
    } elseif (class_exists('woocommerce') and is_product()) {
      global $post;
        $sidebar_name = get_post_meta( $post->ID, '_kad_sidebar_choice', true ); 
        if (empty($sidebar_name) || $sidebar_name == 'default') {
          $juanjimeneztj = juanjimeneztj_get_options();
          if(!empty($juanjimeneztj['product_sidebar_default'])) {
            $sidebar = $juanjimeneztj['product_sidebar_default'];
          } else {
            $sidebar = 'sidebar-primary';
          }
        } else if(!empty($sidebar_name)) {
          $sidebar = $sidebar_name;
        } else {
          $sidebar = 'sidebar-primary';
        }
    } elseif( is_page() ) {
        global $post;
        $sidebar_name = get_post_meta( $post->ID, '_kad_sidebar_choice', true ); 
        if (empty($sidebar_name) || 'default' == $sidebar_name) {
            $juanjimeneztj = juanjimeneztj_get_options();
            if(!empty($juanjimeneztj['page_sidebar_default'])) {
                $sidebar = $juanjimeneztj['page_sidebar_default'];
            } else {
                $sidebar = 'sidebar-primary';
            }
        } elseif(!empty($sidebar_name)){
            $sidebar = $sidebar_name;
        } else {
          $sidebar = 'sidebar-primary';
        } 
    } elseif( is_singular('post')) {
        global $post;
        $sidebar_name = get_post_meta( $post->ID, '_kad_sidebar_choice', true ); 
        if (empty($sidebar_name) || $sidebar_name == 'default') {
            $juanjimeneztj = juanjimeneztj_get_options();
            if(!empty($juanjimeneztj['blog_sidebar_default'])) {
                $sidebar = $juanjimeneztj['blog_sidebar_default'];
            } else {
                $sidebar = 'sidebar-primary';
            }
        } elseif(!empty($sidebar_name)){
            $sidebar = $sidebar_name;
        } else {
          $sidebar = 'sidebar-primary';
        } 
    } elseif( is_singular('portfolio') ) {
        global $post;
        $sidebar_name = get_post_meta( $post->ID, '_kad_sidebar_choice', true ); 
        if (empty($sidebar_name) || $sidebar_name == 'default') {
            $juanjimeneztj = juanjimeneztj_get_options();
            if(!empty($juanjimeneztj['portfolio_sidebar_default'])) {
                $sidebar = $juanjimeneztj['portfolio_sidebar_default'];
            } else {
                $sidebar = 'sidebar-primary';
            }
        } elseif(!empty($sidebar_name)){
            $sidebar = $sidebar_name;
        } else {
          $sidebar = 'sidebar-primary';
        } 
    } elseif(is_tax('portfolio-type') || is_tax('portfolio-tag') ) {
        $juanjimeneztj = juanjimeneztj_get_options();
        if(!empty($juanjimeneztj['portfolio_sidebar_default'])) {
            $sidebar = $juanjimeneztj['portfolio_sidebar_default'];
        } else {
            $sidebar = 'sidebar-primary';
        }
    } elseif( is_singular('staff') || is_tax('staff-group')) {
        global $post;
        $sidebar_name = get_post_meta( $post->ID, '_kad_sidebar_choice', true ); 
        if (empty($sidebar_name) || $sidebar_name == 'default') {
            $juanjimeneztj = juanjimeneztj_get_options();
            if(!empty($juanjimeneztj['staff_sidebar_default_sidebar'])) {
                $sidebar = $juanjimeneztj['staff_sidebar_default_sidebar'];
            } else {
                $sidebar = 'sidebar-primary';
            }
        } elseif(!empty($sidebar_name)){
            $sidebar = $sidebar_name;
        } else {
          $sidebar = 'sidebar-primary';
        } 
    } elseif( is_singular('testimonial') || is_tax('testimonial-group')) {
        global $post;
        $sidebar_name = get_post_meta( $post->ID, '_kad_sidebar_choice', true ); 
        if (empty($sidebar_name) || $sidebar_name == 'default') {
            $juanjimeneztj = juanjimeneztj_get_options();
            if(!empty($juanjimeneztj['testimonial_sidebar_default'])) {
                $sidebar = $juanjimeneztj['testimonial_sidebar_default'];
            } else {
                $sidebar = 'sidebar-primary';
            }
        } elseif(!empty($sidebar_name)){
            $sidebar = $sidebar_name;
        } else {
          $sidebar = 'sidebar-primary';
        } 
    }elseif( is_singular()) {
        global $post;
        $sidebar_name = get_post_meta( $post->ID, '_kad_sidebar_choice', true ); 
        if (empty($sidebar_name) || $sidebar_name == 'default') {
            $sidebar = 'sidebar-primary';
        } elseif(!empty($sidebar_name)){
            $sidebar = $sidebar_name;
        } else {
          $sidebar = 'sidebar-primary';
        } 
    } elseif(is_category()) {
      $juanjimeneztj = juanjimeneztj_get_options(); 
        if(isset($juanjimeneztj['blog_cat_sidebar'])) {
          $sidebar = $juanjimeneztj['blog_cat_sidebar'];
        } else  {
          $sidebar = 'sidebar-primary';
        } 
    } elseif (is_archive()) {
      $juanjimeneztj = juanjimeneztj_get_options(); 
        if(isset($juanjimeneztj['blog_cat_sidebar'])) {
          $sidebar = $juanjimeneztj['blog_cat_sidebar'];
        } else  {
          $sidebar = 'sidebar-primary';
        } 
    } elseif (is_search()) {
      $juanjimeneztj = juanjimeneztj_get_options(); 
        if(isset($juanjimeneztj['search_sidebar_default'])) {
          $sidebar = $juanjimeneztj['search_sidebar_default'];
        } else  {
          $sidebar = 'sidebar-primary';
        } 
    } else {
      $sidebar = 'sidebar-primary';
    }

    return apply_filters('juanjimeneztj_sidebar_id', $sidebar);
}


function juanjimeneztj_main_class() {
  	if (juanjimeneztj_display_sidebar()) {
    	// Classes on pages with the sidebar
    	$side = juanjimeneztj_sidebar_side();
    	$class = 'col-lg-9 col-md-8 kt-sidebar kt-sidebar-'.$side;
  	} else {
    	// Classes on full width pages
    	$class = 'col-md-12 kt-nosidebar clearfix';
  	}

  	return $class;
}

function juanjimeneztj_sidebar_side() {
	$juanjimeneztj = juanjimeneztj_get_options();
  	if( class_exists('woocommerce') && (is_shop() || is_product_category() || is_product_tag() ) ) {
        if(isset($juanjimeneztj['shop_cat_sidebar_side']) && $juanjimeneztj['shop_cat_sidebar_side'] == 'left') {
            $side = 'left';
        } else {
            $side = 'right';
        }
  	} else {
        if(isset($juanjimeneztj['sidebar_side']) && $juanjimeneztj['sidebar_side'] == 'left') {
            $side = 'left';
        } else {
            $side = 'right';
        }
  	}
  	return apply_filters('juanjimeneztj_sidebar_side', $side);
}

/**
 * .sidebar classes
 */
function juanjimeneztj_sidebar_class() {
  return 'col-lg-3 col-md-4 kt-sidebar-container';
}

/**
 * Define which pages shouldn't have the sidebar
 *
 */
function juanjimeneztj_display_sidebar() {
        $sidebar_config = new juanjimeneztj_Sidebar(
            array(
                'juanjimeneztj_sidebar_on_shop_page', // Shop Page
                'juanjimeneztj_sidebar_on_shop_cat_page', // Product Categories and Tags
                'juanjimeneztj_sidebar_on_product_post', // Product posts
                'juanjimeneztj_sidebar_page', // Pages
                'juanjimeneztj_sidebar_on_staff', // staff Posts
                'juanjimeneztj_sidebar_on_staff_archive', // staff Posts
                'juanjimeneztj_sidebar_on_event', // event Posts
                'juanjimeneztj_sidebar_on_testimonial', // testimonial Posts
                'juanjimeneztj_sidebar_on_testimonial_archive', // testimonial Posts
                'juanjimeneztj_sidebar_on_portfolio', // portfolio Posts
                'juanjimeneztj_sidebar_on_portfolio_archive', // portfolio Posts
                'juanjimeneztj_sidebar_on_post', // Blog Posts & Other post types
                'juanjimeneztj_sidebar_on_front_page', // Front Home Page
                'juanjimeneztj_sidebar_on_home_page', // Home Posts Page
                'juanjimeneztj_sidebar_on_search_page', //Search results
                'juanjimeneztj_sidebar_on_archive', //Post archives
                'is_404', // 404
                array(
                    'is_singular', array('attachment')
                ),
        )
      );

  return apply_filters('juanjimeneztj_display_sidebar', $sidebar_config->display);
}

function juanjimeneztj_sidebar_on_shop_page() {
    if( class_exists('woocommerce') ) {
    	if(is_shop() ) {
	        $shopid = get_option( 'woocommerce_shop_page_id' );
	        $postsidebar = get_post_meta($shopid, '_kad_post_sidebar', true );
	        if(isset($postsidebar) && $postsidebar == 'yes') {
	            return false;
	        } else if(isset($postsidebar) && $postsidebar == 'default' || empty($postsidebar) ) {
	            $juanjimeneztj = juanjimeneztj_get_options();
	            if(isset($juanjimeneztj['shop_cat_layout']) && $juanjimeneztj['shop_cat_layout'] == 'sidebar') {
	                return false;
	            } else {
	                return true;
	            }
	        } else {
	            return true;
	        }
	    }
    }
}
function juanjimeneztj_sidebar_on_shop_cat_page() {
    if(is_tax('product_cat') || is_tax('product_tag') )  {
        $juanjimeneztj = juanjimeneztj_get_options(); 
        if(isset($juanjimeneztj['shop_cat_layout']) && $juanjimeneztj['shop_cat_layout'] == 'sidebar') {
            return false;
        } else {
            return true;
        }
    }
}
function juanjimeneztj_sidebar_on_product_post() {
  if( is_singular('product')) {
        global $post;
        $postsidebar = get_post_meta( $post->ID, '_kad_post_sidebar', true );
        if(isset($postsidebar) && $postsidebar == 'yes') {
            return false;
        } else if (empty($postsidebar) || !isset($postsidebar) || $postsidebar == 'default'){
            $juanjimeneztj = juanjimeneztj_get_options(); 
            if(isset($juanjimeneztj['product_layout']) && $juanjimeneztj['product_layout'] == 'full') {
                return true;
            } else  {
            	return false;
            }
        } else {
            return true;
        }  
    }
}
function juanjimeneztj_sidebar_page() {
    if( is_page() && !is_front_page() && !is_home() ) {
    	if( class_exists('woocommerce') ) {
    	 	if(is_cart() || is_checkout() ) {
	    		global $post; 
	    		$postsidebar = get_post_meta( $post->ID, '_kad_post_sidebar', true );
	        	if(isset($postsidebar) && $postsidebar == 'yes') {
		            return false;
		        } else if(isset($postsidebar) && $postsidebar == 'default' || empty($postsidebar) ) {
		                return true;
		        } else {
		            return true;
		        }
		    } else {
		    	global $post; 
		        $postsidebar = get_post_meta( $post->ID, '_kad_post_sidebar', true );
		        if(isset($postsidebar) && $postsidebar == 'yes') {
		            return false;
		        } else if(isset($postsidebar) && $postsidebar == 'default' || empty($postsidebar) ) {
		            $juanjimeneztj = juanjimeneztj_get_options();
		            if(isset($juanjimeneztj['page_layout']) && $juanjimeneztj['page_layout'] == 'sidebar') {
		                return false;
		            } else {
		                return true;
		            }
		        } else {
		            return true;
		        }
		    }
	    } else {
	        global $post; 
	        $postsidebar = get_post_meta( $post->ID, '_kad_post_sidebar', true );
	        if(isset($postsidebar) && $postsidebar == 'yes') {
	            return false;
	        } else if(isset($postsidebar) && $postsidebar == 'default' || empty($postsidebar) ) {
	            $juanjimeneztj = juanjimeneztj_get_options();
	            if(isset($juanjimeneztj['page_layout']) && $juanjimeneztj['page_layout'] == 'sidebar') {
	                return false;
	            } else {
	                return true;
	            }
	        } else {
	            return true;
	        }
	    }
    }
}
function juanjimeneztj_sidebar_on_testimonial() {
    if(is_singular('testimonial') ) {
        global $post;
        $postsidebar = get_post_meta( $post->ID, '_kad_post_sidebar', true );
        if(isset($postsidebar) && $postsidebar == 'no') {
            return true;
        } else if(isset($postsidebar) && $postsidebar == 'default' || empty($postsidebar) ) {
            $juanjimeneztj = juanjimeneztj_get_options();
            if(isset($juanjimeneztj['testimonial_layout']) && $juanjimeneztj['testimonial_layout'] == 'full') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
function juanjimeneztj_sidebar_on_testimonial_archive() {
    if(is_tax('testimonial-group') ) {
        $juanjimeneztj = juanjimeneztj_get_options();
        if(isset($juanjimeneztj['testimonial_layout']) && $juanjimeneztj['testimonial_layout'] == 'full') {
            return true;
        } else {
            return false;
        }
    }
}
function juanjimeneztj_sidebar_on_event() {
    if(is_singular('tribe_events') ) {
        global $post;
        $postsidebar = get_post_meta( $post->ID, '_kad_post_sidebar', true );
        if(isset($postsidebar) && $postsidebar == 'no') {
            return true;
        } else if(isset($postsidebar) && $postsidebar == 'default' || empty($postsidebar) ) {
            $juanjimeneztj = juanjimeneztj_get_options();
            if(apply_filters('juanjimeneztj_event_sidebar_default', true) ) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
}
function juanjimeneztj_sidebar_on_staff() {
    if(is_singular('staff') ) {
        global $post;
        $postsidebar = get_post_meta( $post->ID, '_kad_post_sidebar', true );
        if(isset($postsidebar) && $postsidebar == 'no') {
            return true;
        } else if(isset($postsidebar) && $postsidebar == 'default' || empty($postsidebar) ) {
            $juanjimeneztj = juanjimeneztj_get_options();
            if(isset($juanjimeneztj['staff_layout']) && $juanjimeneztj['staff_layout'] == 'full') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
function juanjimeneztj_sidebar_on_staff_archive() {
    if(is_tax('staff-group') ) {
        $juanjimeneztj = juanjimeneztj_get_options();
        if(isset($juanjimeneztj['staff_layout']) && $juanjimeneztj['staff_layout'] == 'full') {
            return true;
        } else {
            return false;
        }
    }
}
function juanjimeneztj_sidebar_on_portfolio() {
    if(is_singular('portfolio') ) {
        global $post;
        $postsidebar = get_post_meta( $post->ID, '_kad_post_sidebar', true );
        if(isset($postsidebar) && $postsidebar == 'yes') {
            return false;
        } else if(isset($postsidebar) && 'default' == $postsidebar || empty($postsidebar) ) {
            $juanjimeneztj = juanjimeneztj_get_options();
            if(isset($juanjimeneztj['portfolio_layout']) && 'sidebar' == $juanjimeneztj['portfolio_layout']) {
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }
}
function juanjimeneztj_sidebar_on_portfolio_archive() {
    if(is_tax('portfolio-type') || is_tax('portfolio-tag') ) {
        $juanjimeneztj = juanjimeneztj_get_options();
        if(isset($juanjimeneztj['portfolio_layout']) && $juanjimeneztj['portfolio_layout'] == 'sidebar') {
            return false;
        } else {
            return true;
        }
    }
}
function juanjimeneztj_sidebar_on_post() {
    if(is_single() && !is_singular('staff') && !is_singular('portfolio') && !is_singular('product') && !is_singular('tribe_events') && !is_singular('testimonial') ) {
        global $post;
        $postsidebar = get_post_meta( $post->ID, '_kad_post_sidebar', true );
        if(isset($postsidebar) && $postsidebar == 'no') {
            return true;
        } else if(isset($postsidebar) && $postsidebar == 'default' || empty($postsidebar) ) {
            $juanjimeneztj = juanjimeneztj_get_options();
            if(isset($juanjimeneztj['blog_layout']) && $juanjimeneztj['blog_layout'] == 'full') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
function juanjimeneztj_sidebar_on_front_page() {
    if(is_front_page()) {
        $juanjimeneztj = juanjimeneztj_get_options(); 
        if(isset($juanjimeneztj['home_sidebar_layout']) && $juanjimeneztj['home_sidebar_layout'] == '1') {
            return false;
        } else {
            return true;
        }
    }
}
function juanjimeneztj_sidebar_on_home_page() {
    if(is_home() && !is_front_page()) {
        $homeid = get_option( 'page_for_posts' );
        $postsidebar = get_post_meta( $homeid, '_kad_post_sidebar', true );
        if(isset($postsidebar) && $postsidebar == 'no') {
            return true;
        } else if(isset($postsidebar) && $postsidebar == 'default' || empty($postsidebar) ) {
            $juanjimeneztj = juanjimeneztj_get_options(); 
            if(isset($juanjimeneztj['blog_cat_layout']) && $juanjimeneztj['blog_cat_layout'] == 'sidebar') {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
}
function juanjimeneztj_sidebar_on_search_page() {
    if(is_search()) {
        $juanjimeneztj = juanjimeneztj_get_options(); 
        if(isset($juanjimeneztj['search_layout']) && $juanjimeneztj['search_layout'] == 'full') {
            return true;
        } else {
            return false;
        }
    }
}
function juanjimeneztj_sidebar_on_archive() {
    if( class_exists('woocommerce') ) {
	    if( is_archive() && (!is_tax('portfolio-type') && !is_tax('portfolio-tag') && !is_tax('product_cat') && !is_tax('product_tag') && !is_tax('staff-group') && !is_tax('testimonial-group') && !is_shop() ) ) {
	        $juanjimeneztj = juanjimeneztj_get_options(); 
	        if(isset($juanjimeneztj['blog_cat_layout']) && $juanjimeneztj['blog_cat_layout'] == 'full') {
	            return true;
	        } else {
	            return false;
	        }
	    }
	} else {
		if(is_archive() && (!is_tax('portfolio-type') && !is_tax('portfolio-tag') && !is_tax('staff-group') && !is_tax('testimonial-group'))) {
	        $juanjimeneztj = juanjimeneztj_get_options(); 
	        if(isset($juanjimeneztj['blog_cat_layout']) && $juanjimeneztj['blog_cat_layout'] == 'full') {
	            return true;
	        } else {
	            return false;
	        }
	    }
	}
}


