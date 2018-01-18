/*global google, $ 
function initMap() {
    "use strict";

    var location = { lat: -34.397, lng: 150.644 },
        map = new google.maps.Map(
            document.getElementById('map'),
            {
                center: location,
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.SATELLITE
            }
        ),
        tagInput = $('#tag'),
        numResultsInput = $('#numResults'),
        theList = $('#sidebar ul'),
        infoWindow = new google.maps.InfoWindow({
            maxWidth: 250
        }),
        drawing = new google.maps.drawing.DrawingManager({ map: map, }),
        markers = [];

    $('#go').click(function () {
        $.getJSON('http://api.geonames.org/wikipediaSearch?callback=?',
            {
                q: tagInput.val(),
                maxRows: numResultsInput.val(),
                username: 'slubowsky',
                type: 'json'
            },
            function (data) {
                var bounds = new google.maps.LatLngBounds();

                data.geonames.forEach(function (place) {
                    var location = { lat: place.lat, lng: place.lng },
                        marker = new google.maps.Marker({
                            position: location,
                            map: map,
                            title: place.title,
                            icon: place.thumbnailImg ? {
                                url: place.thumbnailImg,
                                scaledSize: new google.maps.Size(50, 50)
                            } : null
                        });

                    bounds.extend(location);

                    marker.addListener('click', function () {
                        infoWindow.setContent(place.summary + '<br><a target="_blank" href="http://' + place.wikipediaUrl + '">Wikipedia</a>');
                        infoWindow.open(map, marker);
                    });

                    $('<li><img src="' + (place.thumbnailImg || 'default.png') + '"/>' + place.title + '</li>')
                        .appendTo(theList)
                        .click(function () {
                            map.panTo(location);
                            map.setZoom(15);
                        });
                });

                map.fitBounds(bounds);

            });
    });
    $('#clear').click(function () {
        forEach.markers function(marker)
        marker.setMap(null);
    })
}
*/