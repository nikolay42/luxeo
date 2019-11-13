$(document).ready(function () {
    $(".question .question__button").click(function () {
        if ($(this).parent().hasClass("question__block_full")) {
            $(this).parent().removeClass("question__block_full");
        } else {
            $(this).parent().addClass("question__block_full");
        }
    });
});
