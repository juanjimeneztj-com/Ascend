<?php
/**
 * Home page template
 *
 * @package juanjimeneztj Themes
 */

get_header();
global $post, $juanjimeneztj_grid_carousel;
$post_id                  = get_option( 'page_for_posts' );
$blog_type                = get_post_meta( $post_id, '_kad_blog_type', true );
$blog_columns             = get_post_meta( $post_id, '_kad_blog_columns', true );
$juanjimeneztj_grid_carousel     = false;
$juanjimeneztj_blog_loop['loop'] = 1;
$paged                    = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$lay                      = juanjimeneztj_get_postlayout( $blog_type );
$juanjimeneztj_grid_columns      = $blog_columns ? absint( $blog_columns ) : 3;

if ( juanjimeneztj_display_sidebar() ) {
	$fullclass          = '';
	$juanjimeneztj_has_sidebar = true;
} else {
	$fullclass          = 'fullwidth';
	$juanjimeneztj_has_sidebar = false;
}
$itemsize = juanjimeneztj_get_post_grid_item_size( $juanjimeneztj_grid_columns, $juanjimeneztj_has_sidebar );

/**
 * juanjimeneztj Page Title hook.
 *
 * @hooked juanjimeneztj_page_title - 20
 */
do_action( 'juanjimeneztj_page_title_container' );
?>

<div id="content" class="container">
	<div class="row">
		<div class="main <?php echo esc_attr( juanjimeneztj_main_class() ); ?> <?php echo esc_attr( $lay['pclass'] ); ?>" id="ktmain" role="main">
			<div class="kt_archivecontent <?php echo esc_attr( $lay['tclass'] ); ?>" data-masonry-selector="<?php echo esc_attr( $lay['data_selector'] ); ?>" data-masonry-style="<?php echo esc_attr( $lay['data_style'] ); ?>"> 
				<?php
				if ( ! have_posts() ) :
				?>
					<div class="error-not-found"><?php esc_html_e( 'Sorry, no blog entries found.', 'juanjimeneztj' ); ?></div>
				<?php
				endif;
				$juanjimeneztj_blog_loop['count'] = $wp_query->post_count;
				while ( have_posts() ) :
					the_post();
					if ( 'full' === $lay['sum'] ) {
						if ( has_post_format( 'quote' ) ) {
							get_template_part( 'templates/content', 'post-full-quote' );
						} else {
							get_template_part( 'templates/content', 'post-full' );
						}
					} elseif ( 'grid' === $lay['sum'] ) {
						if ( 'true' === $lay['highlight'] && 1 == $juanjimeneztj_blog_loop['loop'] && 1 == $paged ) {
							get_template_part( 'templates/content', get_post_format() );
						} else {
							?>
							<div class="<?php echo esc_attr( $itemsize ); ?> b_item kad_blog_item">
								<?php get_template_part( 'templates/content', 'post-grid' ); ?>
							</div>
						<?php
						}
					} elseif ( 'photo' === $lay['sum'] ) {
						?>
						<div class="<?php echo esc_attr( $itemsize ); ?> b_item kad_blog_item">
							<?php get_template_part( 'templates/content', 'post-photo-grid' ); ?>
						</div>
						<?php
					} elseif ( 'below_title' === $lay['sum'] ) {
						get_template_part( 'templates/content', 'post-title-above' );
					} else {
						get_template_part( 'templates/content', get_post_format() );
					}
					$juanjimeneztj_blog_loop['loop'] ++;
				endwhile;
				?>
			</div><!-- /.archive content -->
			<?php
			/**
			 * juanjimeneztj Pagination hook.
			 *
			 * @hooked juanjimeneztj_pagination - 20
			 */
			do_action( 'juanjimeneztj_pagination' );

			/**
			 * juanjimeneztj Page Footer hook.
			 *
			 * @hooked juanjimeneztj_page_comments - 20
			 */
			do_action( 'juanjimeneztj_page_footer' );
		?>
		</div><!-- /.main -->
		<?php
		/**
		 * Sidebar
		 */
		if ( juanjimeneztj_display_sidebar() ) :
			get_sidebar();
		endif;
		?>
	</div><!-- /.row-->
</div><!-- /.content -->
<?php

get_footer();
