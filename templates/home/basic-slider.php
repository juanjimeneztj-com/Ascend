<?php  
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
    $juanjimeneztj = juanjimeneztj_get_options();

        if(isset($juanjimeneztj['slider_size'])) {
        	$slideheight = $juanjimeneztj['slider_size'];
        } else { 
        	$slideheight = 400; 
        }
        if(isset($juanjimeneztj['slider_size_width'])) {
        	$slidewidth = $juanjimeneztj['slider_size_width'];
        } else { 
        	$slidewidth = 1140; 
        }
        if(isset($juanjimeneztj['slider_captions']) && $juanjimeneztj['slider_captions'] == 1) {
         	$captions = 'true'; 
     	} else {
     		$captions = 'false';
     	}
        if(isset($juanjimeneztj['home_basic_slider'])) {
        	$slides = $juanjimeneztj['home_basic_slider'];
		} else {
			$slides = '';
		}
        if(isset($juanjimeneztj['home_basic_slider_type'])) {
        	$type = $juanjimeneztj['home_basic_slider_type'];
        } else {
        	$type = 'latest-posts';
        }
        if(isset($juanjimeneztj['trans_type']) && $juanjimeneztj['trans_type'] == 'false') {
        	$transtype = 'false';
        } else {
        	$transtype = 'true';
        }
        if(isset($juanjimeneztj['slider_transtime'])) {
        	$transtime = $juanjimeneztj['slider_transtime'];
        } else {
        	$transtime = '400';
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
    	if(isset($juanjimeneztj['home_page_title_align']) && !empty($juanjimeneztj['home_page_title_align'])) {
			$talign = $juanjimeneztj['home_page_title_align'];
		} else {
			$talign = 'center';
		}
    	if(!empty($juanjimeneztj['home_page_title_max_size'])) {
			$title_data = $juanjimeneztj['home_page_title_max_size'];
		} else {
			if(isset($juanjimeneztj['single_header_title_size'])){
				$title_data = $juanjimeneztj['single_header_title_size'];
			} else {
				$title_data = '70';
			}
		}
		if(!empty($juanjimeneztj['home_page_title_min_size'])) {
			$title_small_data = $juanjimeneztj['home_page_title_min_size'];
		} else {
			if(isset($juanjimeneztj['single_header_title_size_small'])){
				$title_small_data = $juanjimeneztj['single_header_title_size_small'];
			} else {
				$title_small_data = '30';
			}
		}
		if(!empty($juanjimeneztj['home_page_subtitle_max_size'])) {
			$subtitle_data = $juanjimeneztj['home_page_subtitle_max_size'];
		} else {
			if(isset($juanjimeneztj['single_header_subtitle_size'])){
				$subtitle_data = $juanjimeneztj['single_header_subtitle_size'];
			} else {
				$subtitle_data = '40';
			}
		}
		if(!empty($juanjimeneztj['home_page_subtitle_min_size'])) {
			$subtitle_small_data = $juanjimeneztj['home_page_subtitle_min_size'];
		} else {
			if(isset($juanjimeneztj['single_header_subtitle_size_small'])){
				$subtitle_small_data = $juanjimeneztj['single_header_subtitle_size_small'];
			} else {
				$subtitle_small_data = '20';
			}
		}
		$class = 'kt-h-basic-'.esc_attr($type);
		$id = 'kt_slider_home';
        ?>
<div class="sliderclass kt_desktop_slider home-sliderclass home-basic-slider clearfix">
	<?php if($type == 'latest-posts' ) {
			echo '<div id="imageslider" class="container">';
			$args = array(
				'orderby' 			=> 'date',
				'order' 			=> 'DESC',
				'post_type' 		=> 'post',
				'post_status' 		=> 'publish',
				'posts_per_page' 	=> '5',
			);
			$stype = 'slider';
			echo '<div id="'.esc_attr($id).'" class="slick-slider kad-light-gallery kt-slickslider titleclass loading '.esc_attr($class).'" data-slider-speed="'.esc_attr($pausetime).'" data-slider-anim-speed="'.esc_attr($transtime).'" data-slider-fade="'.esc_attr($transtype).'" data-slider-type="'.esc_attr($stype).'" data-slider-auto="'.esc_attr($autoplay).'" data-slider-thumbid="#'.esc_attr($id).'-thumbs" data-slider-arrows="true" data-slider-thumbs-showing="'.esc_attr(ceil($slidewidth/80)).'" style="max-width:'.esc_attr($slidewidth).'px;">';
				  	$loop = new WP_Query($args);
					if (  $loop->have_posts() ) {
						while ( $loop->have_posts() ) : $loop->the_post(); 
							global $post;
                            $img = juanjimeneztj_get_image_array($slidewidth, $slideheight, true, null, null, null, true);
                            echo '<div class="kt-slick-slide">';
	                                echo '<a href="'.get_the_permalink().'" class="kt-slider-image-link">';
	                                echo '<div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">';
	                                echo '<img src="'.esc_url($img['src']).'" width="'.esc_attr($img['width']).'" height="'.esc_attr($img['height']).'" alt="'.esc_attr($img['alt']).'" itemprop="contentUrl" '.$img['srcset'].'/>';
	                                echo '<meta itemprop="url" content="'.esc_url($img['src']).'">';
	                                echo '<meta itemprop="width" content="'.esc_attr($img['width']).'px">';
	                                echo '<meta itemprop="height" content="'.esc_attr($img['height']).'>px">';
	                                echo '</div>';
	                                if ($captions == 'true') {
	                                	echo '<div class="basic-caption"><div class="flex-caption-case" style="text-align:'.esc_attr($talign).'">';
		                                	$terms = wp_get_post_terms( $post->ID, 'category' );
		                                	if ($terms) {
		                                		echo '<div class="captiontext subtitle" data-max-size="'.esc_attr($subtitle_data).'" data-min-size="'.esc_attr($subtitle_small_data).'">';
			                                		$cats = array();
			                                		foreach ($terms as $term) {
			                                			$cats[] = $term->name;
			                                		}
			                                		echo implode(' | ', $cats);
		                                		echo '</div>';
		                                	}
	                                    	echo '<div class="captiontitle entry-title h1class" data-max-size="'.esc_attr($title_data).'" data-min-size="'.esc_attr($title_small_data).'">'.get_the_title().'</div>'; 
	                                  	echo '</div></div>';
	                          		}
	                            	echo '</a>';
	                        echo '</div>';
	                   	endwhile; 
	                   	wp_reset_postdata();
	                	
	             	} else {
							echo '<div class="error-not-found">'.__('Sorry, no entries found.', 'juanjimeneztj').'</li>';
					} 
	        echo '</div>';
  		echo '</div><!--Container-->';
	} else if($type == 'fullwidth' ) {
		juanjimeneztj_build_slider_home_fullwidth($slides, $slidewidth, $slideheight, $class, $id, $type, $captions, $autoplay, $pausetime, 'true', $transtype, $transtime, $title_data, $title_small_data, $subtitle_data, $subtitle_small_data, $talign); 
	} else if($type == 'carousel') {
		juanjimeneztj_build_slider_home($slides, $slidewidth, $slideheight, $class, $id, $type, $captions, $autoplay, $pausetime, 'true', $transtype, $transtime, $title_data, $title_small_data, $subtitle_data, $subtitle_small_data, $talign); 
	} else {
  		echo '<div id="imageslider" class="container">';
  			juanjimeneztj_build_slider_home($slides, $slidewidth, $slideheight, $class, $id, $type, $captions, $autoplay, $pausetime, 'true', $transtype, $transtime, $title_data, $title_small_data, $subtitle_data, $subtitle_small_data, $talign); 
  		echo '</div><!--Container-->';
  	} ?>
</div><!--sliderclass-->