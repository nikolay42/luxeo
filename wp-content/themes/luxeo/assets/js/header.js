$(document).ready(function () {

    $(document).scroll(function (e) {
        if ($(document).scrollTop() != 0 && !$(".header").hasClass("header_scroll")) {
            $(".header").addClass("header_scroll");
            $(".header").find(".menu__drop_show").removeClass("menu__drop_show");
        } else if ($(document).scrollTop() == 0 && $(".header").hasClass("header_scroll")) {
            $(".header").removeClass("header_scroll");
            $(".header").removeClass("header_show");
        }
    });

    $(".header__menu-btn").click(function () {
        if ($(".header").hasClass("header_show")) {
            $(".header").removeClass("header_show");
            $(".header").find(".menu__drop_show").removeClass("menu__drop_show");
            $("body").css({
                "overflow": "auto"
            });
        } else {
            $(".header").addClass("header_show");
            if ($(window).width() <= 768) {
                $("body").css({
                    "overflow": "hidden"
                });
            }
        }
    });

    $(".menu .menu__button.menu__button_drop").click(function () {
        if ($(this).find(".menu__drop").hasClass("menu__drop_show")) {
            $(this).find(".menu__drop").removeClass("menu__drop_show");
        } else {
            $(".header").find(".menu__drop_show").removeClass("menu__drop_show");
            $(this).find(".menu__drop").addClass("menu__drop_show");
        }
        return false;
    });

    $(".menu .menu__button.menu__button_more").click(function () {
        if ($(this).find(".menu__drop").hasClass("menu__drop_show")) {
            $(this).find(".menu__drop").removeClass("menu__drop_show");
        } else {
            $(".header").find(".menu__drop_show").removeClass("menu__drop_show");
            $(this).find(".menu__drop").addClass("menu__drop_show");
        }
        return false;
    });

    $(".menu .menu__more-title").click(function () {
        if ($(window).width() <= 768) {
            if ($(this).parent().hasClass("menu__more-block_show")) {
                $(this).parent().removeClass("menu__more-block_show");
            } else {
                $(".header").find(".menu__more-block_show").removeClass("menu__more-block_show");
                $(this).parent().addClass("menu__more-block_show");
            }
        }
    });
});
