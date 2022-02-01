


$(document).ready(function(){

  $('.Slider[data-size=1]').slick({
    infinite: true,
    slidesToShow: 1,
    // slidesToScroll: 1,
    speed: 2000,
    touchMove: true,
    arrows: false,
    draggable: true,
    swipeToSlide: true,
    swipe: true
  });

  $('.Slider[data-size=2]').slick({
    infinite: true,
    slidesToShow: 2,
    // slidesToScroll: 2,
    speed: 2000,
    touchMove: true,
    arrows: false,
    draggable: true,
    swipeToSlide: true,
    swipe: true
  });

  $('.Slider[data-size=3]').slick({
    infinite: true,
    slidesToShow: 3,
    // slidesToScroll: 3,
    speed: 2000,
    touchMove: true,
    arrows: false,
    draggable: true,
    swipeToSlide: true,
    swipe: true
  });

});




$(document).ready(function(){

  var autoDelay = 30000;

  setInterval(function(){

    setTimeout(function(){ $('.Section-1').slick("slickNext"); }, 0);
    setTimeout(function(){ $('.Section-2').slick("slickNext"); }, 1800);
    setTimeout(function(){ $('.Section-3').slick("slickNext"); }, 1800 * 2);
    setTimeout(function(){ $('.Section-4').slick("slickNext"); }, 1800 * 3);

  }, autoDelay);
});
