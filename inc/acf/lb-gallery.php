<?php 

/* GALLERY
–––––––––––––––––––––––––––––––––––––––––––––––––– */
if( get_row_layout() == 'galeria' ){

	// Seccion
	$wrapper = get_sub_field('gallery_wrapper');
	$bg_color = get_sub_field('gallery_color_bg');

	if( have_rows('gallery')):
	?>

	<section class="gallery-module" style="<?php if($bg_color){ echo 'background-color:' . $bg_color . ';' ;} ?>">
		<div class="<?php if(!$wrapper) echo 'wrapper'; ?> gallery-wrapper">	
			<div class="gallery-sizer"></div>

			<?php while(have_rows('gallery') ):the_row(); ?>

				<?php 

				$image = get_sub_field('gallery_imagen');
				$ancho = get_sub_field('gallery_ancho');
				$alto = get_sub_field('gallery_alto');

				?>

				<div class="gallery-item <?php if($ancho == '2X'){ echo 'gallery-item__2w'; } if($ancho == '3X'){ echo 'gallery-item__3w'; } if($alto == 'X/2'){ echo 'gallery-item__2h'; }?>" style="background-image: url(<?php echo $image['url']; ?>);"></div>

			<?php endwhile; ?>

		</div>	
	</section>
	<?php	
	endif;
}


