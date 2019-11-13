$(document).ready(function () {
    $("input.form__input").on('input keyup', function () {
        if ($(this).val() !== "") {
            $(this).parent().find(".form__label").addClass("form__label_hide");
        } else {
            $(this).parent().find(".form__label").removeClass("form__label_hide");
        }
    });

    $(".form__input").focusin(function () {
        $(this).addClass("form__input_active-valid");
    });
});
