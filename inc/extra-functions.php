<?php 

/**
 * Funciones Extras para el Theme
 *
 * 1.- Longitud del excerpt
 * 2.- Favicons & Apple Touch icons
 * 3.- Habilitamos SVG
 * 4.- Custom oEmbed Videos
 * 5.- Eliminar estilos de Galería por defecto
 *
 */


/* 1.- Longitud excerpt
–––––––––––––––––––––––––––––––––––––––––––––––––– */

if ( ! function_exists( 'byadr_excerpt_length' ) ) :

	function byadr_excerpt_length( $length ) {
		return 20;
	}

endif;

add_filter( 'excerpt_length', 'byadr_excerpt_length', 999 );


/* 2.- Favicons & Apple Touch icons
–––––––––––––––––––––––––––––––––––––––––––––––––– */

if ( ! function_exists( 'byadr_add_favicons' ) ) :

	function byadr_add_favicons(){
		?>
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon.ico">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon.png">
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/favicon/iPad-icon.png">
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/favicon/iPadRetina-icon.png">
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/favicon/iPhone-icon.png">
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/favicon/iPhoneRetina-icon.png">
		<?php
	}

endif;

add_action( 'wp_enqueue_scripts', 'byadr_add_favicons' );


/* 3.- Habilitamos tipo imagen SVG
–––––––––––––––––––––––––––––––––––––––––––––––––– */

function byadr_mime_types($mimes) {

	$mimes['svg'] = 'image/svg+xml';
	
	return $mimes;
}

add_filter('upload_mimes', 'byadr_mime_types');


/* 4.- Custom oEmbed Videos
–––––––––––––––––––––––––––––––––––––––––––––––––– */

add_filter( 'embed_oembed_html', 'byadr_custom_oembed_filter', 10, 4 ) ;

function byadr_custom_oembed_filter($html, $url, $attr, $post_ID) {
    $return = '<figure class="videoWrap">'.$html.'</figure>';
    return $return;
}


/* 5.- Eliminar estilos de Galería por defecto
–––––––––––––––––––––––––––––––––––––––––––––––––– */

add_filter( 'use_default_gallery_style', '__return_false' );


