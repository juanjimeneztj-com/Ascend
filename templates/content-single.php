<?php 
/* 
* Single Content 
*/
    global $post, $juanjimeneztj_feat_width, $juanjimeneztj_has_sidebar;

    if(juanjimeneztj_display_sidebar()) {
        $juanjimeneztj_feat_width = apply_filters('juanjimeneztj_blog_full_image_width_sidebar', juanjimeneztj_post_sidebar_image_width()); 
        $juanjimeneztj_has_sidebar = true;
    } else {
        $juanjimeneztj_feat_width = apply_filters('juanjimeneztj_blog_full_image_width', juanjimeneztj_post_image_width()); 
        $juanjimeneztj_has_sidebar = false;
    }
    $postclass = array('postclass');
    $juanjimeneztj_headcontent = juanjimeneztj_get_post_head_content();
    if($juanjimeneztj_headcontent != 'none'){
        $postclass[] = 'kt_post_header_content-'.$juanjimeneztj_headcontent;
    } else {
        $postclass[] = 'kt_no_post_header_content';
    }
	while (have_posts()) : the_post(); 
         
         do_action( 'juanjimeneztj_single_post_before' ); 

         ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class($postclass); ?> itemprop="mainEntity" itemscope itemtype="http://schema.org/BlogPosting">
            <?php
              /**
              * @hooked juanjimeneztj_single_post_headcontent - 10
              * @hooked juanjimeneztj_post_header_meta_categories - 20
              */
              do_action( 'juanjimeneztj_single_post_before_header' );
            ?>
                <header>
                    <?php 
                    /**
                    * @hooked juanjimeneztj_post_header_title - 20
                    * @hooked juanjimeneztj_single_post_meta_date_author - 30
                    */
                    do_action( 'juanjimeneztj_single_post_header' );
                    ?>
                </header>
                <div class="entry-content clearfix" itemprop="description articleBody">
                    <?php
                    do_action( 'juanjimeneztj_single_post_content_before' );
                    
                        the_content(); 
                  
                    do_action( 'juanjimeneztj_single_post_content_after' );
                    ?>
                </div>
                <footer class="single-footer">
                <?php 
                  /**
                  * @hooked juanjimeneztj_post_footer_pagination - 10
                  * @hooked juanjimeneztj_post_footer_tags - 20
                  * @hooked juanjimeneztj_post_footer_meta - 30
                  * @hooked juanjimeneztj_post_nav - 40
                  */
                  do_action( 'juanjimeneztj_single_post_footer' );
                  ?>
                </footer>
            </article>
            <?php
              /**
              * @hooked juanjimeneztj_post_authorbox - 20
              * @hooked juanjimeneztj_post_bottom_carousel - 30
              * @hooked juanjimeneztj_post_comments - 40
              */
              do_action( 'juanjimeneztj_single_post_after' );

            endwhile; 

	do_action( 'juanjimeneztj_single_post_end' ); 