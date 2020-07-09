<?php 
/* 
 * Template Bottom Post Carousel
 */

global $post, $juanjimeneztj_has_sidebar, $juanjimeneztj_grid_columns, $juanjimeneztj_bottom_carousel, $juanjimeneztj_grid_carousel;
$juanjimeneztj = juanjimeneztj_get_options();
		if(isset($juanjimeneztj['post_carousel_columns']) ) {
            $juanjimeneztj_grid_columns = $juanjimeneztj['post_carousel_columns'];
        } else {
            $juanjimeneztj_grid_columns = '3';
        }
        if(juanjimeneztj_display_sidebar()) {
            $juanjimeneztj_has_sidebar = true;
        } else {
            $juanjimeneztj_has_sidebar = false;
        }
        $juanjimeneztj_grid_carousel = true;
        if($juanjimeneztj_bottom_carousel == 'similar') {
            $default_title = __('Similar Posts', 'juanjimeneztj');
            $categories = get_the_category($post->ID);
            if ($categories) {
                $category_ids = array();
                foreach($categories as $individual_category){
                    $category_ids[] = $individual_category->term_id;
                }
            }
            $args = array(
                    'orderby' => 'rand',
                    'category__in' => $category_ids,
                    'post__not_in' => array($post->ID),
                    'posts_per_page'=> 8
                    );
        } else {
            $default_title = __('Recent Posts', 'juanjimeneztj');
            $args = array(
                    'post__not_in'   => array($post->ID),
                    'posts_per_page' => 8
                    );
        }
        $bc = array();
        $itemsize = juanjimeneztj_get_post_grid_item_size($juanjimeneztj_grid_columns, $juanjimeneztj_has_sidebar);
        $bc = juanjimeneztj_carousel_columns($juanjimeneztj_grid_columns, $juanjimeneztj_has_sidebar);
        $bc = apply_filters('juanjimeneztj_bottom_post_carousel_columns', $bc);
        $title = apply_filters( 'juanjimeneztj_bottom_post_title', $default_title );

?>
<div id="blog_carousel_container" class="carousel_outerrim post-footer-section">
	<?php
        echo '<h4 class="kt-title bottom-carousel-title post-carousel-title"><span>'.esc_html($title).'</span></h4>'; ?>

    <div class="blog-bottom-carousel">
		<div class="blog-carouselcontainer row-margin-small">
    		<div id="blog-recent-carousel" class="slick-slider blog_carousel kt-slickslider kt-content-carousel loading clearfix" data-slider-fade="false" data-slider-type="content-carousel" data-slider-anim-speed="400" data-slider-scroll="1" data-slider-auto="true" data-slider-speed="9000" data-slider-xxl="<?php echo esc_attr($bc['xxl']);?>" data-slider-xl="<?php echo esc_attr($bc['xl']);?>" data-slider-md="<?php echo esc_attr($bc['md']);?>" data-slider-sm="<?php echo esc_attr($bc['sm']);?>" data-slider-xs="<?php echo esc_attr($bc['xs']);?>" data-slider-ss="<?php echo esc_attr($bc['ss']);?>">
            <?php
				$bpc = new WP_Query(apply_filters('juanjimeneztj_bottom_posts_carousel_args', $args));
				if ( $bpc ) : while ( $bpc->have_posts() ) : $bpc->the_post(); ?>
				    <div class="<?php echo esc_attr($itemsize);?> blog_carousel_item kt-slick-slide">
                    <?php get_template_part('templates/content', 'post-photo-grid'); ?>
                    </div>
				
                <?php endwhile; else: ?>
				    <div class="error-not-found"><?php _e('Sorry, no blog entries found.', 'juanjimeneztj');?></div>

				<?php endif; 
				wp_reset_postdata(); ?>								
			</div>
        </div>
    </div>
</div><!-- Blog Container-->				