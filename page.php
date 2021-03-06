<?php
/*
 * used to display standard pages with sidebar
 */

get_header(); 
?>

<div class="el-row inner">
	<div id="primary" class="el-col-small-9 content-area">
		<main id="main" class="site-main animation-container small-padding-top-bottom-medium" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				//displays the comments template
				do_action('el_display_comment_template');

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?> 
</div>
<?php get_footer(); ?>
