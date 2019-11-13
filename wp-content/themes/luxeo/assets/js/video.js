$(document).ready(function () {
    $(".video .video__button").click(function (e) {
        $(this).parent().parent().find(".video__player")[0].play();
        $(this).parent().parent().find(".video__player").attr("controls", "");
        $(this).parent().addClass("video__button-container_hiden");
        return false;
    });

    $(".video .video__player").on("ended pause", function (e) {
        $(this).removeAttr("controls");
        $(this).parent().find(".video__button-container").removeClass("video__button-container_hiden");
    });
});
