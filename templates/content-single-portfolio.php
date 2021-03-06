<?php 
do_action('juanjimeneztj_portfolio_content_before'); 
	while (have_posts()) : the_post(); 
	global $post; 
		$juanjimeneztj = juanjimeneztj_get_options();
		$layout = juanjimeneztj_portfolio_single_layout();
		if($layout == 'above' || $layout == 'three' )  {
			$projectclass 	= 'col-md-12';
			$contentclass 	= 'col-md-12';
		} elseif ($layout == 'besidesmall')  {
			$projectclass 	= 'col-md-8';
			$contentclass 	= 'col-md-4';
		} else {
			$projectclass 	= 'col-md-7';
			$contentclass 	= 'col-md-5';
		}
			do_action( 'juanjimeneztj_single_portfolio_before' ); 
		 ?>
		<article <?php post_class('postclass'); ?>>
  			<div class="row">
  				<div class="<?php echo esc_attr($projectclass); ?> portfolio-project">
      				<?php 
      				/*
			    	*	@hooked juanjimeneztj_portfolio_single_project_output 20
			    	*/
			      	do_action( 'juanjimeneztj_single_portfolio_project' ); 
      				?>
  				</div>
  				<div class="<?php echo esc_attr($contentclass); ?> portfolio-content">
  					<div class="portfolio-content-inner">
						<header>
					  		<?php if(isset($juanjimeneztj['portfolio_post_title_inpost']) && $juanjimeneztj['portfolio_post_title_inpost'] == 1) { ?>
			      					<h1 class="entry-title"><?php the_title(); ?></h1>
							<?php }  ?>
						</header>
						<div class="entry-content">
			  				<?php
			  				do_action( 'juanjimeneztj_single_portfolio_before_content' ); 
			  				
			  				the_content(); 

			  				/*
					    	*	@hooked juanjimeneztj_wp_link_pages 10
					    	*/
			  				do_action( 'juanjimeneztj_single_portfolio_after_content' );?>
						</div>
					</div>
				</div>
			</div>
			<footer class="single-footer">
		      	<?php
		      	/*
		    	*	@hooked juanjimeneztj_portfolio_navigation 20
		    	*/
		      	do_action( 'juanjimeneztj_single_portfolio_footer' ); 
		      	?>
		    </footer>
  		</article>
		<?php
      	/**
      	*	@hooked juanjimeneztj_portfolio_bottom_carousel - 30
     	* 	@hooked juanjimeneztj_portfolio_comments - 40
      	*/
      	do_action( 'juanjimeneztj_single_portfolio_after' );

	endwhile; 
do_action('juanjimeneztj_portfolio_content_after');