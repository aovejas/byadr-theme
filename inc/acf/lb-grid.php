<?php 

/* MOSAICO / GRID
–––––––––––––––––––––––––––––––––––––––––––––––––– */
if( get_row_layout() == 'grid' ){
	
	$cols = get_sub_field('grid_cols');
	$images = get_sub_field('grid_images');

	$wrapper = get_sub_field('grid_wrapper');
	$bg_color = get_sub_field('grid_color_bg');
	
	?>
	
	<section class="grid-module" style="<?php if($bg_color){ echo 'background-color:' . $bg_color . ';' ;} ?>">

		<?php if( !$wrapper ): ?>
			<div class="wrapper">
		<?php endif; ?>
			<ul class="clearfix">
				<?php foreach( $images as $image ): ?>

					<li class="<?php echo $cols; ?>">
						
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">



					</li>

				<?php endforeach; ?>
			</ul>




		<?php // Fin wrapper ?>
		<?php if( !$wrapper ): ?>
			</div>
		<?php endif; ?>

	</section>


	<?php
}