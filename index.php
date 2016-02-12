<?php get_header(); ?>


	<?php if( have_posts() ): ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
			
			<?php while( have_posts() ):the_post(); ?>

				<?php byadr_layout_builder(); ?>

			<?php endwhile; ?>
			
		</article>

	<?php endif; ?>


<?php get_footer(); ?>