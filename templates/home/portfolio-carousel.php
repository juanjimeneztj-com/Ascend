<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $juanjimeneztj_portfolio_loop;
$juanjimeneztj = juanjimeneztj_get_options();
	if(!empty($juanjimeneztj['home_portfolio_carousel_title'])) {
		$btitle = $juanjimeneztj['home_portfolio_carousel_title'];
	} else { 
		$btitle = '';
	}
	if(isset($juanjimeneztj['home_portfolio_carousel_show_type']) && $juanjimeneztj['home_portfolio_carousel_show_type'] == '0') {
		$portfolio_item_types = 'false';
	} else {
		$portfolio_item_types = 'true';
	}
	if(isset($juanjimeneztj['home_portfolio_carousel_order'])) {
		$portfolio_order = $juanjimeneztj['home_portfolio_carousel_order'];
	} else {
		$portfolio_order = 'menu_order';
	}
	if($portfolio_order == 'menu_order' || $portfolio_order == 'title') {
   		$p_order = 'ASC';
   	} else {
   		$p_order = 'DESC';
   	}
	if(isset($juanjimeneztj['home_portfolio_carousel_show_excerpt']) && $juanjimeneztj['home_portfolio_carousel_show_excerpt'] == '0') {
		$portfolio_excerpt = 'false';
	} else {
		$portfolio_excerpt = 'true';
	}
	if(isset($juanjimeneztj['home_portfolio_carousel_show_lightbox']) && $juanjimeneztj['home_portfolio_carousel_show_lightbox'] == '0') {
		$portfolio_lightbox = 'false';
	} else {
		$portfolio_lightbox = 'true';
	}
	if(isset($juanjimeneztj['home_portfolio_carousel_style']) ) {
		$portfolio_style = $juanjimeneztj['home_portfolio_carousel_style'];
	} else {
		$portfolio_style = 'pgrid';
	}
	if(isset($juanjimeneztj['home_portfolio_carousel_ratio']) ) {
		$portfolio_ratio = $juanjimeneztj['home_portfolio_carousel_ratio'];
	} else {
		$portfolio_ratio = 'square';
	}
	if(isset($juanjimeneztj['home_portfolio_carousel_column']) ) {
        $juanjimeneztj_grid_columns = $juanjimeneztj['home_portfolio_carousel_column'];
    } else {
        $juanjimeneztj_grid_columns = '4';
    }
    if(isset($juanjimeneztj['home_portfolio_carousel_count']) ) {
        $carousel_items = $juanjimeneztj['home_portfolio_carousel_count'];
    } else {
        $carousel_items = '8';
    }
    if(isset($juanjimeneztj['home_portfolio_carousel_speed']) ) {
        $carousel_speed = $juanjimeneztj['home_portfolio_carousel_speed'].'000';
    } else {
        $carousel_speed = '9000';
    }
    if(isset($juanjimeneztj['home_portfolio_carousel_scroll']) && $juanjimeneztj['home_portfolio_carousel_scroll'] == 'all' ) {
        $carousel_scroll = 'all';
    } else {
        $carousel_scroll = '1';
    }
    if(!empty($juanjimeneztj['home_portfolio_carousel_type'])) { 
		$portfolio_type = get_term_by ('id',$juanjimeneztj['home_portfolio_carousel_type'],'portfolio-type');
		$p_type_slug = $portfolio_type->slug;
	} else {
		$p_type_slug = '';
	}
	$bc = array();
    if ($juanjimeneztj_grid_columns == '4') {
        $bc = juanjimeneztj_carousel_columns('4');
    } else if($juanjimeneztj_grid_columns == '5') {
        $bc = juanjimeneztj_carousel_columns('5');
    } else if($juanjimeneztj_grid_columns == '6') {
        $bc = juanjimeneztj_carousel_columns('6');
    } else if($juanjimeneztj_grid_columns == '2') {
        $bc = juanjimeneztj_carousel_columns('2');
    } else {
        $bc = juanjimeneztj_carousel_columns('3');
    } 
    if($portfolio_style == 'pgrid-no-margin') {
    	$margins = 'row-nomargin';
    } else {
    	$margins = 'row-margin-small';
    }
    $bc = apply_filters('juanjimeneztj_home_portfolio_carousel_columns', $bc);
    $juanjimeneztj_portfolio_loop = array(
     	'lightbox' 		=> $portfolio_lightbox,
     	'showexcerpt' 	=> $portfolio_excerpt,
     	'showtypes' 	=> $portfolio_item_types,
     	'columns' 		=> $juanjimeneztj_grid_columns,
     	'ratio' 		=> $portfolio_ratio,
     	'style' 		=> $portfolio_style,
     	'carousel' 		=> 'true',
     	'tileheight' 	=> '0',
    );

    $args = array(
        'orderby' => $portfolio_order,
        'order' =>	$p_order,
        'post_type' => 'portfolio',
        'portfolio-type' => $p_type_slug,
        'posts_per_page'=> $carousel_items
    );
    
    echo '<div class="home-portfolio-carousel home-margin home-padding">';
		if(!empty($btitle)) {
		echo '<div class="clearfix">';
			echo '<h3 class="hometitle">';
				echo '<span>'.esc_html($btitle).'</span>';
			echo '</h3>';
		echo '</div>';
	}	
	 ?>

    <div class="portfolio-home-carousel">
		<div class="portfolio-carouselcontainer <?php echo esc_attr($margins);?>">
    		<div id="portfolio-home-carousel" class="slick-slider portfolio_carousel kt-slickslider kt-content-carousel loading clearfix" data-slider-fade="false" data-slider-type="content-carousel" data-slider-anim-speed="400" data-slider-scroll="<?php echo esc_attr($carousel_scroll);?>" data-slider-auto="true" data-slider-speed="<?php echo esc_attr($carousel_speed);?>" data-slider-xxl="<?php echo esc_attr($bc['xxl']);?>" data-slider-xl="<?php echo esc_attr($bc['xl']);?>" data-slider-md="<?php echo esc_attr($bc['md']);?>" data-slider-sm="<?php echo esc_attr($bc['sm']);?>" data-slider-xs="<?php echo esc_attr($bc['xs']);?>" data-slider-ss="<?php echo esc_attr($bc['ss']);?>">
            <?php
			  	$loop = new WP_Query(array(
			  		'orderby' => $portfolio_order,
			        'order' =>	$p_order,
			        'post_type' => 'portfolio',
			        'portfolio-type' => $p_type_slug,
			        'posts_per_page'=> $carousel_items
			        ));
				if ( $loop ) :
				 	while ( $loop->have_posts() ) : $loop->the_post();
                    get_template_part('templates/content', 'loop-portfolio');  
				
                endwhile; else: ?>
				    <div class="error-not-found"><?php _e('Sorry, no portfolio entries found.', 'juanjimeneztj');?></div>

				<?php endif; 
				wp_reset_postdata(); ?>								
			</div>
        </div>
    </div>
</div><!-- portfolio-carousel Container-->		