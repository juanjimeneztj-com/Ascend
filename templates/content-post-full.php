 <?php 
 global $post, $juanjimeneztj_has_sidebar, $juanjimeneztj_feat_width;
 	$juanjimeneztj = juanjimeneztj_get_options();
    if($juanjimeneztj_has_sidebar){
        $juanjimeneztj_feat_width = apply_filters('juanjimeneztj_blog_full_image_width_sidebar', juanjimeneztj_post_sidebar_image_width()); 
    } else {
        $juanjimeneztj_feat_width = apply_filters('juanjimeneztj_blog_full_image_width', juanjimeneztj_post_image_width()); 
    }
    $postclass = array('postclass');
    $juanjimeneztj_headcontent = juanjimeneztj_get_post_head_content();
    if($juanjimeneztj_headcontent != 'none'){
        $postclass[] = 'kt_post_header_content-'.$juanjimeneztj_headcontent;
    } else {
        $postclass[] = 'kt_no_post_header_content';
    }
    $postclass[] = 'kad_blog_item';
    
    /**
    * @hooked juanjimeneztj_single_post_upper_headcontent - 10
    */
    do_action( 'juanjimeneztj_single_post_begin' ); 

    do_action( 'juanjimeneztj_single_post_before' ); 
    ?> 
    <article <?php post_class($postclass); ?> itemscope itemtype="http://schema.org/BlogPosting">
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
            * @hooked juanjimeneztj_post_full_loop_title - 20
            * @hooked juanjimeneztj_single_post_meta_date_author - 30
            */
            do_action( 'juanjimeneztj_single_loop_post_header' );
            ?>
        </header>
        <div class="entry-content clearfix" itemprop="articleBody">
        <?php 
            do_action( 'juanjimeneztj_single_post_content_before' );

            global $more; 
            if(!empty($juanjimeneztj['post_readmore_text'])) {
                $readmore = $juanjimeneztj['post_readmore_text'];
            } else { 
                $readmore =  __('Read More', 'juanjimeneztj') ;
            }
            the_content($readmore); 

            do_action( 'juanjimeneztj_single_post_content_after' );
        ?>
        </div>
        <footer class="single-footer">
        <?php 
            /**
            * @hooked juanjimeneztj_post_footer_meta - 30
            */
            do_action( 'juanjimeneztj_single_loop_post_footer' );

            if ( comments_open() ) :
                echo '<p class="kad_comments_link">';
                  	comments_popup_link( 
	                    '<i class="kt-icon-comments-o"></i>'. __( 'Leave a Reply', 'juanjimeneztj' ), 
	                    '<i class="kt-icon-comments-o"></i>'. __( '1 Comment', 'juanjimeneztj' ), 
	                   	'<i class="kt-icon-comments-o"></i>'. __( '% Comments', 'juanjimeneztj' ),
	                    'comments-link',
	                    '<i class="kt-icon-comments-o"></i>'. __( 'Comments are Closed', 'juanjimeneztj' )
                	);
                echo '</p>';
            endif;
        ?>
        </footer>
    </article>

