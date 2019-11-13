$(document).ready(function () {
    [].forEach.call(document.querySelectorAll(".big-slide"), function (sl) {
        if ($(window).width() >= 768) {
            $(sl).css({
                "padding-bottom": ($(sl).find(".big-slide__img").length <= 0 ? -55 : $(sl).find(".big-slide__img").height()) + $(sl).find(".big-slide__links").height() + 55
            });
        } else {
            $(sl).removeAttr("style");
        }
    });

    $(window).resize(function () {
        [].forEach.call(document.querySelectorAll(".big-slide"), function (sl) {
            if ($(window).width() >= 768) {
                $(sl).css({
                    "padding-bottom": ($(sl).find(".big-slide__img").length <= 0 ? -55 : $(sl).find(".big-slide__img").height()) + $(sl).find(".big-slide__links").height() + 55
                });
            } else {
                $(sl).removeAttr("style");
            }
        });
    });

    $(".slider-btns .slider-btns__btn_prev").click(function () {
        if ($(this).parent().parent().find(".slides").hasClass("slides_no-animate")) {
            $(this).parent().parent().find(".slides .slides__container .slide").eq(0).appendTo($(this).parent().parent().find(".slides .slides__container"));
        } else {
            $(this).parent().parent().find(".slides .slides__container").css({
                "left": 0
            });

            if ($(this).parent().parent().find(".slider-nav").length > 0) {
                var cur = $(this).parent().parent().find(".slider-nav .slider-nav__btn.slider-nav__btn_cur");
                if ($(this).parent().parent().find(".slider-nav .slider-nav__btn").index($(this).parent().parent().find(".slider-nav .slider-nav__btn.slider-nav__btn_cur")) != 0) {
                    cur.prev().addClass("slider-nav__btn_cur");
                    cur.removeClass("slider-nav__btn_cur");
                } else {
                    $(this).parent().parent().find(".slider-nav .slider-nav__btn").eq($(this).parent().parent().find(".slider-nav .slider-nav__btn").length - 1).addClass("slider-nav__btn_cur");
                    cur.removeClass("slider-nav__btn_cur");
                }
            }

            $(this).parent().parent().find(".slides .slides__container").animate({
                "left": -($(this).parent().parent().find(".slides .slides__container .slide").width())
            }, 300, function () {
                $(this).parent().parent().find(".slides .slides__container .slide").eq(0).appendTo($(this).parent().parent().find(".slides .slides__container"));

                $(this).parent().parent().find(".slides .slides__container").css({
                    "left": 0
                });
            });
        }
        return false;
    });

    $(".slider-btns .slider-btns__btn_next").click(function () {
        if ($(this).parent().parent().find(".slides").hasClass("slides_no-animate")) {
            $(this).parent().parent().find(".slides .slides__container .slide").last().prependTo($(this).parent().parent().find(".slides .slides__container"));
        } else {
            $(this).parent().parent().find(".slides .slides__container .slide").last().prependTo($(this).parent().parent().find(".slides .slides__container"));
            if ($(this).parent().parent().find(".slider-nav").length > 0) {
                var cur = $(this).parent().parent().find(".slider-nav .slider-nav__btn.slider-nav__btn_cur");
                if ($(this).parent().parent().find(".slider-nav .slider-nav__btn").index($(this).parent().parent().find(".slider-nav .slider-nav__btn.slider-nav__btn_cur")) < $(this).parent().parent().find(".slider-nav .slider-nav__btn").length - 1) {
                    cur.next().addClass("slider-nav__btn_cur");
                    cur.removeClass("slider-nav__btn_cur");
                } else {
                    $(this).parent().parent().find(".slider-nav .slider-nav__btn").first().addClass("slider-nav__btn_cur");
                    cur.removeClass("slider-nav__btn_cur");
                }
            }

            $(this).parent().parent().find(".slides .slides__container").css({
                "left": -($(this).parent().parent().find(".slides .slides__container .slide").width())
            });


            $(this).parent().parent().find(".slides .slides__container").animate({
                "left": 0
            }, 300);
        }
        return false;
    });

    $(".bookmark__control .bookmark__btn-prev").click(function () {
        $(this).parent().find(".bookmark__mark").first().appendTo($(this).parent().find(".bookmark__marks"));

        var cur = $(this).parent().find(".bookmark__mark.bookmark__mark_cur");
        cur.next().addClass("bookmark__mark_cur");
        cur.removeClass("bookmark__mark_cur");

        $(this).parent().parent().find(".bookmark__block").first().appendTo($(this).parent().parent().find(".bookmark__content"));

        cur = $(this).parent().parent().find(".bookmark__block.bookmark__block_cur");
        cur.next().addClass("bookmark__block_cur");
        cur.removeClass("bookmark__block_cur");
    });

    $(".bookmark__control .bookmark__btn-next").click(function () {
        $(this).parent().find(".bookmark__mark").last().prependTo($(this).parent().find(".bookmark__marks"));

        var cur = $(this).parent().find(".bookmark__mark.bookmark__mark_cur");
        cur.prev().addClass("bookmark__mark_cur");
        cur.removeClass("bookmark__mark_cur");

        $(this).parent().parent().find(".bookmark__block").last().prependTo($(this).parent().parent().find(".bookmark__content"));

        cur = $(this).parent().parent().find(".bookmark__block.bookmark__block_cur");
        cur.prev().addClass("bookmark__block_cur");
        cur.removeClass("bookmark__block_cur");
    });
});
