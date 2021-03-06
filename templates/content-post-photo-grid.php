<?php 

global $post, $juanjimeneztj_has_sidebar, $juanjimeneztj_grid_columns, $juanjimeneztj_grid_carousel;
	$juanjimeneztj = juanjimeneztj_get_options();
    if($juanjimeneztj_has_sidebar) {
        if(!empty($juanjimeneztj_grid_columns)) {
            if($juanjimeneztj_grid_columns == '3') {
                $image_width = 420;
                $image_height = 280;
            } else if($juanjimeneztj_grid_columns == '2') {
                $image_width = 660;
                $image_height = 440;
            } else {
                $image_width = 360;
                $image_height = 240;
            }
        } else {
            $image_width = 360;
            $image_height = 240;
        }
    } else {
        if(!empty($juanjimeneztj_grid_columns)) {
            if($juanjimeneztj_grid_columns == '3') {
                $image_width = 480;
                $image_height = 320;

            } else if($juanjimeneztj_grid_columns == '2') {
                $image_width = 660;
                $image_height = 440;
            } else {
                $image_width = 360;
                $image_height = 240;
            }
        } else {
            $image_width = 360;
            $image_height = 240;
        }
    }

    $image_width = apply_filters('juanjimeneztj_post_grid_image_width', $image_width);
    $image_height = apply_filters('juanjimeneztj_post_grid_image_height', $image_height);
    if(isset($juanjimeneztj_grid_carousel) && $juanjimeneztj_grid_carousel != true) {
	    if(isset($juanjimeneztj['postexcerpt_hard_crop']) && $juanjimeneztj['postexcerpt_hard_crop'] == 1) {
	        $image_crop = true;
	    } else {
	        $image_height = null;
	        $image_crop = false;
	    }
	} else {
		$image_crop = true;
	}
    ?>
    <article id="post-<?php the_ID(); ?>" class="blog_item blog_photo_item kt_item_fade_in grid_item" itemscope itemtype="http://schema.org/CreativeWork">
        <div class="imghoverclass img-margin-center blog-grid-photo">
        <?php 
        $img = juanjimeneztj_get_image_array($image_width, $image_height, $image_crop, null, null, null, true);
        if( juanjimeneztj_lazy_load_filter() ) {
            $image_src_output = 'src="data:image/gif;base64,R0lGODdhAQABAPAAAP///wAAACwAAAAAAQABAEACAkQBADs=" data-lazy-src="'.esc_url($img['src']).'" '; 
        } else {
            $image_src_output = 'src="'.esc_url($img['src']).'"'; 
        }
        ?>
            <div class="kt-intrinsic" style="padding-bottom:<?php echo esc_attr(($img['height']/$img['width']) * 100);?>%;">
                <?php 
                echo '<div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">';
                    echo '<img '.$image_src_output.' width="'.esc_attr($img['width']).'" height="'.esc_attr($img['height']).'" '.$img['srcset'].' class="'.esc_attr($img['class']).'" itemprop="contentUrl" alt="'.esc_attr($img['alt']).'">';
                    echo '<meta itemprop="url" content="'.esc_url($img['src']).'">';
                    echo '<meta itemprop="width" content="'.esc_attr($img['width']).'px">';
                    echo '<meta itemprop="height" content="'.esc_attr($img['height']).'>px">';
                echo '</div>';
               ?>
            </div> 
        </div>
        <div class="photo-postcontent">
            <div class="photo-post-bg">
            </div>
            <div class="photo-postcontent-inner">
                <?php 
                /**
                *
                */
                do_action( 'juanjimeneztj_post_photo_grid_excerpt_before_header' );
                ?>
                <header>
                    <?php 
                    /**
                    * @hooked juanjimeneztj_post_grid_excerpt_header_title - 10
                    */
                    do_action( 'juanjimeneztj_post_photo_grid_excerpt_header' );
                    ?>
                </header>
                <div class="kt-post-photo-added-content">
                    <?php 
                    /**
                    * @hooked juanjimeneztj_post_header_meta_categories - 20
                    */
                    do_action( 'juanjimeneztj_post_photo_grid_excerpt_after_header' );
                    ?>
                </div>
            </div>
            <a href="<?php the_permalink() ?>" class="photo-post-link">
            </a>
        </div><!-- Text size -->
        <?php 
        /**
        * 
        */
        do_action( 'juanjimeneztj_post_grid_excerpt_after_footer' );
        ?>
    </article> <!-- Blog Item -->