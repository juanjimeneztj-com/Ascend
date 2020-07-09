<?php 
/*
* Page Template
*/

    get_header(); 

    /**
    * @hooked juanjimeneztj_page_title - 20
    */
     do_action('juanjimeneztj_page_title_container');
    ?>
    <div id="content" class="container <?php echo esc_attr( juanjimeneztj_container_class() ); ?>">
   		<div class="row">
	      	<div class="main <?php echo esc_attr(juanjimeneztj_main_class()); ?>" id="ktmain" role="main">
                <?php 
                /**
                * @hooked juanjimeneztj_page_content_wrap_before - 10
                * @hooked juanjimeneztj_page_content - 20
                * @hooked juanjimeneztj_page_content_wrap_after - 30
                */
                do_action('juanjimeneztj_page_content');
                ?>
				<?php 
                /**
                * @hooked juanjimeneztj_page_comments - 20
                */
                do_action('juanjimeneztj_page_footer');
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