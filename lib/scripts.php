<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
/**
 * Enqueue scripts and stylesheets
 */

function juanjimeneztj_scripts() {
    $juanjimeneztj = juanjimeneztj_get_options(); 

    wp_enqueue_style('juanjimeneztj_main', get_template_directory_uri() . '/assets/css/juanjimeneztj.css', false, juanjimeneztj_VERSION);
    if(class_exists('woocommerce')) {
    	wp_enqueue_style('juanjimeneztj_woo', get_template_directory_uri() . '/assets/css/juanjimeneztj_woo.css', false, juanjimeneztj_VERSION);
    }
    if(is_rtl()) {
        wp_enqueue_style('juanjimeneztj_rtl', get_template_directory_uri() . '/assets/css/rtl-min.css', false, juanjimeneztj_VERSION);
    }
    if (is_child_theme()) {
      	$child_theme = wp_get_theme();
      	$child_version = $child_theme->get( 'Version' );
        wp_enqueue_style('juanjimeneztj_child', get_stylesheet_uri(), false, $child_version);
    } 
  
  	if (is_single() && comments_open() && get_option('thread_comments')) {
    	wp_enqueue_script('comment-reply');
  	}
  	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/min/bootstrap-min.js', array( 'jquery'), juanjimeneztj_VERSION, true);
  	wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/min/slick-min.js', array( 'jquery'), juanjimeneztj_VERSION, true);
  	wp_enqueue_script('juanjimeneztj_plugins', get_template_directory_uri() . '/assets/js/min/juanjimeneztj-plugins-min.js', array( 'jquery', 'hoverIntent'), juanjimeneztj_VERSION, true);
  	wp_enqueue_script('juanjimeneztj_main', get_template_directory_uri() . '/assets/js/min/juanjimeneztj-main-min.js', array( 'jquery', 'hoverIntent', 'masonry'), juanjimeneztj_VERSION, true);

  	if(class_exists('woocommerce')) {
  		if(is_product()) {
       		wp_enqueue_script( 'juanjimeneztj-wc-add-to-cart-variation', get_template_directory_uri() . '/assets/js/min/kt-add-to-cart-variation-min.js' , array( 'jquery' ), juanjimeneztj_VERSION, true );
       	}
    	if(isset($juanjimeneztj['product_quantity_input']) && $juanjimeneztj['product_quantity_input'] == 1) {
        		wp_enqueue_script( 'wcqi-js', get_template_directory_uri() . '/assets/js/min/wc-quantity-increment-min.js' , array( 'jquery' ), juanjimeneztj_VERSION, true );
    	}
  	}
}
add_action('wp_enqueue_scripts', 'juanjimeneztj_scripts', 100);

/**
 * Handles JavaScript detection.
 */
function juanjimeneztj_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'juanjimeneztj_javascript_detection', 0 );

function juanjimeneztj_lightbox_text() {
  	$juanjimeneztj = juanjimeneztj_get_options();
  	if(!empty($juanjimeneztj['lightbox_of_text'])) {$of_text = $juanjimeneztj['lightbox_of_text'];} else {$of_text = __('of', 'juanjimeneztj');}
  	if(!empty($juanjimeneztj['lightbox_error_text'])) {$error_text = $juanjimeneztj['lightbox_error_text'];} else {$error_text = __('The image could not be loaded.', 'juanjimeneztj');}
  	echo  '<script type="text/javascript">var light_error = "'.esc_attr($error_text).'", light_of = "%curr% '.esc_attr($of_text).' %total%";</script>';
}
add_action('wp_head', 'juanjimeneztj_lightbox_text');

/**
 * Add Respond.js for IE8 support of media queries
 */
function juanjimeneztj_ie_support_scripts() {
    wp_enqueue_script( 'juanjimeneztj-html5shiv', get_template_directory_uri().'/assets/js/vendor/html5shiv.min.js' );
    wp_script_add_data( 'juanjimeneztj-html5shiv', 'conditional', 'lt IE 9' );
    wp_enqueue_script( 'juanjimeneztj-respond', get_template_directory_uri().'/assets/js/vendor/respond.min.js' );
    wp_script_add_data( 'juanjimeneztj-respond', 'conditional', 'lt IE 9' );

    wp_enqueue_style('juanjimeneztj_ie_fallback', get_template_directory_uri() . '/assets/css/ie_fallback.css', false, juanjimeneztj_VERSION);
 	wp_style_add_data( 'juanjimeneztj_ie_fallback', 'conditional', 'lt IE' );
    
}
add_action( 'wp_enqueue_scripts', 'juanjimeneztj_ie_support_scripts' );


