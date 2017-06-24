jQuery(function($) {
  var nav = $('#header');
  var $win = $(window);
  var winH = window.innerHeight;
  var overlay = $('#overlay');

  $win.on("scroll", function () {
    if ($(this).scrollTop() > 1) {
      nav.addClass("scrolled-100vh");
    } else {
      if(!(overlay.hasClass('menu-overlay'))) {
        nav.removeClass("scrolled-100vh");
      }
    }
  }).on("resize", function(){ // If the user resizes the window
     winH = window.innerHeight; // you'll need the new height value
  });
});
