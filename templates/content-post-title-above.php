<?php
/*
* Post loop contnet
*
*
*/
global $post, $juanjimeneztj_has_sidebar, $juanjimeneztj_feat_width;
	$juanjimeneztj = juanjimeneztj_get_options();
    if (has_post_format( 'quote' )) { ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('kad_blog_item clearfix'); ?> itemscope itemtype="http://schema.org/CreativeWork">
              <div class="postcontent">
               <?php if (has_post_thumbnail( $post->ID ) ) { 
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                    $style = 'background-image: url('.esc_url($image[0]).');'; 
                    $quote_class = 'kt-image-quote'; ?>
                    <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                        <meta itemprop="url" content="<?php echo esc_url($image[0]); ?>">
                        <meta itemprop="width" content="<?php echo esc_attr($image[1])?>">
                        <meta itemprop="height" content="<?php echo esc_attr($image[2])?>">
                    </div>
                   <?php 
                } else {
                    $quote_class = 'kt-text-quote';
                    $style = '';
                } ?>
                <div class="entry-content kt-quote-post-outer <?php echo esc_attr($quote_class);?> clearfix" itemprop="description" style="<?php echo esc_attr($style);?>" >
                    <div class="kt-quote-post">
                        <?php 
                             do_action( 'juanjimeneztj_post_excerpt_content_before' );

                             the_content();

                             do_action( 'juanjimeneztj_post_excerpt_content_after' );
                        ?>
                   </div>
                   </div>
                    <?php $author = get_post_meta( $post->ID, '_kad_quote_author', true ); 
		                if(!empty($author)) {
		                    echo '<div class="kt-quote-post-author">';
		                    echo '<p>- '. esc_html($author).'</p>';
		                    echo '</div>';
		                }
		                ?>
              </div><!-- Text size -->
    	</article> <!-- Article -->
    <?php
    } else {

        if($juanjimeneztj_has_sidebar){
            $juanjimeneztj_feat_width = apply_filters('juanjimeneztj_blog_image_width_sidebar', juanjimeneztj_post_sidebar_image_width()); 
            $juanjimeneztj_portraittext = 'col-xxl-95 col-xl-9 col-md-8 col-sm-8 col-xs-7';
            $juanjimeneztj_portraitimg_size = 'col-xxl-25 col-xl-3 col-md-4 col-sm-4 col-xs-5 col-ss-4';
        } else {
            $juanjimeneztj_feat_width = apply_filters('juanjimeneztj_blog_image_width', juanjimeneztj_post_image_width()); 
            $juanjimeneztj_portraittext = 'col-xxl-95 col-xl-9 col-md-9 col-sm-8 col-xs-7';
            $juanjimeneztj_portraitimg_size = 'col-xxl-25 col-xl-3 col-md-3 col-sm-4 col-xs-5 col-ss-4';
        }

        if (has_post_format( 'gallery' )) {
            $swidth = get_post_meta( $post->ID, '_kad_gallery_posthead_width', true ); 
            $height = get_post_meta( $post->ID, '_kad_gallery_posthead_height', true );
            if (!empty($height)) {
                $slideheight = $height;
                $imageheight = $height;
            } else {
                $slideheight = 400;
                $imageheight = apply_filters('juanjimeneztj_single_post_image_height', 400); 
            }
            if (!empty($swidth)) {
                $slidewidth = $swidth;
            } else {
                $slidewidth = $juanjimeneztj_feat_width;
            } 
        } elseif (has_post_format( 'image' )) {
            $swidth = get_post_meta( $post->ID, '_kad_image_posthead_width', true );
            $height = get_post_meta( $post->ID, '_kad_image_posthead_height', true );
            if (!empty($height)) {
                $imageheight = $height;
            } else {
                $imageheight = apply_filters('juanjimeneztj_single_post_image_height', 400); 
            }
            if (!empty($swidth)) {
                $slidewidth = $swidth;
            } else {
                $slidewidth = $juanjimeneztj_feat_width;
            }
        } else {
            $imageheight = apply_filters('juanjimeneztj_single_post_image_height', 400);
            $slidewidth = $juanjimeneztj_feat_width;
        }
        // get post summary
        $postsummery = juanjimeneztj_get_postsummary();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('kad_blog_item clearfix'); ?> itemscope itemtype="http://schema.org/BlogPosting">
            <div class="row">
                <?php 
	          	/**
	            *
	            */
	            do_action( 'juanjimeneztj_post_excerpt_before_content' );
	            ?>

              	<div class="col-md-12 post-text-container postcontent">
                	<div class="post-text-inner">
	                   	<?php 
	                    /**
	                    * @hooked juanjimeneztj_post_header_meta_categories - 20
	                    */
	                    do_action( 'juanjimeneztj_post_excerpt_before_header' );
	                    ?>
	                   	<header>
	                        <?php 
	                        /**
	                        * @hooked juanjimeneztj_post_excerpt_header_title - 10
	                        * @hooked juanjimeneztj_post_header_meta - 20
	                        */
	                        do_action( 'juanjimeneztj_post_excerpt_header' );
	                        ?>
	                   	</header>
	                   	<div class="row kt-media-below-title">
	                   	<?php 
			                if($postsummery == 'img_landscape') { 
			                   $textsize = 'col-md-12'; 
			                        ?>
			                        <div class="col-md-12 post-land-image-container">
			                              <div class="imghoverclass img-margin-center">
			                                <a href="<?php the_permalink();  ?>" title="<?php the_title_attribute(); ?>">
			                                    <?php echo juanjimeneztj_get_full_image_output($slidewidth, $imageheight, true, 'attachment-thumb wp-post-image kt-image-link', null, null, true); ?>
			                                </a> 
			                            </div>
			                        </div>
			                   <?php 
			              
			                } elseif($postsummery == 'img_portrait') { 

			                    $portraitwidth = apply_filters('juanjimeneztj_post_excerpt_image_width_portrait', 270);
			                    $portraitheight = apply_filters('juanjimeneztj_post_excerpt_image_height_portrait', 310);
			                    $textsize = $juanjimeneztj_portraittext;
			                    ?>
			                    <div class="<?php echo esc_attr($juanjimeneztj_portraitimg_size);?> post-image-container">
			                        <div class="imghoverclass img-margin-center">
			                            <a href="<?php the_permalink();  ?>" title="<?php the_title_attribute(); ?>">
			                                <?php echo juanjimeneztj_get_full_image_output($portraitwidth, $portraitheight, true, 'attachment-thumb wp-post-image kt-image-link', null, null, true); ?>
			                            </a> 
			                        </div>
			                    </div>
			                   <?php 

			                } elseif($postsummery == 'gallery_grid') { 

			                    $textsize = 'col-md-12'; ?>
			                    <div class="col-md-12 post-photo-grid-container">
			                    <?php juanjimeneztj_build_image_collage($post->ID, 'post', $juanjimeneztj_has_sidebar); ?>
			                    </div>    
			                    <?php

			                } elseif($postsummery == 'slider_landscape') {

			                    $textsize = 'col-md-12'; 
			                    echo '<div class="col-md-12 post-land-image-container">';
			                        $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
			                        juanjimeneztj_build_slider($post->ID, $image_gallery, $slidewidth, $slideheight, 'post', 'kt-slider-same-image-ratio');
			                    echo '</div>';

			              	} elseif($postsummery == 'slider_portrait') { 

			                    $textsize = $juanjimeneztj_portraittext; 
			                    $portraitwidth = apply_filters('juanjimeneztj_post_excerpt_image_width_portrait', 270);
			                    $portraitheight = apply_filters('juanjimeneztj_post_excerpt_image_height_portrait', 310); 

			                    echo '<div class="'.esc_attr($juanjimeneztj_portraitimg_size).' post-image-container">';
			                        $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
			                        juanjimeneztj_build_slider($post->ID, $image_gallery, $portraitwidth, $portraitheight, 'post', 'kt-slider-same-image-ratio');
			                    echo '</div>';                 

			              	} elseif($postsummery == 'video') {
			                   $textsize = 'col-md-12'; ?>
			                   <div class="col-md-12 post-land-image-container">
			                             <?php 
			                                get_template_part('templates/post', 'video-output');
			                             ?>
			                   </div>
			                   <?php 

			              	} else { 
			                   $textsize = 'col-md-12 kttextpost'; 
			              	}		
	              			?>
              			<div class="<?php echo esc_attr($textsize);?> kt-media-below-text-content">
		                   	<div class="entry-content" itemprop="articleBody">
		                        <?php 
		                             do_action( 'juanjimeneztj_post_excerpt_content_before' );

		                             the_excerpt();

		                             do_action( 'juanjimeneztj_post_excerpt_content_after' );
		                        ?>
		                   	</div>
		                   	<footer>
		                        <?php 
		                        /**
		                        *
		                        */
		                        do_action( 'juanjimeneztj_post_excerpt_footer' );
		                        ?>
		                   	</footer>
	                   	</div>
	                   	</div>
	                   	<?php 
	                   	/**
	                   	* 
	                   	*/
	                   	do_action( 'juanjimeneztj_post_excerpt_after_footer' );
	                   	?>
	                </div><!-- Inner -->
              	</div><!-- Text size -->
         	</div><!-- row-->
    	</article> <!-- Article -->
    <?php }