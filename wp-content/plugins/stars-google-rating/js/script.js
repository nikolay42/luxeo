jQuery(document).ready(function ($) {
    var selector = "#google-rating-element";
    var id = $(selector).data('id');
    var enabled = $(selector).data("enabled");
    var value = $(selector).data("value");
    $(selector).starRating({
        readOnly: enabled !== 1,
        initialRating: value,
        useGradient: false,
        starSize: 24,
        useFullStars: true,
        hoverColor: '#f39200',
        ratedColor: '#f8ea18',
        callback: function (currentRating, $el) {
            $.ajax({
                url: googleRatingOptions.ajaxurl,
                type: 'post',
                data: {
                    action: 'google-rating-vote',
                    rating: currentRating,
                    id: id,
                    nonce: googleRatingOptions.nonce
                },
                success: function (data) {
                    $("#google-rating-element-hint").html(data);
                }
            })
        }
    });
});