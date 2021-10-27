
$('.Slider[data-size=1]').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  pauseOnFocus: false,
  pauseOnHover: true,
  pauseOnDotsHover: false,
  variableWidth: false,
  draggable: true,
  centerMode: false,
  autoplay: false,
  // autoplaySpeed: 12000,
  speed: 1800,
  dots: false,
  arrows: false,
  touchMove: true
});

$('.Slider[data-size=2]').slick({
  infinite: true,
  slidesToShow: 2,
  slidesToScroll: 1,
  pauseOnFocus: false,
  pauseOnHover: true,
  pauseOnDotsHover: false,
  variableWidth: false,
  draggable: true,
  centerMode: false,
  autoplay: false,
  // autoplaySpeed: 12000,
  speed: 1800,
  dots: false,
  arrows: false,
  touchMove: true
});

$('.Slider[data-size=3]').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  pauseOnFocus: false,
  pauseOnHover: true,
  pauseOnDotsHover: false,
  variableWidth: false,
  draggable: true,
  centerMode: false,
  autoplay: false,
  // autoplaySpeed: 12000,
  speed: 1800,
  dots: false,
  arrows: false,
  touchMove: true
});





$( window ).on( "load", function() {

  setInterval(function(){

    setTimeout(function(){ $('.Slider[data-slider=1]').slick("slickNext"); }, 0);
    setTimeout(function(){ $('.Slider[data-slider=2]').slick("slickPrev"); }, 1800);
    setTimeout(function(){ $('.Slider[data-slider=3]').slick("slickNext"); }, 1800 * 2);
    setTimeout(function(){ $('.Slider[data-slider=4]').slick("slickPrev"); }, 1800 * 3);

  }, 30000);
})





     // $('.carousel-one').slickPrev();

     // $('.Slider[data-size=1]').slickNext();

// function LoadMarquee() {
//   $('.news-ticker').marquee({
//       duration: 18000,
//       //gap in pixels between the tickers
//       // gap: 200,
//       delayBeforeStart: 0,
//       direction: 'left',
//       duplicated: true
//   });
// };
