

function sliderUpdate(){

  $('#Content').ready(function() {

    var refreshTime = 100;

    setTimeout(function() {

      $('.PikSlider').slick({
        prevArrow: "#PikSliderBack",
        nextArrow: "#PikSliderNext",
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        pauseOnFocus: false,
        pauseOnHover: true,
        pauseOnDotsHover: false,
        variableWidth: false,
        draggable: true,
        centerMode: false,
        autoplay: true,
        autoplaySpeed: 12000,
        speed: 1800,
        dots: false,
      });


    }, refreshTime);

  });
}





function LoadMarquee() {
  $('.news-ticker').marquee({
      duration: 18000,
      //gap in pixels between the tickers
      // gap: 200,
      delayBeforeStart: 0,
      direction: 'left',
      duplicated: true
  });
};
