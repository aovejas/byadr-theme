<?php get_header(); ?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
			
		<div class="wrapper">

			<h1><?php _e('(Error 404)', 'byadr'); ?></h1>	
			<p><?php _e('UPPS!! No hemos encontrado lo que buscabas.', 'byadr'); ?></p>
			<a href="<?php echo home_url( ); ?>" class="btn">Vuelve a la página inicial</a>
			
		</div>

	</article>
	
<?php get_footer(); ?>