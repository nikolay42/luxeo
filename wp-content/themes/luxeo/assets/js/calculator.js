let isHard = false;
let isMouseDown = false;
let startPosMove = 0;
let button;
let startPosButton = 0;
let visitors = 0,
    gain = 0,
    bill = 0,
    conv = 0;

$(document).ready(function () {
    $(".complexity .complexity__button").click(function () {
        isHard = !isHard;
        if (isHard) {
            $(this).parent().addClass("complexity_hard");
        } else {
            $(this).parent().removeClass("complexity_hard");
        }
    });
    //range script start
    $(".range .range__button").on("mousedown touchstart", function (e) {
        isMouseDown = true;
        startPosMove = e.pageX || e.originalEvent.touches[0].pageX;
        startPosButton = parseInt($(e.target).css("left"));
        button = e.target;
    });

    $(document).on("mousemove touchmove", function (e) {
        if (isMouseDown) {
            var pos = startPosButton - startPosMove + (e.pageX || e.originalEvent.touches[0].pageX);
            pos = pos < 0 ? 0 : pos;
            pos = pos > $(button).parent().width() ? $(button).parent().width() : pos;

            var input = $(button).parent().parent().find(".range__input");

            input.attr("value", parseInt((pos * (input.attr("max") - input.attr("min")) / $(button).parent().width() / input.attr("step")).toFixed(0) * input.attr("step")));

            pos = $(button).parent().parent().find(".range__input").attr("value") / (input.attr("max") - input.attr("min")) * ($(button).parent().width() - 35);
            pos = pos < 0 ? 0 : pos;
            pos = pos > $(button).parent().width() - 35 ? $(button).parent().width() - 35 : pos;

            $(button).css({
                left: pos
            });

            $(button).parent().find(".range__progress").css({
                "width": pos
            });
            $(button).parent().parent().find(".range__value span").html($(button).parent().parent().find(".range__input").attr("value"));
            if (window.getSelection) {
                window.getSelection().removeAllRanges();
            }

            buildChart();
        }
    });

    $(document).on("mouseup touchend", function (e) {
        isMouseDown = false;
    });
    //range script end

    $(window).resize(function () {
        buildChart();
    });
});

function buildChart() {
    visitors = parseInt($("#range-visitors").attr("value"));
    gain = parseInt($("#range-gain").attr("value"));
    bill = parseInt($("#range-bill").attr("value"));
    conv = parseInt($("#range-conv").attr("value"));

    let value = gain * 0 + visitors;
    let sec = $(".chart .chart__section").eq(0);
    let prevBot = 0;

    if (value >= 0 && value <= 100) {
        prevBot = sec.height() * 0.25 * value / 100;
    } else if (value > 100 && value <= 500) {
        prevBot = (sec.height() * 0.25) + (sec.height() / 4 * (value - 100) / 400);
    } else if (value > 500 && value <= 1000) {
        prevBot = (sec.height() * 0.5) + (sec.height() / 4 * (value - 500) / 500);
    } else if (value > 1000 && value <= 5000) {
        prevBot = (sec.height() * 0.75) + (sec.height() / 4 * (value - 1000) / 5000);
    }

    for (month = 1; month < 12; month++) {
        value = gain * month + visitors;

        let bot = 0;

        if (value >= 0 && value <= 100) {
            bot = sec.height() * 0.25 * value / 100;
        } else if (value > 100 && value <= 500) {
            bot = (sec.height() * 0.25) + (sec.height() / 4 * (value - 100) / 400);
        } else if (value > 500 && value <= 1000) {
            bot = (sec.height() * 0.5) + (sec.height() / 4 * (value - 500) / 500);
        } else if (value > 1000 && value <= 5000) {
            bot = (sec.height() * 0.75) + (sec.height() / 4 * (value - 1000) / 5000);
        } else {
            bot = sec.height();
        }

        $(".chart .chart__section").eq(month - 1).find(".chart__point").css({
            "bottom": bot - 1
        });
        $(".chart .chart__section").eq(month - 1).find(".chart__count-add > span").html(value);


        let lineWidth = Math.sqrt(Math.pow(sec.width(), 2) + Math.pow(bot - prevBot, 2));

        $(".chart .chart__section").eq(month - 1).find(".chart__line").css({
            "bottom": prevBot,
            "width": lineWidth,
            "transform": "rotate(-" + (Math.acos(sec.width() / lineWidth) * 180 / Math.PI) + "deg)"
        });

        prevBot = bot;
    }
    $("#calculator__profit > span").html(Math.trunc(value * bill * conv / 100));
    $("#calculator__visitors > span").html(gain);
}
