var radius_circle, loct;
var markerLokasiLain = [];
var loct;
// console.log(loct);

var map, infoWindow,geocoder,marker,accuracyStatus;
var output = document.getElementById("output");
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 7,
        center: {lat: 0.3439242, lng:102.3072246},
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    infowindow = new google.maps.InfoWindow();

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            if(position.coords.accuracy<100){
                accuracyStatus = '<strong style="color:green;"><span class="glyphicon glyphicon-ok"></span>Akurasi : "+position.coords.accuracy.toFixed(2)+" m (Bagus)</strong>';
            }
            else{
                accuracyStatus = '<strong style="color:red;"><span class="glyphicon glyphicon-warning-sign"></span>Akurasi : "+position.coords.accuracy.toFixed(2)+" m (Lemah)</strong>';
            }
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
            };
            geocoder = new google.maps.Geocoder();
            geocoder.geocode({'latLng': pos}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setZoom(15);
                    map.setCenter(pos);
                    marker = new google.maps.Marker({
                        position: pos,
                        map: map,
                        animation: google.maps.Animation.BOUNCE,
                    });
                    var infowindowText = "<div class='text-center'><strong>Posisi Saat Ini </strong>" +
                        results[3].formatted_address +
                        "Lat : " + pos.lat.toFixed(5)+ " |  Long : " + pos.lng.toFixed(5)+
                        accuracyStatus +
                        +"</strong></div>";
                    infowindow.setContent(infowindowText);
                    infowindow.open(map, marker);
                    marker.addListener('click',function() {
                        infowindow.open(map,marker);

                    });

                    output.innerHTML = results[0].formatted_address+
                        "Latitude : <span id='latitude'>"+pos.lat+"</span>"+
                        "Longitude : <span id='longitude'>"+pos.lng+"</span>";
                }

            });
        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        handleLocationError(false, infoWindow, map.getCenter());
    }


}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        '<span class="alert alert-danger">Error: The Geolocation service failed.</span>' :
        '<span class="alert alert-danger">Error: Your browser doesn\'t support geolocation.</span>');
    infoWindow.open(map);


}
function getRadius(){

    var i;
    var radius_km = Number(50);
    var lat = Number($("#latitude").text());
    var lng = Number($("#longitude").text());
    var pos = {
        lat: lat,
        lng: lng,
    };

    const iconBase =
        "/assets/images/marker/";
    const icons = {
        Baik: {
            icon: iconBase + "baik/",
        },
        Rusak: {
            icon: iconBase + "rusak/",
        },
        Hilang: {
            icon: iconBase + "hilang/",
        },
        Kebutuhan: {
            icon: iconBase + "kebutuhan/",
        },
    };
    if (radius_circle) {
        radius_circle.setMap(null);
        radius_circle = null;
    }
    for (i = 0; i < markerLokasiLain.length; i++) {
        if (markerLokasiLain[i]) {
            markerLokasiLain[i].setMap(null);
            markerLokasiLain[i] = null;
        }
    }

    map.setZoom(14);
    geocoder.geocode({'latLng': pos}, function(results, status) {
        var address_lat_lng = results[0].geometry.location;
        radius_circle = new google.maps.Circle({
            center: { lat: lat, lng:lng },
            strokeColor: '#2980b9',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#34495e',
            fillOpacity: 0.35,
            radius: radius_km ,
            clickable: false,
            map: map,
        });

        if (radius_circle) map.fitBounds(radius_circle.getBounds());

        $.ajax({
            url: '/peta/perlengkapan2',
            type: 'get',
            dataType: 'json',
            success: function (es) {
                loct = es;
                for (var j = 0; j < Object.keys(loct).length; j++) {
                    (function (loct) {
                        console.log(loct)
                        var marker_lat_lng = new google.maps.LatLng(loct.lat, loct.lng);
                        var distance_from_location = google.maps.geometry.spherical.computeDistanceBetween(address_lat_lng, marker_lat_lng);
                        var formatJarak;
                        if (distance_from_location <= radius_km * 1000) {
                            if (distance_from_location <= 1000) {
                                formatJarak = distance_from_location.toFixed(2)+" Meter";
                            }else {
                                formatJarak = (distance_from_location / 1000).toFixed(2)+" Kilometer";
                            }

                            const contentString='<div class="panel panel-map-location" style="max-width: 250px">\n' +
                                '             <img style="width: 250px" src="/assets/admin/images/image.png" class="width80" alt="Company Logo">\n' +
                                '              <div class="panel-body">\n' +
                                '                <div class="media">\n' +
                                '                  <div class="media-body">\n' +
                                '                    <address>\n' +
                                '                      <center><small><b>'+loct.jenis+'</b></small></center>\n' +
                                '                      <h6 class="mt0"><center>'+loct.name+'</center></h6>\n' +
                                '                      ' +
                                '                      <b>Ruas Jalan : </b>'+loct.ruas+'<br>\n' +
                                '                      <b>Kondisi : </b>'+loct.kondisi+'<br>\n' +
                                '                      <b>Posisi : </b>'+loct.posisi+'<br>\n' +
                                '                    </address>\n' +
                                '                  </div><!-- media-body -->\n' +
                                '                </div><!-- media -->\n' +
                                '\n' +
                                '                <div class="btn-group pull-left">\n' +
                                '                  <a href="/pengaduan/baru/'+loct.id+'"><button class="btn btn-primary" type="button"><i class="fa fa-phone mr5"></i> Laporkan</button></a>\n' +

                                '                </div>\n' +
                                '\n' +
                                '                <div class="btn-group pull-right">\n' +
                                '                  <a href="/peta/detailperkap/'+loct.id+'"><button class="btn btn-success" type="button"><i class="fa fa-star mr5"></i> Details</button>\n' +
                                '                </div>\n' +
                                '\n' +
                                '              </div><!-- panel-body -->\n' +
                                '            </div><!-- panel -->\n';
                            var new_marker = new google.maps.Marker({
                                position: marker_lat_lng,
                                map: map,
                                icon: icons[es[i].type].icon + es[i].icon+'.png',
                                title: loct.name,

                            });
                            google.maps.event.addListener(new_marker, 'click', function () {
                                if(infowindow){
                                    infowindow.setMap(null);
                                    infowindow = null;
                                }
                                alert('Perlengkapan Terpilih');
                                $("#id_perl").val(loct.id)
                                infowindow = new google.maps.InfoWindow({
                                    content: contentString,
                                    size: new google.maps.Size(150,50),

                                    pixelOffset: new google.maps.Size(0, -30),
                                    position: marker_lat_lng, map: map
                                });
                            });
                            // markerLokasiLain.push(new_marker);
                        }
                    })(loct[j]);
                }
            }
        })

    });
}
