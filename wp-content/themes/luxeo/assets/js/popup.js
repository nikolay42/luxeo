$(document).ready(function () {
    $(".popup__btn-close").click(function () {
        $(this).parent().parent().removeClass("popup_show");
    });

    $(".btn-popup__communications").click(function () {
        $("#popup__communications").addClass("popup_show");
    });
});
