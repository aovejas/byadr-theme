jQuery(function ($) {

var documento = $(document);
var ventana = $(window);

/* Masonry
–––––––––––––––––––––––––––––––––––––––––––––––––– */

// Gallery
documento.on('ready', function(){
	$('.gallery-wrapper').masonry({
	  // set itemSelector so .grid-sizer is not used in layout
	  itemSelector: '.gallery-item',
	  // use element for option
	  columnWidth: '.gallery-sizer',
	  percentPosition: true
	});


	// Blog Archive

	$('.blog--wrapper').masonry({
	  // set itemSelector so .grid-sizer is not used in layout
	  itemSelector: '.blog--item',
	  // use element for option
	  columnWidth: '.blog--sizer',
	  percentPosition: true
	});
});
/* Magnific PopUp
–––––––––––––––––––––––––––––––––––––––––––––––––– */
$(function () {
	$('.btn--popup').magnificPopup({
		type: 'inline',
		preloader: false,
		focus: '#username',
		modal: true
	});
	documento.on('click', '.btn--popup__dismiss', function(e) {
		e.preventDefault();
		$.magnificPopup.close();
	});
});


/* Menu Mobile
–––––––––––––––––––––––––––––––––––––––––––––––––– */

$('.mobileNav').on('click', byadr_show_menu);

function byadr_show_menu(){
	$('.mobileNav > div').slideToggle();
};

/* Ancla Top
–––––––––––––––––––––––––––––––––––––––––––––––––– */

$('.ancla').on('click',function(event){
	event.preventDefault();
	$( "html , body" ).stop().animate( { scrollTop: 0 } , 2400 , "easeInOutCubic") ;
});


/* Problemas padding bloques texto
–––––––––––––––––––––––––––––––––––––––––––––––––– */

documento.on('ready', function(){
	$('.text-module > .column.column__half:nth-of-type(2n+3)').before('</div><div class="clearfix">');

	$('.text-module > .column.column__third:nth-of-type(3n+4)').before('</div><div class="clearfix">');

	$('.text-module > .column.column__fourth:nth-of-type(4n+5)').before('</div><div class="clearfix">');
});





/* Evitar scroll en pop up
––––––––––––––––––––––––––––––––––––––––––––––––––

documento.on('ready', deshabilitamos_scroll_popup);

function deshabilitamos_scroll_popup(){
	var estadoPopup = $('.popup').css("display");

	if( estadoPopup === 'block' ){
		$('body').addClass('noscroll');
	}
	if( estadoPopup === 'none' ){
		$('body').removeClass('noscroll');
	}
}
 */

}); // Fin de jQuery function