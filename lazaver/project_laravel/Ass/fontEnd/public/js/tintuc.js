$(window).on('load',function(event){
  $('.load').delay(1500).fadeOut('fast');
});
$(function () {
    $('.ProductAndIntro').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      scrollX:true,
      centerModel: true,
      arrows: true,
      // dots:true,
      autoplay: true,
      autoplaySpeed: 2000,
      prevArrow: $("#arrow-prev"),
      nextArrow: $("#arrow-next"),
      speed: 800,
    });
  })