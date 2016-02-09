<?php 

/* TEXT BLOCK
–––––––––––––––––––––––––––––––––––––––––––––––––– */

if( get_row_layout() == 'text_block' ){

	// Ajustes avanzados
	$wrapper = get_sub_field('text_wrapper');
	$bg_color = get_sub_field('text_color_bg');
	$bg_img = get_sub_field('text_img_bg');
	$color = get_sub_field('text_color');

	$center = get_sub_field('text_centrado');

	$alto = get_sub_field('text_alto');

	$custom_css = get_sub_field('text_custom_css');

	if(have_rows( 'bloques_de_texto' ) ): ?>

		<section class="text-module <?php if($center) echo 'text-module__center'; ?>" style="<?php if($bg_color){ echo 'background-color:' . $bg_color . ';' ;} if($bg_img){ echo 'background-image: url(' . $bg_img['url'] . ');' ;} if($color){ echo 'color:' . $color . ';' ;} if($custom_css){ echo $custom_css;}?>">
			<?php // Wrapper ?>
			<?php if( !$wrapper ): ?>
				<div class="wrapper">
			<?php endif; ?>

				<?php // Content ?>
				<div class="clearfix">
					<?php while( have_rows( 'bloques_de_texto' ) ) : the_row(); ?>
						<?php 
							$content = get_sub_field('contenido');
							$column = get_sub_field('ancho');
							$bg = get_sub_field('text_content_bg');
							$link = get_sub_field('text_content_link');

							$invertir = get_sub_field('invertir');
							if($invertir){ 
								$invertir = 'flow-opposite';
							}
						?>
						<div class="column <?php echo $column; if($invertir){ echo ' ' . $invertir;} ?>" style="<?php if($bg) echo 'background-image: url(' . $bg['url'] . ');'; if($alto) echo 'height:' .$alto. 'px;'; ?>">
							<?php if($link): ?><a href="<?php echo $link; ?>" style="<?php if($color){ echo 'color:' . $color . ';' ;}?>"><?php endif; ?>
							<div class="column-content">
								<?php echo $content; ?>
							</div>
							<?php if($link): ?></a><?php endif; ?>
						</div>

					<?php endwhile; ?>
				</div> <?php // Fin Content Clearfix ?>

			<?php // Fin wrapper ?>
			<?php if( !$wrapper ): ?>
				</div>
			<?php endif; ?>
		</section>
	<?php endif;
}