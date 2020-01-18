$('ul.nav li.drop-li-lvl1').on("click", function () {
    var el = $(this);
    if (el.hasClass("opened")) {
        el.find('.drop-ul-lvl2').stop(true, true).css({
            "top": "200%", "transform": "scale(.5)", "opacity": "0"
        });
        el.find('.up-caret1').css({"opacity": "0"});
        el.find('.drop-ul-lvl2').delay(50).stop(true, true).fadeOut(300);

        el.removeClass("opened");

    } else {
        el.siblings('li').find('.drop-ul-lvl2').stop(true, true).css({
            "top": "200%", "transform": "scale(.5)", "opacity": "0"
        });
        el.siblings('li').find('.up-caret1').css({"opacity": "0"});
        el.siblings('li').find('.drop-ul-lvl2').delay(50).stop(true, true).fadeOut(300);
        el.siblings('li').removeClass("opened");

        el.find('.up-caret1').css({"opacity": "1"});
        el.find('.drop-ul-lvl2').stop(true, true).fadeIn(50);
        el.find('.drop-ul-lvl2').stop(true, true).css({
            "top": "100%", "opacity": "1", "transform": "scale(1)"
        });
        el.addClass("opened");
    }

});

/* search icon animation | header section -----------------------------------------------------------------*/
var clk = '';
$("#search").on("click", function () {
    clk = $(this).data("clk");
    if (clk) {
        $(this).find("i").css({"margin-left": "0"}).removeClass("fa-remove").addClass("fa-search");
        $(".ul-lvl1").find("li").css({"opacity": "1"});
        $("#search-input").css({"width": "0", "opacity": "0"});
        $(".search-option-holder").css({"opacity": "0"});
        if (screen.width < 1300 && screen.width > 767) {
            $("#main-nav .navbar-brand").css({"transition": "opacity .7s", "opacity": "1"});
        }
    } else {
        $(this).find("i").css({"margin-left": "5px"}).removeClass("fa-search").addClass("fa-remove");
        $(".ul-lvl1").find("li").css({"opacity": "0"});
        $("#search-input").css({"width": "84%", "opacity": "1"});
        $(".search-option-holder").css({"opacity": "1"});
        if (screen.width < 1300 && screen.width > 767) {
            $("#main-nav .navbar-brand").css({"transition": "opacity .7s", "opacity": "0"});
        }
    }
    $(this).data("clk", !clk);
});

/* search icon animation responsive mode | header section -------------------------------------------------*/
$("#search-res").on("click", function () {
    var clicked = $(this).data("clicked");

    if (clicked) {
        $(this).find("i").css({"margin-left": "0"}).removeClass("fa-remove").addClass("fa-search");
        if (screen.width <= 480) {
            $("#search-input-res").attr("placeholder", "تصویر مورد نظر را جستجو کنید...");
        }
        $("#search-input-res").css({"width": "0", "opacity": "0"});
        $(".search-option-holder-res").css({"opacity": "0", "left": "140px"});
        $("#main-nav .navbar-brand").css({"transition": "opacity .7s", "opacity": "1"});
        $("#srch-form-res").css({"opacity": "0"});
    } else {
        $(this).find("i").css({"margin-left": "5px"}).removeClass("fa-search").addClass("fa-remove");
        $("#search-input-res").css({"width": "80%", "opacity": "1"});
        if (screen.width > 480 && screen.width < 550) {
            $("#search-input-res").css({"width": "75%", "opacity": "1"});
        } else if (screen.width <= 480) {
            $("#search-input-res").css({"width": "65%", "opacity": "1"});
            $("#search-input-res").attr("placeholder", "جستجو تصویر...");
        }
        $(".search-option-holder-res").css({"opacity": "1", "left": "120px"});
        $("#main-nav .navbar-brand").css({"transition": "opacity .7s", "opacity": "0"});
        $("#srch-form-res").css({"opacity": "1"});
    }
    $(this).data("clicked", !clicked);
});