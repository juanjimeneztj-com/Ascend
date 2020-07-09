<?php 
/*
* 404
*/

	get_header(); 
	
	/**
    * @hooked juanjimeneztj_page_title - 20
    */
	do_action('juanjimeneztj_page_title_container');
	?>
	<div id="content" class="container">
		<div class="row">
			<div class="main <?php echo esc_attr( juanjimeneztj_main_class() ); ?>" id="ktmain" role="main">
				<div class="kt-404-alert entry-content">
					<h3><?php esc_html_e( 'Sorry, but the page you were trying to view does not exist.', 'juanjimeneztj' ); ?></h2>

					<p><?php esc_html_e( 'It looks like this was the result of either a mistyped address or an out-of-date link', 'juanjimeneztj' ); ?></p>
					<?php get_search_form(); ?>
				</div>
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
	/**
    * Footer
    */
	get_footer(); ?>
