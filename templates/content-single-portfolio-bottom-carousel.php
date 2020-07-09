<?php  global $post, $juanjimeneztj_portfolio_loop;
		$juanjimeneztj = juanjimeneztj_get_options();
		$portfolio_carousel = get_post_meta( $post->ID, '_kad_portfolio_carousel', true ); 
		if (empty($portfolio_carousel) || $portfolio_carousel == 'default')  { 
			if(isset($juanjimeneztj['portfolio_bottom_carousel'])) {
				$juanjimeneztj_bottom_carousel = $juanjimeneztj['portfolio_bottom_carousel'];
			}
		} else if($portfolio_carousel != 'no'){
			$juanjimeneztj_bottom_carousel = $portfolio_carousel;
		}
		if(isset($juanjimeneztj['portfolio_type_under_title']) && $juanjimeneztj['portfolio_type_under_title'] == '0') {
			$portfolio_item_types = 'false';
		} else {
			$portfolio_item_types = 'true';
		}
		if(isset($juanjimeneztj['portfolio_tax_show_excerpt']) && $juanjimeneztj['portfolio_tax_show_excerpt'] == '0') {
			$portfolio_excerpt = 'false';
		} else {
			$portfolio_excerpt = 'true';
		}
		if(isset($juanjimeneztj['portfolio_tax_lightbox']) && $juanjimeneztj['portfolio_tax_lightbox'] == '0') {
			$portfolio_lightbox = 'false';
		} else {
			$portfolio_lightbox = 'true';
		}
		if(isset($juanjimeneztj['portfolio_tax_ratio']) ) {
			$portfolio_ratio = $juanjimeneztj['portfolio_tax_ratio'];
		} else {
			$portfolio_ratio = 'square';
		}
		if(isset($juanjimeneztj['portfolio_bottom_car_column']) ) {
            $juanjimeneztj_grid_columns = $juanjimeneztj['portfolio_bottom_car_column'];
        } else {
            $juanjimeneztj_grid_columns = '4';
        }
        if(isset($juanjimeneztj['portfolio_bottom_car_items']) ) {
            $carousel_items = $juanjimeneztj['portfolio_bottom_car_items'];
        } else {
            $carousel_items = '8';
        }
        if(isset($juanjimeneztj['portfolio_bottom_car_speed']) ) {
            $carousel_speed = $juanjimeneztj['portfolio_bottom_car_speed'].'000';
        } else {
            $carousel_speed = '9000';
        }
        if(isset($juanjimeneztj['portfolio_bottom_car_scroll']) && $juanjimeneztj['portfolio_bottom_car_scroll'] == 'all' ) {
            $carousel_scroll = 'all';
        } else {
            $carousel_scroll = '1';
        }
   		$style = 'pgrid';
   		$tileheight = '0';
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
        $bc = apply_filters('juanjimeneztj_bottom_portfolio_carousel_columns', $bc);
        $juanjimeneztj_portfolio_loop = array(
         	'lightbox' 		=> $portfolio_lightbox,
         	'showexcerpt' 	=> $portfolio_excerpt,
         	'showtypes' 	=> $portfolio_item_types,
         	'columns' 		=> $juanjimeneztj_grid_columns,
         	'ratio' 		=> $portfolio_ratio,
         	'style' 		=> $style,
         	'carousel' 		=> 'true',
         	'tileheight' 	=> $tileheight,
        );
        if($juanjimeneztj_bottom_carousel == 'related') {
            $default_title = __('Similar Projects', 'juanjimeneztj');
            $typeterms =  wp_get_post_terms( $post->ID, 'portfolio-type', array( 'orderby' => 'parent', 'order' => 'ASC' ));
			$typeterm = $typeterms[0]; 
			$bp_type_slug = $typeterm->slug; 
            $args = array(
                    'orderby' => 'rand',
                    'post_type' => 'portfolio',
                    'portfolio-type' => $bp_type_slug,
                    'post__not_in' => array($post->ID),
                    'posts_per_page'=> $carousel_items
                    );
        } else {
            $default_title = __('Recent Projects', 'juanjimeneztj');
            $args = array(
                    'post__not_in'   => array($post->ID),
                    'post_type' => 'portfolio',
                    'posts_per_page' => $carousel_items
                    );
        }
    ?>			
<div id="portfolio_carousel_container" class="carousel_outerrim portfolio-footer-section">
	<?php 
		$ctitle = get_post_meta( $post->ID, '_kad_portfolio_carousel_title', true ); 
        if(!empty($ctitle)) {
            $title = $ctitle;
        } else {
        	$title = apply_filters( 'juanjimeneztj_portfolio_bottom_carousel_title', $default_title );
        } 
        echo '<h4 class="kt-title bottom-carousel-title post-carousel-title"><span>'.esc_html($title).'</span></h4>'; ?>

    <div class="portfolio-bottom-carousel">
		<div class="portfolio-carouselcontainer row-margin-small">
    		<div id="portfolio-recent-carousel" class="slick-slider portfolio_carousel kt-slickslider kt-content-carousel loading clearfix" data-slider-fade="false" data-slider-type="content-carousel" data-slider-anim-speed="400" data-slider-scroll="<?php echo esc_attr($carousel_scroll);?>" data-slider-auto="true" data-slider-speed="<?php echo esc_attr($carousel_speed);?>" data-slider-xxl="<?php echo esc_attr($bc['xxl']);?>" data-slider-xl="<?php echo esc_attr($bc['xl']);?>" data-slider-md="<?php echo esc_attr($bc['md']);?>" data-slider-sm="<?php echo esc_attr($bc['sm']);?>" data-slider-xs="<?php echo esc_attr($bc['xs']);?>" data-slider-ss="<?php echo esc_attr($bc['ss']);?>">
            <?php
				$bpc = new WP_Query(apply_filters('juanjimeneztj_bottom_portfolio_carousel_args', $args));
				if ( $bpc ) : while ( $bpc->have_posts() ) : $bpc->the_post();
                    get_template_part('templates/content', 'loop-portfolio');  
				
                endwhile; else: ?>
				    <div class="error-not-found"><?php _e('Sorry, no portfolio entries found.', 'juanjimeneztj');?></div>

				<?php endif; 
				wp_reset_postdata(); ?>								
			</div>
        </div>
    </div>
</div><!-- portfolio-carousel Container-->	