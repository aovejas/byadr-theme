<?php 

/**
 *  Funciones ACF - Advance Custom Fields
 *
 * 1.- Deshabilitar Items Menu Admin
 * 2.- Theme Options
 * 3.- byAdrenaline Layout Builder
 *
 */



/* 1.-  Deshabilitar ACF del Menu Admin
–––––––––––––––––––––––––––––––––––––––––––––––––– */

//add_filter('acf/settings/show_admin', '__return_false');


/* 2.- Theme Options
–––––––––––––––––––––––––––––––––––––––––––––––––– */

/**
 * Habilitamos la página de opciones del Theme
 * 
 * Está condicionada a los campos definidos en el Plugin
 *
 */

if( function_exists( 'acf_add_options_page' ) ){
	
	// Creamos la página de opciones

	acf_add_options_page(array(
		'page_title' 	=> 'Configuración inicial del tema',
		'menu_title'	=> 'Theme Setup',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

require get_template_directory() . '/inc/theme-options-functions.php';


/* 3.- byAdrenaline Layout Builder
–––––––––––––––––––––––––––––––––––––––––––––––––– */

if( ! function_exists( 'byadr_layout_builder' ) ) {

	function byadr_layout_builder(){

		if( have_rows('layout_builder') ) : while(have_rows( 'layout_builder' )) : the_row();

			// TEXT BLOCK
			require get_template_directory() . '/inc/layout-builder/lb-text-block.php';

			// QUOTE
			require get_template_directory() . '/inc/layout-builder/lb-quote.php';

			// GALLERY
			require get_template_directory() . '/inc/layout-builder/lb-gallery.php';

			// VIDEO
			require get_template_directory() . '/inc/layout-builder/lb-video.php';

			// IMAGE
			require get_template_directory() . '/inc/layout-builder/lb-image.php';

			// MOSAICO
			require get_template_directory() . '/inc/layout-builder/lb-grid.php';


		endwhile;endif; 
	} 
} 