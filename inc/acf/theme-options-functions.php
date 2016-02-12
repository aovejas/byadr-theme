<?php 

/**
 *  Funciones para la página de opciones del theme
 *
 * 1.- Logo
 * 2.- Social Media
 * 3.- Dirección ****
 *
 */

/* 1.- LOGO
–––––––––––––––––––––––––––––––––––––––––––––––––– */

if( ! function_exists( 'byadr_theme_logo' ) ){


	function byadr_theme_logo(){
		$logo = get_field('logo_theme', 'option');

		if($logo):
		?>

		<h2 class="logo">
			<a href="<?php echo home_url( ); ?>" style="background-image: url('<?php echo $logo['url']; ?>');">
				<?php bloginfo( 'name' ); ?>
			</a>
		</h2>

		<?php
		endif;
	}
}

/* 2.- SOCIAL MEDIA
–––––––––––––––––––––––––––––––––––––––––––––––––– */


if( ! function_exists( 'byadr_social' ) ){

	function byadr_social(){
		if( have_rows('social', 'option') ): ?>
			<ul class="social-links">
			<?php while( have_rows('social', 'option')) : the_row();?>
				<?php 
				$red = get_sub_field('red_theme'); 
				$url = get_sub_field('url_theme'); 
				?>

				<li class="<?php echo 'social-' . $red; ?>">
					<a href="<?php echo $url; ?>"></a>
				</li>

			<?php endwhile; ?>
			</ul>
		<?php endif;
	}
}


/* 3.- Dirección ******
–––––––––––––––––––––––––––––––––––––––––––––––––– 

if( ! function_exists( 'byadr_direccion' ) ){


	function byadr_direccion(){

		?>
		<?php if( have_rows('direcciones', 'option') ): ?>
		<div class="clearfix localizacion-module">
			<?php while( have_rows('direcciones', 'option')) : the_row();?>
				<?php 
					$dir = get_sub_field('direccion'); 
					$cp = get_sub_field('codigo_postal'); 
					$loc = get_sub_field('localidad');
					$prov = get_sub_field('provincia');

					$bg = get_sub_field('imagen');

					$maps = get_sub_field('enlace_google_maps');
				?>

			<div class="column column__half" style="background-image: url('<?php echo $bg['url']; ?>');">
				<a href="<?php echo $maps; ?>" target="_blank">
					<div class="centrar">
						<h3><?php the_sub_field('nombre'); ?></h3>
						<p><?php echo $dir . '<br>' . $cp . ' ' . $loc . '<br>' . $prov; ?></p>
					</div>
				</a>
			</div>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>

		<?php

	}


}
*/
