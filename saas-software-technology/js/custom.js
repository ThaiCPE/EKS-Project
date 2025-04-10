jQuery(function($){
	"use strict";
	jQuery('.main-menu-navigation > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},
		speed:'fast'
	});
});

function saas_software_technology_menu_open() {
	jQuery(".side-menu").addClass('open');
}
function saas_software_technology_menu_close() {
	jQuery(".side-menu").removeClass('open');
}

function saas_software_technology_search_show() {
	jQuery(".search-outer").addClass('show');
	jQuery(".search-outer").fadeIn();
}
function saas_software_technology_search_hide() {
	jQuery(".search-outer").removeClass('show');
	jQuery(".search-outer").fadeOut();
}

(function( $ ) {

	$(window).scroll(function(){
		var sticky = $('.sticky-header'),
		scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('fixed-header px-lg-3 px-2');
		else sticky.removeClass('fixed-header px-lg-3 px-2');
	});

	// Back to top
	jQuery(document).ready(function () {
    jQuery(window).scroll(function () {
      if (jQuery(this).scrollTop() > 0) {
      	jQuery('.scrollup').fadeIn();
      } else {
        jQuery('.scrollup').fadeOut();
      }
    });
    jQuery('.scrollup').click(function () {
      jQuery("html, body").animate({
        scrollTop: 0
      }, 600);
      return false;
    });
	});

	// Window load function
	window.addEventListener('load', (event) => {
		jQuery(".preloader").delay(2000).fadeOut("slow");
	});

})( jQuery );

( function( window, document ) {
	function saas_software_technology_keepFocusInMenu() {
		document.addEventListener( 'keydown', function( e ) {
			const saas_software_technology_nav = document.querySelector( '.side-menu' );

			if ( ! saas_software_technology_nav || ! saas_software_technology_nav.classList.contains( 'open' ) ) {
				return;
			}

			const elements = [...saas_software_technology_nav.querySelectorAll( 'input, a, button' )],
				saas_software_technology_lastEl = elements[ elements.length - 1 ],
				saas_software_technology_firstEl = elements[0],
				saas_software_technology_activeEl = document.activeElement,
				tabKey = e.keyCode === 9,
				shiftKey = e.shiftKey;

			if ( ! shiftKey && tabKey && saas_software_technology_lastEl === saas_software_technology_activeEl ) {
				e.preventDefault();
				saas_software_technology_firstEl.focus();
			}

			if ( shiftKey && tabKey && saas_software_technology_firstEl === saas_software_technology_activeEl ) {
				e.preventDefault();
				saas_software_technology_lastEl.focus();
			}
		} );
	}
	
	function saas_software_technology_keepfocus_search() {
		document.addEventListener( 'keydown', function( e ) {
			const saas_software_technology_search = document.querySelector( '.search-outer' );

			if ( ! saas_software_technology_search || ! saas_software_technology_search.classList.contains( 'show' ) ) {
				return;
			}

			const elements = [...saas_software_technology_search.querySelectorAll( 'input, a, button' )],
				saas_software_technology_lastEl = elements[ elements.length - 1 ],
				saas_software_technology_firstEl = elements[0],
				saas_software_technology_activeEl = document.activeElement,
				tabKey = e.keyCode === 9,
				shiftKey = e.shiftKey;

			if ( ! shiftKey && tabKey && saas_software_technology_lastEl === saas_software_technology_activeEl ) {
				e.preventDefault();
				saas_software_technology_firstEl.focus();
			}

			if ( shiftKey && tabKey && saas_software_technology_firstEl === saas_software_technology_activeEl ) {
				e.preventDefault();
				saas_software_technology_lastEl.focus();
			}
		} );
	}

	saas_software_technology_keepFocusInMenu();

	saas_software_technology_keepfocus_search();
} )( window, document );
