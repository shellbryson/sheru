/**
 * SHERU Theme Functions File.
 */

(function( $ ) {

  var body, resizeTimer;
  var $nav = $('.js-navigation');
  var $toggle = $('.js-toggle');

  function initNavigation() {

    $toggle.on('click', function (e) {
      e.preventDefault();
      $nav.toggleClass('su-navigation__menu--show');
    });

    $(function () {

    });
  }

  $( document ).ready( function() {
    body = $( document.body );

    if ($nav.length) {
      initNavigation();
    }

    $( window )
      .on( 'resize', function() {
        clearTimeout( resizeTimer );
        resizeTimer = setTimeout( function() {
          // Any resize functions can be called here
        }, 300 );
      } );
  });

})( jQuery );
