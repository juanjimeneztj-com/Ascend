<?php 
/* 
* Attachment Content 
*/
	while (have_posts()) : the_post(); 
	
		do_action( 'juanjimeneztj_single_attachment_before' ); ?>
        
        <article <?php post_class(); ?>>
            <?php  
            /**
            * @hooked juanjimeneztj_single_attachment_image - 20
            */
            do_action( 'juanjimeneztj_single_attachment_before_header' ); ?>
    		<header>
	    		<?php  
	            /**
	            * @hooked juanjimeneztj_post_header_title - 20
	            * @hooked juanjimeneztj_single_post_meta_date_author - 30
	            */
	           	do_action( 'juanjimeneztj_single_attachment_header' ); ?>
    		</header>
    		<div class="entry-content clearfix" itemprop="description articleBody">
      			 <?php
                    do_action( 'juanjimeneztj_single_attachment_content_before' );
                    
                        the_content(); 
                  
                    do_action( 'juanjimeneztj_single_attachment_content_after' );
                ?>
    		</div>
   			<footer class="single-footer">
    			<?php  
	            /**
	            * @hooked juanjimeneztj_post_footer_pagination - 10
	            */
	            do_action( 'juanjimeneztj_single_attachment_footer' ); ?>
    		</footer>
  		</article>
  		<?php  
            /**
            * @hooked juanjimeneztj_post_comments - 40
            */
            do_action( 'juanjimeneztj_single_attachment_after' ); 

	endwhile; 
