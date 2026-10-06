
// var latitude = position.coords.latitude;
// var longitude = position.coords.longitude;
// var latlongvalue = position.coords.latitude + ","
//     + position.coords.longitude;
// function initMap() {
//     const latitude  = -7.3932652;
//     const longitude = 109.7097441;
//     const mapZoom   = 15;
//
//     const mapOptions = {
//         center    : new google.maps.LatLng(latitude, longitude),
//         zoom      : mapZoom,
//         mapTypeId : google.maps.MapTypeId.ROADMAP,
//         styles: [{
//             'featureType': 'landscape',
//             'stylers': [
//                 { 'hue'        : '#FFBB00' },
//                 { 'saturation' : 43.400000000000006 },
//                 { 'lightness'  : 37.599999999999994 },
//                 { 'gamma'      : 1 },
//             ],
//         }, {
//             'featureType': 'road.highway',
//             'stylers': [
//                 { 'hue'        : '#FFC200' },
//                 { 'saturation' : -61.8 },
//                 { 'lightness'  : 45.599999999999994 },
//                 { 'gamma'      : 1 },
//             ],
//         }, {
//             'featureType': 'road.arterial',
//             'stylers': [
//                 { 'hue'        : '#FF0300' },
//                 { 'saturation' : -100 },
//                 { 'lightness'  : 51.19999999999999 },
//                 { 'gamma'      : 1 },
//             ],
//         }, {
//             'featureType': 'road.local',
//             'stylers': [
//                 { 'hue'        : '#FF0300' },
//                 { 'saturation' : -100 },
//                 { 'lightness'  : 52 },
//                 { 'gamma'      : 1 },
//             ],
//         }, {
//             'featureType': 'water',
//             'stylers': [
//                 { 'hue'        : '#0078FF' },
//                 { 'saturation' : -13.200000000000003 },
//                 { 'lightness'  : 2.4000000000000057 },
//                 { 'gamma'      : 1 },
//             ],
//         }, {
//             'featureType': 'poi',
//             'stylers': [
//                 { 'hue'        : '#00FF6A' },
//                 { 'saturation' : -1.0989010989011234 },
//                 { 'lightness'  : 11.200000000000017 },
//                 { 'gamma'      : 1 },
//             ],
//         }],
//     };
//     const map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
//
//     new google.maps.Marker({
//         map,
//         position : locations,
//         visible  : true,
//     });
// }


// function initMap() {
//     const map = new google.maps.Map(document.getElementById("google-map"), {
//         zoom: 15,
//         center: { lat: -7.3932652, lng: 109.7097441 },
//     });
//     // Create an array of alphabetical characters used to label the markers.
//     const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
//     // Add some markers to the map.
//     // Note: The code uses the JavaScript Array.prototype.map() method to
//     // create an array of markers based on a given "locations" array.
//     // The map() method here has nothing to do with the Google Maps API.
//
//     const markers = locations.map((location, i) => {
//         return new google.maps.Marker({
//             position: location,
//             map: map,
//             label:'l',
//         });
//     });
//     // Add a marker clusterer to manage the markers.
//     new MarkerClusterer(map, markers, {
//         imagePath:
//             "http://192.168.1.23.8080/assets/images/marker/baik/pju.png",
//     });
// }

let map;

function initMap() {
    map = new google.maps.Map(document.getElementById("google-map"), {
        zoom: 15,
        center: { lat: -7.3932652, lng: 109.7097441 },
    });
    const iconBase =
        "http://192.168.1.23:8080/assets/images/marker/";
    const icons = {
        parking: {
            icon: iconBase + "baik/pju.png",
        },
        library: {
            icon: iconBase + "baik/rambu.png",
        },
        info: {
            icon: iconBase + "baik/tl.png",
        },
    };

    // const locations = [
    //     { lat: -7.3932652, lng: 109.7097441 },
    //     { lat: -7.4000192, lng: 109.7097470 },
    //     { lat: -7.3597778, lng: 109.8008378 },
    //     { lat: -7.3932652, lng: 109.7510099 },
    //     { lat: -7.718234, lng: 109.363181 },
    //     { lat: -7.727111, lng: 109.371124 },
    // ];
    const features = [
        {
            position: new google.maps.LatLng(-7.3932652, 109.7097441),
            type: "info",
        },
        {
            position: new google.maps.LatLng(-7.4000192, 109.7097470),
            type: "info",
        }
    ];

    // Create markers.
    for (let i = 0; i < features.length; i++) {

        const contentString =
            '<div id="content">' +
            '<div id="siteNotice">' +
            "</div>" +
            '<h6 id="sixthHeading" class="sixthHeading text-center">Header</h6>' +
            '<div id="bodyContent">' +
            "<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large " +
            "sandstone rock formation in the southern part of the " +
            "Heritage Site.</p>" +
            '<p class="text-center"> <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
            "https://en.wikipedia.org/w/index.php?title=Uluru</a> " +
            "(last visited June 22, 2009).</p>" +
            "</div>" +
            "</div>";
        const infowindow = new google.maps.InfoWindow({
            content: contentString,
            maxWidth: 300,
        });
        const marker = new google.maps.Marker({
            position: features[i].position,
            icon: icons[features[i].type].icon,
            map: map,
        });
        marker.addListener("click", () => {
            console.log(marker.position)
            infowindow.setPosition(marker.position)
            infowindow.open(map, marker);
        });
    }
}
