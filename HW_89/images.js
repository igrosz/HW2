/*global $ */
(function () {
    "use strict";
    var i = 0;

    $.getJSON("images.json", function (imageList) {

        var imageElem = $("div img"),
            titleElem = $("div h3"),
            prevButton = $("#prev"),
            nextButton = $("#next"),
            auto = $("#auto");




        imageElem.attr('src', imageList[i].url);
        titleElem.text(imageList[i].title);

        nextButton.click(function () {
            if (i < 2) {
                i++;
            }
            else {

                i = 0;
            }


            imageElem.attr('src', imageList[i].url);
            titleElem.text(imageList[i].title);
        });
        prevButton.click(function () {

            i--;
            imageElem.attr('src', imageList[i].url);
            titleElem.text(imageList[i].title);
        });

        /*auto.addEventListener('click', function () {
            auto.innerHTML = startString;
            if (auto.innerHTML === startString) {
                intervalId = setInterval(i++, 500);
                auto.innerHTML = stopString;

            } else {
                clearInterval(intervalId);
                auto.innerHTML = startString;

            }

        });*/
    });
}());