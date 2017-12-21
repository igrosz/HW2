/*global $*/
(function () {
    "use strict";

    var videoElem = $('#video');


    $('input[name="video"]').change(function (event) {
        $.getJSON(this.value + ".json", function (loadedvideo) {

            videoElem.attr('src', loadedvideo.url);
            //$('#video')[0].play()

        });
    });
    videoElem[0].play();
}());