var page = document.location.href.split('#')[0].split('/').pop();

/*photographer slider | index.html ---------------------------------------------------------------*/
var portraitSwiper = new Swiper('.photographer-swiper', {
    direction: 'horizontal',
    setWrapperSize: true,
    grabCursor: true,
    slidesPerView: 2,
    spaceBetween: 10,
    speed: 700,
    centeredSlides: true,
    loop: true,
    keyboard: {
        enabled: true,
        onlyInViewport: true
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    },
    mousewheel: false,
    breakpoints: {
        1024: {
            slidesPerView: 2,
            spaceBetween: 10
        },
        768: {
            slidesPerView: 1,
            spaceBetween: 10
        },
        640: {
            slidesPerView: 1,
            spaceBetween: 10
        }
    }
});

if(location.pathname.indexOf('index2') > -1){
    /*photographer slider2 | index2.html ---------------------------------------------------------------*/
    var portraitSwiper = new Swiper('.photographer-swiper2', {
        direction: 'horizontal',
        setWrapperSize: true,
        grabCursor: true,
        slidesPerView: 2,
        spaceBetween: 10,
        speed: 700,
        centeredSlides: true,
        loop: true,
        autoplay: {
            delay: 3500,
        },
        keyboard: {
            enabled: true,
            onlyInViewport: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        mousewheel: false,
        breakpoints: {
            1024: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }
    });
}

if(location.pathname.indexOf('product') > -1){
    /*similar products slider | product.html ---------------------------------------------------------------*/
    var productSwiper = new Swiper('.pro-swiper', {
        direction: 'horizontal',
        setWrapperSize: true,
        grabCursor: true,
        slidesPerView: 3,
        spaceBetween: 10,
        speed: 700,
        centeredSlides: false,
        loop: true,
        keyboard: {
            enabled: true,
            onlyInViewport: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        mousewheel: false,
        breakpoints: {
            1024: {
                slidesPerView: 3,
                spaceBetween: 10
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 10
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            650: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }
    });
}

if(location.pathname.indexOf('gallery') > -1) {
    /*gallery slider | gallery.html ---------------------------------------------------------------*/
    var productSwiper = new Swiper('.gallery-swiper', {
        direction: 'horizontal',
        setWrapperSize: true,
        grabCursor: true,
        slidesPerView: 2,
        spaceBetween: 10,
        speed: 700,
        centeredSlides: true,
        loop: true,
        keyboard: {
            enabled: true,
            onlyInViewport: true
        },
        // navigation: {
        //     nextEl: '.swiper-button-next',
        //     prevEl: '.swiper-button-prev'
        // },
        mousewheel: true,
        breakpoints: {
            1024: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }
    });
}


/*centering the image in any direction -----------------------------------------------------------------*/
$(".perfectImg").parent().css({"text-align": "center"});
var h = $(".perfectImg").height();
var w = $(".perfectImg").width();
var pw = $(".perfectImg").parent().width();
var ph = $(".perfectImg").parent().height();

if (pw && ph) {
    if (w / pw > h / ph) {
        // check smaller images
        $(".perfectImg").width(pw);
    } else {
        $(".perfectImg").height(ph);
    }
}

if(page == '' || location.pathname.indexOf('index') > -1){
    /* photo carousel direction appear hover | index.html ---------------------------------------------------*/
    $("#photoCarousel").hover(function () {
        $(this).find(".carousel-control .dir-icn").css({"opacity": "1"});
    }, function () {
        $(this).find(".carousel-control .dir-icn").css({"opacity": "0"});
    });

    /* trim paragraph text of carousel | index.html -------------------------------------------------*/
    $(function () {
        $(".carousel-caption p").each(function () {
            var len = $(this).text().length;
            if (len > 80) {
                var trimmedTxt = $(this).text().substr(0, 130);
                $(this).text(trimmedTxt.substr(0, Math.min(trimmedTxt.length, trimmedTxt.lastIndexOf(" "))) + '...');
            }
        });
    });

    /*photo carousel first time effect | index.html ---------------------------------------------------*/
    $(function () {
        var item = $("#photoCarousel .item");
        item.removeClass('first-time');
    });

}


if(location.pathname.indexOf('index2') > -1){
    /* week-best carousel(lightslider) | index2.html |  */
    $(document).ready(function() {
        $('#week-best').lightSlider({
            autoWidth:true,
            loop:true,
            item: 5,
            slideMove: 1, // slidemove will be 1 if loop is true
            slideMargin: 10,

            addClass: '',
            mode: "slide",
            useCSS: true,
            cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
            easing: 'linear', //'for jquery animation',////

            speed: 2000, //ms'
            auto: true,
            slideEndAnimation: true,
            pause: 4000,
            keyPress: true,
            controls: true,
            prevHtml: '',
            nextHtml: '',
            rtl:true,
            pager: false,
            enableTouch:true,
            enableDrag:true,
            freeMove:false,
            // swipeThreshold: 40,

            responsive : [
                {
                    breakpoint:962,
                    settings: {
                        item:4,
                        slideMove:1,
                        slideMargin:6
                    }
                },
                {
                    breakpoint:700,
                    settings: {
                        item:3,
                        slideMove:1,
                        slideMargin:6
                    }
                },
                {
                    breakpoint:500,
                    settings: {
                        item:2,
                        slideMove:1
                    }
                },
                {
                    breakpoint:400,
                    settings: {
                        item:1,
                        slideMove:1
                    }
                }
            ]
        });

        $('.cat-select').select2();
    });

    var inview = new Waypoint.Inview({
        element: $('.cover-bot')[0],
        // enter: function(direction) {
        //     $('.right-animate-1').css({"display":"block" ,"opacity":"1", "right":"45px", "bottom":"195px"});
        //     $('.right-animate-2').css({"display":"block" ,"opacity":"1", "right":"135px", "bottom":"95px"});
        // },
        entered: function(direction) {
            $('.right-animate-1').css({"display":"block" ,"opacity":"1", "right":"45px", "bottom":"195px"});
            $('.right-animate-2').css({"display":"block" ,"opacity":"1", "right":"135px", "bottom":"95px"});
        }
        // exit: function(direction) {
        //     $('.right-animate-1').css({"display":"block" ,"opacity":"1", "right":"-200px", "bottom":"-50px"});
        //     $('.right-animate-2').css({"display":"block" ,"opacity":"1", "right":"-230px", "bottom":"-80px"});
        // },
        // exited: function(direction) {
        //     $('.right-animate-1').css({"display":"none" ,"opacity":"0", "right":"-200px", "bottom":"-50px"});
        //     $('.right-animate-2').css({"display":"none" ,"opacity":"0", "right":"-230px", "bottom":"-80px"});
        // }
    });
}


if(location.pathname.indexOf('contact') > -1){
    $(document).ready(function() {
        $('.form-holder .form-group input').css({"display":"block" ,"opacity":"1", "width":"100%", "padding": "6px 12px",
        "height":"34px"});
        $('.form-group textarea').css({"opacity":"1", "width":"100%", "padding": "6px 12px"});
        $('.contact-info').css({"opacity":"1"});
        $('.form-holder h4').css({"opacity" : "1"});
        $('.form-holder .btn-custom-link3').css({"opacity" : "1"});
    });
}

if(location.pathname.indexOf('about') > -1){
    $(document).ready(function() {
        $('.cct1').css({"opacity":"1"});
        $('.cct2').css({"opacity":"1"});
        $('.cct3').css({"opacity":"1"});
        $('.cc1').css({"opacity":"1"});
        $('.cc2').css({"opacity":"1"});
        $('.cc3').css({"opacity":"1"});
    });
}









