<?php
/**
* Single Template
*/
	/**
    * Header
    */
	get_header(); 

		/**
	    * @hooked asencd_single_post_header - 20
	    */
	    do_action('juanjimeneztj_post_header');

		/**
	    * @hooked juanjimeneztj_single_post_upper_headcontent - 10
	    */
	    do_action( 'juanjimeneztj_single_post_begin' ); 
	    ?>
		<div id="content" class="container clearfix">
    		<div class="row single-article">
    			<div class="main <?php echo esc_attr(juanjimeneztj_main_class()); ?>" id="ktmain" role="main">
			    	<?php 
					/**
				    * Content
				    */
					if (has_post_format( 'quote' )) {
						get_template_part('templates/content', 'single-quote'); 
					} else {
						get_template_part('templates/content', 'single'); 
					}
					?>
				</div><!-- /.main-->

				<?php
				/**
			    * Sidebar
			    */
				if (juanjimeneztj_display_sidebar()) : 
				      	get_sidebar();
			    endif; ?>
    		</div><!-- /.row-->
    	</div><!-- /#content -->
    	<?php 
    /**
    * Footer
    */
	get_footer(); ?>