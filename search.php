<?php
/**
* Search Template
*/
	/**
    * Header
    */
	get_header(); 

    /**
    * @hooked juanjimeneztj_page_title - 20
    */
    do_action('juanjimeneztj_page_title_container');

    global $juanjimeneztj_has_sidebar; 
    $juanjimeneztj = juanjimeneztj_get_options();
    if(juanjimeneztj_display_sidebar()) {
    	$juanjimeneztj_has_sidebar = true;
        $itemsize = 'col-xxl-3 col-xl-4 col-md-4 col-sm-4 col-xs-6 col-ss-12';
    } else {
    	$juanjimeneztj_has_sidebar = false;
        $itemsize = 'col-xxl-3 col-xl-4 col-md-4 col-sm-4 col-xs-6 col-ss-12'; 
    }
    if(isset($juanjimeneztj['search_layout_style'])) {
    	$layout = $juanjimeneztj['search_layout_style'];
    } else {
    	$layout = 'grid';
    }
    if($layout == "singlecolumn") {
    	$masonryclass = "";
	} else {
		$masonryclass = "rowtight init-masonry-intrinsic";
	}?>
    <div id="content" class="container">
      	<div class="row">
      		<div class="main <?php echo esc_attr(juanjimeneztj_main_class()); ?> " id="ktmain" role="main">

				<?php if (!have_posts()) : ?>
				  	<div class="alert">
				    	<?php _e('Sorry, no results were found.', 'juanjimeneztj'); ?>
				  	</div>
				  	<?php get_search_form(); ?>
				<?php endif;
				?>
				<div class="clearfix search-archive <?php echo esc_attr($masonryclass);?>"  data-masonry-selector=".s_item" data-masonry-style="masonry">
					<?php while (have_posts()) : the_post(); 
					 	if($layout == "singlecolumn") {
					 		 get_template_part('templates/content', get_post_format());
						} else {
					  		echo '<div class="'.esc_attr($itemsize).' s_item">';
					       	 	get_template_part('templates/content', 'loop-searchresults');
							echo '</div> <!-- Search Item -->';
						}
						endwhile; ?>
				</div> <!-- Blog Grid -->
				
				<?php 
					/**
	                * @hooked juanjimeneztj_pagination - 20
	                */
	                do_action('juanjimeneztj_pagination'); ?>
				</div><!-- /.main -->
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