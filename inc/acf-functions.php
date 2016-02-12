<?php 

/**
 *  Funciones ACF - Advance Custom Fields
 *
 * 1.- Deshabilitar Items Menu Admin
 * 2.- Local JSON
 * 3.- Theme Options
 * 4.- byAdrenaline Layout Builder
 *
 */


/* 1.-  Deshabilitar ACF del Menu Admin
–––––––––––––––––––––––––––––––––––––––––––––––––– */

//add_filter('acf/settings/show_admin', '__return_false');


/* 2.-  Local JSON
–––––––––––––––––––––––––––––––––––––––––––––––––– */

// Establecemos directorio almacenaje

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/inc/acf/acf-json';
    
    
    // return
    return $path;
    
}

// Establecemos directorio carga

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = get_stylesheet_directory() . '/inc/acf/acf-json';
    
    
    // return
    return $paths;
    
}


/* 3.- Theme Options
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

require get_template_directory() . '/inc/acf/theme-options-functions.php';


/* 4.- byAdrenaline Layout Builder
–––––––––––––––––––––––––––––––––––––––––––––––––– */

if( ! function_exists( 'byadr_layout_builder' ) ) {

	function byadr_layout_builder(){

		$lb = get_field('activar_layout_builder');

		if($lb):

			if( have_rows('layout_builder') ) : while(have_rows( 'layout_builder' )) : the_row();

				// TEXT BLOCK
				require get_template_directory() . '/inc/acf/lb-text-block.php';

				// QUOTE
				require get_template_directory() . '/inc/acf/lb-quote.php';

				// GALLERY
				require get_template_directory() . '/inc/acf/lb-gallery.php';

				// VIDEO
				require get_template_directory() . '/inc/acf/lb-video.php';

				// IMAGE
				require get_template_directory() . '/inc/acf/lb-image.php';

				// MOSAICO
				require get_template_directory() . '/inc/acf/lb-grid.php';

			endwhile;endif; 
		else:

			echo get_template_part('template-part/content', 'default');

		endif;
	} 
} 

