<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
  get_header(); 
    /**
    * @hooked juanjimeneztj_archive_title - 20
    */
     do_action('juanjimeneztj_archive_title_container');
    ?>
  
	<div id="content" class="container">
   		<div class="row">
	      	<div class="main <?php echo esc_attr(juanjimeneztj_main_class()); ?>" id="ktmain" role="main">
        	<?php 
	        if (!have_posts()) : ?>
		          <div class="alert">
		            <?php esc_html_e( 'Sorry, no results were found.', 'juanjimeneztj' ); ?>
		          </div>
	          <?php 
          		get_search_form(); 
        	endif;

	        while (have_posts()) : the_post(); 
	          get_template_part('templates/content', get_post_format()); 
	        endwhile; 

	       	/**
            * @hooked juanjimeneztj_pagination - 20
            */
            do_action('juanjimeneztj_pagination'); 
            ?>
        </div><!-- /.main -->
			<?php 
			/**
		    * Sidebar
		    */
			if (juanjimeneztj_display_sidebar()) : 
			      	get_sidebar();
		    endif; ?>
		</div><!-- /.row-->
	</div><!-- /.content -->
	<?php 

    get_footer(); 