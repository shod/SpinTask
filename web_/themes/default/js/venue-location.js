 function initMap() {
"use strict";

        var locations = [

            {
                lat: 23.0199968,
                lng: 72.2995501,
                icon: 'images/map-pin.png',
                image: 'images/vendor-img-1.jpg',
                //url: 'https://www.mywedding-detail.com/',
                title: 'Wedding Wendor Heading 1',
                address: 'Ahmedabad, Gujarat.',
            },

            {
                lat: 21.1591857,
                lng: 72.7522562,
                icon: 'images/map-pin.png',
                image: 'images/vendor-img-2.jpg',
                //url: 'https://www.whatsapp.com/',
                title: 'Wedding Wendor Heading 2',
                address: 'Surat, Gujarat.',
            },

            {
                lat: 22.2734719,
                lng: 70.7512564,
                icon: 'images/map-pin.png',
                image: 'images/vendor-img-3.jpg',
                //url: 'https://www.instagram.com/',
                title: 'Wedding Wendor Heading 3',
                address: 'Rajkot, Gujarat.',
            },

            {
                lat: 22.3220876,
                lng: 73.1030463,
                icon: 'images/map-pin.png',
                image: 'images/vendor-img-3.jpg',
                //url: 'https://www.twitter.com/',
                title: 'Wedding Wendor Heading 4',
                address: 'Vadodara, Gujarat.',
            },

            {
                lat: 20.3804984,
                lng: 72.8788827,
                icon: 'images/map-pin.png',
                image: 'images/vendor-img-1.jpg',
                //url: 'https://www.google.com/',
                title: 'Wedding Wendor Heading 5',
                address: 'Vapi, Gujarat.',
            },

            {
                lat: 21.76383,
                lng: 72.1198866,
                icon: 'images/map-pin.png',
                image: 'images/vendor-img-2.jpg',
                // url: 'https://www.facebook.com/',
                title: 'Wedding Wendor Heading 6',
                address: 'Bhavnagar, Gujarat.',
            }
        ]

        var map = new google.maps.Map(document.getElementById('map_wrapper'), {
            zoom: 7,
            center: { lat: 22.4013444, lng: 69.0759347 }

        });

        var allMyMarkers = [];

        var infoWin = new google.maps.InfoWindow();

        locations.map(function(location, i) {

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(location.lat, location.lng),
                map: map,
                icon: location.icon,
                id: i
            });

            var link_6e = check_karo_null_6e(location.url) ? location.url : window.location;

            var title = check_karo_null_6e(location.title) ? '<h2 class="vendor-title"><a href="' + link_6e + '" class="title">' + location.title + '</a></h2>' : '';

            var image_6e = check_karo_null_6e(location.image) ? '<a href="' + link_6e + '"><img src="' + location.image + '" alt="" class="img-fluid"></a>' : '';

            var address = check_karo_null_6e(location.address) ? '<p class="vendor-address">' + location.address + '</p>' : '';

            var content = '<div class="">' +
                '<div class="vendor-img">' +
                image_6e +
                '<div class="wishlist-sign">' +
                '<a href="' + link_6e + '" class="btn-wishlist"><i class="fa fa-heart"></i></a>' +
                '</div>' +
                '</div>' +
                '<div class="vendor-content">' +
                title + location.address +
                '</div>';


            google.maps.event.addListener(marker, 'click', function(evt) {
                infoWin.setContent(content);
                infoWin.open(map, marker);
            })

            allMyMarkers.push(marker);

            return marker;

        });



        function check_karo_null_6e($args) {

            if ($args != '' && $args != null && $args != 'undefined')
                return true;

            else
                return false;
        }

        if ($('.RealWed').length) {

            $('.RealWed').on('mouseover', function() {

                var selectedID = $(this).attr('id');
                toggleBounce(selectedID);
            });

            function toggleBounce(selectedID) {

                var pinID = selectedID.split('_');

                for (var j = 0; j < allMyMarkers.length; j++) {

                    if (allMyMarkers[j].id == pinID[1]) {

                        if (allMyMarkers[j].getAnimation() != null) {

                            allMyMarkers[j].setAnimation(null);

                        } else {

                            allMyMarkers[j].setAnimation(google.maps.Animation.BOUNCE);
                            map.setCenter(allMyMarkers[j].getPosition());

                        }
                        break;
                    }
                }
            }
        }
    }