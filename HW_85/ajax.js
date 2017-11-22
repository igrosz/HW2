/*global $ */
(function () {
    "use strict";
    $("#img").hide();
    $("#load").click(function () {
        $("#img").show();

        var fileName = $("#file").val();

        $.get(fileName, function (loadedData) {
            $("#img").hide();
            $("#theDiv").text(loadedData);
        }).fail(function (xhr, statusCode, statusText) {
            $("#img").hide();
            $("#theDiv").text("error: " + statusText);

        });
    });
}());