<?php  
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
    $juanjimeneztj = juanjimeneztj_get_options();

        if(isset($juanjimeneztj['home_carousel_height'])) {
        	$slideheight = $juanjimeneztj['home_carousel_height'];
        } else { 
        	$slideheight = 400; 
        }
        $type = 'post';
        if(isset($juanjimeneztj['slider_transtime'])) {
        	$transtime = $juanjimeneztj['slider_transtime'];
        } else {
        	$transtime = '400';
        }
        if(isset($juanjimeneztj['home_post_carousel_items'])) {
        	$items = $juanjimeneztj['home_post_carousel_items'];
        } else {
        	$items = '8';
        }
        if(isset($juanjimeneztj['home_post_carousel_orderby'])) {
        	$orderby = $juanjimeneztj['home_post_carousel_orderby'];
        } else {
        	$orderby = 'date';
        }
        if(isset($juanjimeneztj['home_post_carousel_order'])) {
        	$order = $juanjimeneztj['home_post_carousel_order'];
        } else {
        	$order = 'DESC';
        }
        
    	if(isset($juanjimeneztj['home_post_carousel_post_cat'])) {
        	$cat = $juanjimeneztj['home_post_carousel_post_cat'];
        } else {
        	$cat = '';
        }
        if(isset($juanjimeneztj['slider_autoplay']) && $juanjimeneztj['slider_autoplay'] == "1" ) {
        	$autoplay ='true';
        } else {
        	$autoplay = 'false';
        }
        if(isset($juanjimeneztj['slider_pausetime'])) {
        	$pausetime = $juanjimeneztj['slider_pausetime'];
    	} else {
    		$pausetime = '7000';
    	}
		$class = 'kt-h-basic-carousel-'.esc_attr($type);
        ?>
<div class="sliderclass basic-post-carousel kt_desktop_slider home-sliderclass clearfix">
	<?php 
		juanjimeneztj_build_post_carousel(null, $slideheight, $class, $type, $cat, $items, $orderby, $order, null, $autoplay, $pausetime, 'true', $transtime); 
  	 ?>
</div><!--sliderclass-->