$(document).ready(function () {
    setInterval(function () {
    [].forEach.call(document.querySelectorAll(".timer"), function (timer) {
            let sec = parseInt($(timer).find(".timer__second").html());

            if (sec == 0) {
                sec = 59;
                let min = parseInt($(timer).find(".timer__minute").html());

                if (min == 0) {
                    min = 59;
                    let hour = parseInt($(timer).find(".timer__hour").html());

                    if (hour == 0) {
                        hour = 23;
                        let day = parseInt($(timer).find(".timer__day").html());

                        if (day == 0) {
                            sec = 0;
                            min = 0;
                            hour = 0;
                            day = 0;
                        } else {
                            day--;
                        }
                        $(timer).find(".timer__day").html(day <= 9 ? ("0" + day) : day);
                    } else {
                        hour--;
                    }
                    $(timer).find(".timer__hour").html(hour <= 9 ? ("0" + hour) : hour);
                } else {
                    min--;
                }
                $(timer).find(".timer__minute").html(min <= 9 ? ("0" + min) : min);
            } else {
                sec--;
            }
            $(timer).find(".timer__second").html(sec <= 9 ? ("0" + sec) : sec);
        });
    }, 1000);
});
