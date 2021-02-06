$(document).ready(function () {

    //Top Nav (Scroling Navbar)//
    scrollShow = false;
    $(window).scroll(function () {
        scrollTop = $(window).scrollTop();

        if (scrollTop > 0) {
            if (scrollShow)
                return;
            console.log(scrollShow);
            scrollShow = true;
            $('.navbar').addClass('scrollNav');
            $('.navbar').css('opacity', 0)
                .slideDown('slow').animate({ opacity: 1 },
                    { queue: false, duration: 'slow' }
                );
        }
        else {
            $('.navbar').removeClass('scrollNav');
            /*console.log('false');*/
            scrollShow = false;
        }
    });



    $('.categOwl').owlCarousel({
        loop:true,
        autoplay:true,
        dots:false,
        margin:10,
        autoplayHoverPause:true,
        smartSpeed:350,
        responsiveClass:true,
        rtl:true,
        responsive:{
            0:{
                items:1,
                nav:true,
                loop:true
            },
            575:{
                items:2,
                nav:false,
                loop:true
            },
            991:{
                items:3,
                nav:true,
                loop:true,
            }
        }
    });

    $('.owl-services').owlCarousel({
        loop:true,
        autoplay:true,
        dots:false,
        margin:10,
        autoplayHoverPause:true,
        smartSpeed:300,
        responsiveClass:true,
        rtl:true,
        responsive:{
            0:{
                items:1,
                nav:true,
                loop:true
            },
            575:{
                items:2,
                nav:false,
                loop:true
            },
            991:{
                items:4,
                nav:true,
                loop:true,
            }
        }
    });



    /*Smooth Scrolling*/ 
    function onScroll(event){
        var scrollPosition = $(document).scrollTop();
      $('.nav-link[href^="#"').each(function () {
        console.log($(this).attr('href')); 
        var refElement = $($(this).attr("href"));
      //   console.log($(this).attr("href")); //log
        if (refElement.length&&refElement.position().top-100 <= scrollPosition) {
        $('.nav-link').removeClass("active");
        $(this).addClass("active");
        }
        else if( $(document).scrollTop() <= 100){
          $('.nav-link').removeClass("active");
          $('.nav-link.home').addClass("active");
        }
        else{
        $(this).removeClass("active"); 
      
        }
      });
    }
    $(document).on("scroll", onScroll);
    $('.navbar-collapse .nav-link').on('click', function () {
      $('html, body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
    
      return false;
    });



    

});
