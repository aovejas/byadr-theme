<?php

/* Definimos el Content Width
–––––––––––––––––––––––––––––––––––––––––––––––––– */

function byadr_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'byadr_content_width', 960 );
}

add_action( 'after_setup_theme', 'byadr_content_width', 0 );


/* Setup inicial
–––––––––––––––––––––––––––––––––––––––––––––––––– */
if ( ! function_exists( 'byadr_theme_setup' ) ) :

	function byadr_theme_setup(){
		// Habilitamos la traduccion del tema
		load_theme_textdomain( 'byadr', get_template_directory() . '/languages' );

		// RSS Feed post y comentarios en el head
		add_theme_support( 'automatic-feed-links' );

		// Etiqueta Title
		add_theme_support( 'title-tag' );

		// Markup HTML5 
		add_theme_support( 'html5', array( 
			'comment-list', 
			'comment-form', 
			'search-form', 
			'gallery', 
			'caption',
		 ) );
		
		// Post Thumbnails
		add_theme_support( 'post-thumbnails' ); 
			//add_image_size( 'equipo', 500, 600, true);


		// Post Formats
		add_theme_support( 'post-formats', array( 
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		// Custom Header
		$defaults = array(
			'default-image'          => get_template_directory_uri() . '/images/custom-header.jpg',
			'random-default'         => false,
			'width'                  => 0,
			'height'                 => 0,
			'flex-height'            => true,
			'flex-width'             => false,
			'default-text-color'     => '',
			'header-text'            => false,
			'uploads'                => true,
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);

		add_theme_support( 'custom-header', $defaults );

		// Registramos los menús

		register_nav_menus(
		    array(
		      'main-menu'	=>	__( 'Main Menu', 'byadr' ),
		      'footer-menu'	=>	__( 'Footer Menu', 'byadr'  ),
		      'mobile-menu' =>	__( 'Mobile Menu', 'byadr' )

		    )
		);


	}

endif; // byadr_theme_setup()
	
add_action( 'after_setup_theme', 'byadr_theme_setup' );
	


/* Widget Area
–––––––––––––––––––––––––––––––––––––––––––––––––– */

if ( ! function_exists( 'byadr_widgets_areas' ) ) :

	function byadr_widgets_areas(){
		
		register_sidebar( 
			array(
				'id'            => 'footer-widget',
				'name'          => __('Widget del footer','byadr'),
				'description'   => __('Widget del footer para la dirección e información de contacto','byadr'),
		        'class'         => '',
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<h5>',
				'after_title'   => '</h5>' 
			) 
		);


	}

endif;

add_action( 'widgets_init', 'byadr_widgets_areas' );


/* Encolamos estilos y scrips
–––––––––––––––––––––––––––––––––––––––––––––––––– */
if ( ! function_exists( 'byadr_set_styles_js' ) ) :

	function byadr_set_styles_js() {
	    // Google fonts
	    wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700|Roboto:400,300,700');
	    wp_enqueue_style( 'google-fonts' );

		// Hoja estilo principal
	    wp_enqueue_style( 'main-style', get_stylesheet_uri() );

	    if ( !is_admin() ):
	    	// LLamamos a jQuery
			wp_enqueue_script('jquery');

			/*
			// Insertamos script Masonry
			wp_register_script( 'masonry',  get_bloginfo('template_directory') . '/js/min/masonry.pkgd.min.js', false, null, true);
			wp_enqueue_script('masonry');

			// Insertamos script Magnific PopUp
			wp_register_script( 'magnific-popup',  get_bloginfo('template_directory') . '/js/min/jquery.magnific-popup.min.js', false, null, true);
			wp_enqueue_script('magnific-popup');

			// Insertamos script Masonry
			wp_register_script( 'easings',  get_bloginfo('template_directory') . '/js/min/jquery.easing.1.3.min.js', false, null, true);
			wp_enqueue_script('easings');
			*/
			
			// Insertamos script para Comentarios
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}

			// Insertamos script Principal
			wp_register_script( 'main-script',  get_bloginfo('template_directory') . '/js/min/main.min.js', false, null, true);
			wp_enqueue_script('main-script');

	    endif;

	}

endif;

add_action( 'wp_enqueue_scripts', 'byadr_set_styles_js' );




/* Theme Functions
–––––––––––––––––––––––––––––––––––––––––––––––––– */

/**
 * Funciones Extras para el Theme
 *
 * 1.- Longitud del excerpt
 * 2.- Favicons & Apple Touch icons
 * 3.- Habilitamos SVG
 * 4.- Custom oEmbed Videos
 * 5.- Eliminar estilos de Galería por defecto
 * 6.- Infinite Prev/Next post looping
 * X.- Shortcodes ***
 *
 */

require get_template_directory() . '/inc/extra-functions.php';


/**
 *  Funciones ACF - Advance Custom Fields
 *
 * 1.- Deshabilitar Items Menu Admin
 * 2.- Local JSON
 * 3.- Theme Options
 * 4.- byAdrenaline Layout Builder
 *
 */

require get_template_directory() . '/inc/acf-functions.php';









