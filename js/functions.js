/**
 * SHERU Theme Functions File.
 */

(function( $ ) {

  var body, resizeTimer;
  var $nav = $(".js-navigation");
  var $search = $(".js-search");
  var $toggleMenu = $('.js-toggleMenu');
  var $toggleSearch = $('.js-toggleSearch');

  function initNavigation() {

    $toggleMenu.on('click', function (e) {
      e.preventDefault();
      $nav.toggleClass('su-navigation__menu--show');
    });

    $toggleSearch.on('click', function (e) {
      e.preventDefault();
      $search.toggleClass('su-search--show');
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
