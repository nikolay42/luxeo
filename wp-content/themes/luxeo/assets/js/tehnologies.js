$(document).ready(function () {
    if ($(window).width() >= 768) {
        [].forEach.call(document.querySelectorAll(".screen11__description"), function (e) {
            $(e).css({
                "bottom": ($(e).parent().innerHeight() + 13)
            })
        });
    }

    $(".screen11 .screen11__btn-next").click(function () {
        if ($(window).width() < 768) {
            let cur = $(this).parent().find(".screen11__techn.screen11__techn_cur");
            if (cur.next().is(".screen11__techn")) {
                cur.next().addClass("screen11__techn_cur");
            } else {
                $(this).parent().find(".screen11__techn").first().addClass("screen11__techn_cur");
            }
            cur.removeClass("screen11__techn_cur");
        }
    });

    $(".screen11 .screen11__btn-prev").click(function () {
        if ($(window).width() < 768) {
            let cur = $(this).parent().find(".screen11__techn.screen11__techn_cur");
            if (cur.prev().is(".screen11__techn")) {
                cur.prev().addClass("screen11__techn_cur");
            } else {
                $(this).parent().find(".screen11__techn").last().addClass("screen11__techn_cur");
            }
            cur.removeClass("screen11__techn_cur");
        }
    });
});
