<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 * Register sidebars and widgets
 */
function juanjimeneztj_sidebar_list() {
	global $juanjimeneztj; 
  	$all_sidebars= array(
		array('name'=>__('Primary Sidebar', 'juanjimeneztj'), 'id'=>'sidebar-primary')
		);
  	if(isset($juanjimeneztj['cust_sidebars'])) {
  		if (is_array($juanjimeneztj['cust_sidebars'])) {
	    	$i = 1;
	  		foreach($juanjimeneztj['cust_sidebars'] as $sidebar){
	    		if(empty($sidebar)) {$sidebar = 'sidebar'.$i;}
	    		$all_sidebars[]=array('name'=>$sidebar, 'id'=>'sidebar'.$i);
	    		$i++;
	  		}
	 	}
	}
  	return $all_sidebars;
}
function juanjimeneztj_register_sidebars(){
  	$sidebars = juanjimeneztj_sidebar_list();
  	if (function_exists('register_sidebar')){
    	foreach($sidebars as $side){
      		juanjimeneztj_register_sidebar($side['name'], $side['id']);    
    	}
  	}
}
function juanjimeneztj_register_sidebar($name, $id){
  	register_sidebar(array('name'=>$name,
    	'id' => $id,
    	'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
    	'after_widget' => '</div></section>',
    	'before_title' => '<h4 class="widget-title"><span>',
    	'after_title' => '</span></h4>',
  	));
}
add_action('widgets_init', 'juanjimeneztj_register_sidebars');

function juanjimeneztj_widgets_init() {
	global $juanjimeneztj; 
	// Header Widget area.
  	register_sidebar(array(
    	'name'          => __('Header Extras Widget Area', 'juanjimeneztj'),
    	'id'            => 'header_extras_widget',
	    'before_widget' => '<div id="%1$s" class="kt-above-lg-widget-area %2$s"><div class="widget-inner">',
	    'after_widget'  => '</div></div>',
	    'before_title'  => '<h4 class="header-widget-title"><span>',
	    'after_title'   => '</span></h4>',
  	));
  	register_sidebar(array(
    	'name'          => __('Topbar Widget Area', 'juanjimeneztj'),
    	'id'            => 'topbar_widget',
	    'before_widget' => '<div id="%1$s" class="kt-below-lg-widget-area %2$s"><div class="widget-inner">',
	    'after_widget'  => '</div></div>',
	    'before_title'  => '<span class="topbar-header-widget-title"><span>',
	    'after_title'   => '</span></span>',
  	));
    // Footer 
    register_sidebar(array(
        'name' => __('Footer Column 1', 'juanjimeneztj'),
        'id' => 'footer_1',
        'before_widget' => '<div class="footer-widget widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<div class="footer-widget-title"><span>',
        'after_title' => '</span></div>',
    ));
    register_sidebar(array(
        'name' => __('Footer Column 2', 'juanjimeneztj'),
        'id' => 'footer_2',
        'before_widget' => '<div class="footer-widget widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<div class="footer-widget-title"><span>',
        'after_title' => '</span></div>',
    ));
    if(isset($juanjimeneztj['footer_layout'])) {
        $footer_layout = $juanjimeneztj['footer_layout'];
    } else {
        $footer_layout = "fourc";
    }
    if ($footer_layout == "fourc" || $footer_layout == "four_single" || $footer_layout == "threec" || $footer_layout == "three_single") {
        register_sidebar(array(
            'name' => __('Footer Column 3', 'juanjimeneztj'),
            'id' => 'footer_3',
            'before_widget' => '<div class="footer-widget widget"><aside id="%1$s" class="%2$s">',
            'after_widget' => '</aside></div>',
            'before_title' => '<div class="footer-widget-title"><span>',
            'after_title' => '</span></div>',
        ));
    }
    if ($footer_layout == "fourc" || $footer_layout == "four_single") {
        register_sidebar(array(
            'name' => __('Footer Column 4', 'juanjimeneztj'),
            'id' => 'footer_4',
            'before_widget' => '<div class="footer-widget widget"><aside id="%1$s" class="%2$s">',
            'after_widget' => '</aside></div>',
            'before_title' => '<div class="footer-widget-title"><span>',
            'after_title' => '</span></div>',
        ));
    }

      // Widgets
    register_widget('juanjimeneztj_contact_widget');
    register_widget('juanjimeneztj_social_widget');
    register_widget('juanjimeneztj_recent_posts_widget');
    register_widget('juanjimeneztj_post_grid_widget');
    register_widget('juanjimeneztj_image_widget');
}
add_action('widgets_init', 'juanjimeneztj_widgets_init');

/**
 * Tag Cloud Adjustments
 */
function juanjimeneztj_widget_tag_cloud_args( $args ) {
    $args['largest'] = 13;
    $args['smallest'] = 13;
    $args['unit'] = 'px';
    return $args;
}
add_filter( 'widget_tag_cloud_args', 'juanjimeneztj_widget_tag_cloud_args' );
add_filter( 'woocommerce_product_tag_cloud_widget_args', 'juanjimeneztj_widget_tag_cloud_args' );
