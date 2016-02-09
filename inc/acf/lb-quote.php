<?php 

/* QUOTE
–––––––––––––––––––––––––––––––––––––––––––––––––– */
if( get_row_layout() == 'quote' ){

	$quote_text = get_sub_field('quote_text');
	$quote_autor = get_sub_field('quote_autor');

	$quote_color_bg = get_sub_field('quote_color_bg');
	$quote_color = get_sub_field('quote_color');


	?>
	<section class="quote-module" style="<?php if($quote_color_bg) echo 'background-color:' . $quote_color_bg . ';' ;?><?php if($quote_color) echo 'color:' . $quote_color. ';' ;?>">
		<div class="wrapper">
			
			<blockquote>
				<?php echo $quote_text; ?>
				<p class="quote-autor">
					<?php echo $quote_autor; ?>
				</p>
			</blockquote>

		</div>
	</section>
	<?php
}