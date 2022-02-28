$(window).on('load',function(event){
  $('.load').delay(1500).fadeOut('fast');
});
  $(function () {
  
    $('.for_slick_slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        centerModel: true,
        arrows: true,
        // dots:true,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow: $("#slideLeft"),
        nextArrow: $("#slideRight"),
        speed: 800,
        
    });
  
  })
  
    let thumbails=document.getElementsByClassName('thumbnail');
    let activeImages=document.getElementsByClassName('active');
    $(()=> {
      $('.thumbnail').click(function(){
        let imgPath=$(this).attr('src');
      
       $('#featured').attr('src',imgPath);
  
        })
  
    })
    $(() => {
        $('.cong').click(function() {
            let quantity = document.querySelector('.quantity');
            let operator = 1;
            var retunr = parseInt(quantity.value) + parseInt(operator);
            quantity.value = retunr;


        })

    })
    $(() => {
        $('.tru').click(function() {
            let quantity = document.querySelector('.quantity');
            let operator = 1;
            var retunr = parseInt(quantity.value) - parseInt(operator);
        if( retunr <1){
            quantity.value = 1;

        }else{
            quantity.value = retunr;

        }
       
        })

    })
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