require('slick-carousel')

$(function(){
  $('.carousel').slick({
    dots: true,
    autoplay: true,
    arrows: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          arrows: false
        }
      }
    ]
  });
});
