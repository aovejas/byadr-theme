<?php 

/* VIDEO
–––––––––––––––––––––––––––––––––––––––––––––––––– */
if( get_row_layout() == 'image' ){

	$image = get_sub_field('image_bg');
	$wrapper = get_sub_field('image_wrapper');
	$alto = get_sub_field('image_alto');
	?>


	<?php if($wrapper): ?>
	
		<section class="image-module" style="background-image: url(<?php echo $image['url']; ?>); height: <?php echo $alto . 'px'; ?>">
			
		</section>

	<?php else: ?>

		<section class="image-module">
			<div class="wrapper">
				<figure>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
				</figure>
			</div>
		</section>

	<?php endif; ?>



	<?php
}