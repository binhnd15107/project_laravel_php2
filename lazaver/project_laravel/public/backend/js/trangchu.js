$(window).on('load',function(event){
  $('.load').delay(1000).fadeOut('fast');
});
$(function () {
  $('.ProductAndIntro').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
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
$(function () {
  $('.ProductAndIntro2').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    centerModel: true,
    arrows: true,
    // dots:true,
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow: $("#arrow-prev2"),
    nextArrow: $("#arrow-next2"),
    speed: 800,
  });
})
$(function () {
  $('.ProductAndIntro3').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    centerModel: true,
    arrows: true,
    // dots:true,
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow: $("#arrow-pre3"),
    nextArrow: $("#arrow-next3"),
    speed: 800,
  });
})

