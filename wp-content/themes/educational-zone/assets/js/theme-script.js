jQuery( function ( $ ) {
    'use strict';

    // Menu dropdown
    $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).parent().siblings().removeClass('open');
        $(this).parent().toggleClass('open');
    });


    $( 'select' ).addClass( 'form-control' );

    // The WordPress Default Widgets
    // Now we'll add some classes for the WordPress default widgets - let's go
    $( ".widget").wrapInner("<div class='card-body'></div>");
    $( 'table#wp-calendar' ).addClass( 'table table-striped');

    // Comment Form
    $( '.comment-form-author > input' ).addClass( 'form-control' );
    $( '.comment-form-email > input' ).addClass( 'form-control' );
    $( '.comment-form-url > input' ).addClass( 'form-control' );
    $('.comment-reply-link').addClass('btn btn-primary');
    $('#commentsubmit').addClass('btn btn-primary');

    // Password Form
    $( '.post-password-form > p > label > input' ).addClass( 'form-control' );
    $( '.post-password-form > p >  input' ).addClass( 'btn btn-primary' );

});

function educational_zone_openNav() {
  window.educational_zone_RespoMenu=true;
  jQuery(".sidenav").addClass('show');
}
function educational_zone_closeNav() {
  window.educational_zone_RespoMenu=false;
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function educational_zone_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const educational_zone_nav = document.querySelector( '.sidenav' );

      if ( ! educational_zone_nav || ! educational_zone_nav.classList.contains( 'show' ) ) {
        return;
      }

      const elements = [...educational_zone_nav.querySelectorAll( 'input, a, button' )],
        educational_zone_lastEl = elements[ elements.length - 1 ],
        educational_zone_firstEl = elements[0],
        educational_zone_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && educational_zone_lastEl === educational_zone_activeEl ) {
        e.preventDefault();
        educational_zone_firstEl.focus();
      }

      if ( shiftKey && tabKey && educational_zone_firstEl === educational_zone_activeEl ) {
        e.preventDefault();
        educational_zone_lastEl.focus();
      }
    } );
  }

  educational_zone_keepFocusInMenu();
} )( window, document );


var btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(window).scroll(function() {
  var data_sticky = jQuery('.header-menu').attr('data-sticky');

  if (data_sticky == "true") {
    if (jQuery(this).scrollTop() > 1){  
      jQuery('.header-menu').addClass("stick_header");
    } else {
      jQuery('.header-menu').removeClass("stick_header");
    }
  }
});

jQuery(document).ready(function() {
window.addEventListener('load', (event) => {
    jQuery(".loading").delay(2000).fadeOut("slow");
  });
})