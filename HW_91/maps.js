/*global google */
(function () {
    "use strict";
    var location2 = { lat: -34.397, lng: 150.644 },
        map = new google.maps.Map(
            document.getElementById('map'),
            {
                center: location2,
                zoom: 8
            }
        );
    $.getJSON("http://api.geonames.org/wikipediaSearch?q=yeshiva&maxRows=10&username=slubowsky&type=json&callback=?", function (loadedInfo) {
        loadedInfo.geonames.forEach(function (place) {
            var location = { lat: place.lat, lng: place.lng };
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
        });
    });


}());
