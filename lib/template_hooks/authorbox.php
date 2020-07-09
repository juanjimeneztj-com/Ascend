<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if(!function_exists('juanjimeneztj_author_box')) {
    function juanjimeneztj_author_box() { ?>
    <div class="author-box post-footer-section">
    	<ul class="nav kt-tabs kt-sc-tabs">
      <li class="active"><a href="#about"><?php _e('About Author', 'juanjimeneztj'); ?></a></li>
      <li><a href="#latest"><?php _e('Latest Posts', 'juanjimeneztj'); ?></a></li>
    </ul>
     
    <div class="kt-tab-content postclass">
      <div class="tab-pane clearfix active" id="about">
      	<div class="author-profile vcard">
            <div class="kt_author_avatar">
    		  <?php echo get_avatar( get_the_author_meta('ID'), 80 ); ?>
              </div>
    		<h5 class="author-name"><?php the_author_posts_link(); ?></h5>
            <?php if ( get_the_author_meta( 'occupation' ) ) { ?>
            <p class="author-occupation"><strong><?php the_author_meta( 'occupation' ); ?></strong></p>
            <?php } ?>
    		<p class="author-description author-bio">
    			<?php the_author_meta( 'description' ); ?>
    		</p>
            <div class="author-follow kadence_social_widget">
                <?php if ( get_the_author_meta( 'facebook' ) ) { ?>
                        <a href="<?php echo esc_url(get_the_author_meta( 'facebook' )); ?>" class="facebook_link" target="_blank" title="<?php echo esc_attr(__('Follow', 'juanjimeneztj').' '.get_the_author_meta( 'display_name' ).' '.__('on Facebook', 'juanjimeneztj'));?>"><i class="kt-icon-facebook"></i></a>
                <?php } 
                if ( get_the_author_meta( 'twitter' ) ) { ?>
                        <a href="https://twitter.com/<?php esc_attr(the_author_meta( 'twitter' )); ?>" class="twitter_link target="_blank" title="<?php echo esc_attr(__('Follow', 'juanjimeneztj').' '.get_the_author_meta( 'display_name' ).' '.__('on Twitter', 'juanjimeneztj'));?>"><i class="kt-icon-twitter"></i></a>
                <?php } 
                if ( get_the_author_meta( 'google' ) ) { ?>
                        <a href="<?php echo esc_url(get_the_author_meta( 'google' )); ?>" class="googleplus_link" target="_blank" title="<?php echo esc_attr(__('Follow', 'juanjimeneztj').' '.get_the_author_meta( 'display_name' ).' '.__('on Google Plus', 'juanjimeneztj'));?>"><i class="kt-icon-google-plus"></i></a>
                <?php } 
                if ( get_the_author_meta( 'youtube' ) ) { ?>
                        <a href="<?php echo esc_url(get_the_author_meta( 'youtube' )); ?>" target="_blank" class="youtube_link" title="<?php echo esc_attr(__('Follow', 'juanjimeneztj').' '.get_the_author_meta( 'display_name' ).' '.__('on YouTube', 'juanjimeneztj'));?>"><i class="kt-icon-youtube"></i></a>
                <?php }
                if ( get_the_author_meta( 'flickr' ) ) { ?>
                        <a href="<?php echo esc_url(get_the_author_meta( 'flickr' )); ?>"  class="flickr_link" target="_blank" title="<?php echo esc_attr(__('Follow', 'juanjimeneztj').' '.get_the_author_meta( 'display_name' ).' '.__('on Flickr', 'juanjimeneztj'));?>"><i class="kt-icon-flickr"></i></a>
                <?php } 
                if ( get_the_author_meta( 'vimeo' ) ) { ?>
                        <a href="<?php echo esc_url(get_the_author_meta( 'vimeo' )); ?>" class="vimeo_link" target="_blank" title="<?php echo esc_attr(__('Follow', 'juanjimeneztj').' '.get_the_author_meta( 'display_name' ).' '.__('on Vimeo', 'juanjimeneztj'));?>"><i class="kt-icon-vimeo"></i></a>
                <?php } 
                if ( get_the_author_meta( 'linkedin' ) ) { ?>
                        <a href="<?php echo esc_url(get_the_author_meta( 'linkedin' )); ?>" class="linkedin_link" target="_blank" title="<?php echo esc_attr(__('Follow', 'juanjimeneztj').' '.get_the_author_meta( 'display_name' ).' '.__('on linkedin', 'juanjimeneztj'));?>"><i class="kt-icon-linkedin"></i></a>
                <?php } 
                if ( get_the_author_meta( 'dribbble' ) ) { ?>
                        <a href="<?php echo esc_url(get_the_author_meta( 'dribbble' )); ?>" class="dribbble_link" target="_blank" title="<?php echo esc_attr(__('Follow', 'juanjimeneztj').' '.get_the_author_meta( 'display_name' ).' '.__('on Dribbble', 'juanjimeneztj'));?>"><i class="kt-icon-dribbble"></i></a>
              	<?php } 
              	if ( get_the_author_meta( 'pinterest' ) ) { ?>
                        <a href="<?php echo esc_url(get_the_author_meta( 'pinterest' )); ?>" class="pinterest_link" target="_blank" title="<?php echo esc_attr(__('Follow', 'juanjimeneztj').' '.get_the_author_meta( 'display_name' ).' '.__('on Pinterest', 'juanjimeneztj'));?>"><i class="kt-icon-pinterest"></i></a>
              	<?php }
              	if ( get_the_author_meta( 'instagram' ) ) { ?>
                		<a href="<?php echo esc_url(get_the_author_meta( 'instagram' )); ?>" class="instagram_link" target="_blank" title="<?php echo esc_attr(__('Follow', 'juanjimeneztj').' '.get_the_author_meta( 'display_name' ).' '.__('on Instagram', 'juanjimeneztj'));?>"><i class="kt-icon-instagram"></i></a>
                <?php } ?>
            </div><!--Author Follow-->
            </div>
       </div><!--pane-->
      <div class="tab-pane clearfix" id="latest">
        <div class="author-latestposts author-profile">
            <div class="kt_author_avatar">
                <?php echo get_avatar( get_the_author_meta('ID'), 80 ); ?>
            </div>
            <h5><?php _e('Latest posts from', 'juanjimeneztj'); ?> <?php the_author_posts_link(); ?></h5>
      			<ul>
    			<?php
                    global $authordata, $post;
                    $loop = new WP_Query(array('author' => $authordata->ID,'posts_per_page'	=> 3));
                    if ( $loop ) : 
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink();?>"><?php the_title(); ?></a><span class="recentpost-date"> - <?php echo get_the_time(get_option( 'date_format' )); ?></span></li>
                        <?php endwhile; 
                         wp_reset_postdata();
                    endif;  ?>
    			</ul>
    	       </div><!--Latest Post -->
            </div><!--Latest pane -->
        </div><!--Tab content -->
    </div><!--Author Box -->
    <?php } 
}

