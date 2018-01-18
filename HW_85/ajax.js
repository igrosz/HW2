(function () {
    "use strict";
    function get(id) {
        return document.getElementById(id);
    }
    var div = get("theDiv");
    var img = get("img");
    var request = new XMLHttpRequest();
    img.hide();
    get('load').addEventListener('click', function () {
        img.show();

        request.onreadystatechange = function (event) {

            if (request.readyState === 4) {
                if (request.status < 400) {
                    img.hide();
                    div.text(request.responseText);
                } else {
                    alert("OOPS" + request.statusText);
                }
            }
        };

        request.open('GET', get('file').value);
        request.send();
    });

    /*setTimeout(function () {
        alert(request.responseText);
    }, 2000);*/
}());