/**
 * SHERU Theme Functions File.
 */

(function( $ ) {

  var body, resizeTimer;
  var $nav = $('.js-navigation');
  var $search = $('.js-search');
  var $toggleMenu = $('.js-toggleMenu');
  var $toggleSearch = $('.js-toggleSearch');
  var _menuClass = 'su-navigation__menu--show';
  var _searchClass = 'su-navigation-search--show';

  function initNavigation() {
    $toggleMenu.on('click', function (e) {
      e.preventDefault();
      if ($nav.hasClass(_menuClass)) {
        $nav.removeClass(_menuClass);
        $search.removeClass(_searchClass);
      } else {
        $nav.addClass(_menuClass);
        $search.addClass(_searchClass);
      }
    });

    $toggleSearch.on('click', function (e) {
      e.preventDefault();
      $search.toggleClass(_searchClass);
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
