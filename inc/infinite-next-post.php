<?php 

/* Infinite next and previous post looping
–––––––––––––––––––––––––––––––––––––––––––––––––– */


if( ! function_exists( 'byadr_prev_next_links' ) ){

	function byadr_prev_next_links(){

		if( is_single() ):

		$post_type = get_post_type();
		?>

		<nav class="post-navigation">
			<ul>
				<li class="post-navigation__prev">

					<?php 
					if( get_adjacent_post(false, '', true) ) :

						//previous_post_link( '%link', __('Anterior case', 'byadr') );
						previous_post_link( '%link', __('Anterior '. $post_type, 'byadr') );

					else :
						$args = array(
							'posts_per_page'=> 	1,
							'order'			=> 	'DESC',
							'post_type'		=>	$post_type,
						);
					    $first = new WP_Query($args); 

					    $first->the_post();
					    	//echo '<a href="' . get_permalink() . '">' .__('Anterior case', 'byadr'). '</a>';
					    	echo '<a href="' . get_permalink() . '">' . __('Anterior '. $post_type, 'byadr'). '</a>';

					  	wp_reset_query();

					endif; 
					?>		
				</li><!--
			 --><li class="post-navigation__next">
					<?php  

					if( get_adjacent_post(false, '', false) ) :

						next_post_link( '%link', __('Siguiente '. $post_type, 'byadr') );

					else : 

						$args = array(
							'posts_per_page'=> 	1,
							'order'			=> 	'ASC',
							'post_type'		=>	$post_type,
						);

						$last = new WP_Query($args); 
						$last->the_post();
					    	echo '<a href="' . get_permalink() . '">' .__('Siguiente '. $post_type, 'byadr'). '</a>';

					    wp_reset_query();

					endif; 
					?>
				</li>
			</ul>
		</nav>
		<?php
		/*
		elseif( is_home() ):
			?>

			<nav class="post-navigation">
				<ul>
					<li class="post-navigation__prev"><?php previous_posts_link( __('Anterior','byadr') ); ?></li><!--
					--><li class="post-navigation__next"><?php next_posts_link( __('Siguiente','byadr') ); ?></li>
				</ul>
			</nav>


		<?php
		*/
		endif;
	}
}