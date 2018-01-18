/*global $ */
(function () {
    "use strict";
    var img = $("#img");
    var div = $("#theDiv");
    img.hide();
    $("#load").click(function () {
        img.show();
        var fileName = $("#file").val();
        setTimeout(function () {
            $.get(fileName, function (loadedData) {
                img.hide();
                div.text(loadedData);
            }).fail(function (xhr, statusCode, statusText) {
                img.hide();
                div.text("error: " + statusText);
            });
        }, 5000);


    });
}());