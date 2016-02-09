<?php 

/* VIDEO
–––––––––––––––––––––––––––––––––––––––––––––––––– */
if( get_row_layout() == 'video' ){
	
	$wrapper = get_sub_field('video_wrapper');
	$bg_color = get_sub_field('video_color_bg');
	
	?>
	
	<section class="video-module" style="<?php if($bg_color){ echo 'background-color:' . $bg_color . ';' ;} ?>">

		<?php if( !$wrapper ): ?>
			<div class="wrapper">
		<?php endif; ?>

			<div class="video-container">
				<?php the_sub_field('video_embed'); ?>
			</div>


		<?php // Fin wrapper ?>
		<?php if( !$wrapper ): ?>
			</div>
		<?php endif; ?>

	</section>


	<?php
}