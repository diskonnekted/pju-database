navigator.geolocation.getCurrentPosition(showPosition);
var myloclat=0;
var mylng=0;
var mapdata;
var markers=[];
var url_string = window.location.href
var url = new URL(url_string);
var c = url.searchParams.get("jalan");
console.log(c);
function showPosition(position) {
    myloclat=position.coords.latitude;
    mylng=position.coords.longitude;
}
function initMap() {
    var myStyles =[
        {
            featureType: "poi",
            elementType: "labels",
            stylers: [
                { visibility: "off" }
            ]
        }
    ];
    if(myloclat==0){

        map = new google.maps.Map(document.getElementById("maps-baru"), {
            zoom: 13,
            center: { lat: -7.3932652, lng: 109.7097441 },
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: myStyles
        });
    }else {

        map = new google.maps.Map(document.getElementById("maps-baru"), {
            zoom: 13,
            center: {lat: myloclat, lng: mylng},
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: myStyles
        });
    }
    if (c==null){

        maps(0, 0);
    }else{

        maps(0, c);
    }
}

function setnull(id, ruas, mapdata){
    for (let i = 0; i < Object.keys(mapdata).length; i++) {

        markers[i].setMap(null);
    }
    markers = [];

    // Call set markers to re-add markers
    maps(id, ruas);
}
$('#setmaps').click(function (e){
    let ruas=$('#ruasjalans').val();
    let id=$('#jenis-perlengkapan').val();
    setnull(id, ruas, mapdata);
})
function maps(id=0, dir){
    // alert(id)
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

    $.ajax({
        url:'/peta/perlengkapan/'+id+'/'+dir,
        type:'get',
        dataType:'json',
        success:function(es){
            mapdata=es;
            if (es==''){
                alert("data perlengkapan tidak ditemukan");
            }
            for (let i = 0; i < Object.keys(es).length; i++) {

                const contentString='<div class="panel panel-map-location" style="max-width: 250px">\n' +
                    '             <img style="width: 250px" src="/uploads/'+es[i].gambar+'" class="width80" alt="Company Logo">\n' +
                    '              <div class="panel-body">\n' +
                    '                <div class="media">\n' +
                    '                  <div class="media-body">\n' +
                    '                    <address>\n' +
                    '                      <center><small><b>'+es[i].jenis+'</b></small></center>\n' +
                    '                      <h6 class="mt0"><center>'+es[i].name+'</center></h6>\n' +
                    '                      ' +
                    '                      <b>Ruas Jalan : </b>'+es[i].ruas+'<br>\n' +
                    '                      <b>Kondisi : </b>'+es[i].kondisi+'<br>\n' +
                    '                      <b>Posisi : </b>'+es[i].posisi+'<br>\n' +
                    '                      <b>Keterangan : </b>'+es[i].keterangan+'<br>\n' +
                    '                    </address>\n' +
                    '                  </div><!-- media-body -->\n' +
                    '                </div><!-- media -->\n' +
                    '\n' +
                    '                <div class="btn-group pull-left">\n' +
                    '                  <a href="/home/inputpengaduan/'+es[i].id+'"><button class="btn btn-primary" type="button"><i class="fa fa-phone mr5"></i> Laporkan</button></a>\n' +

                    '                </div>\n' +
                    '\n' +
                    '                <div class="btn-group pull-right">\n' +
                    '                  <a href="/peta/detailperkap/'+es[i].id+'"><button class="btn btn-success" type="button"><i class="fa fa-star mr5"></i> Details</button>\n' +
                    '                </div>\n' +
                    '\n' +
                    '              </div><!-- panel-body -->\n' +
                    '            </div><!-- panel -->\n';
                const marker = new google.maps.Marker({
                    position: new google.maps.LatLng(es[i].lat, es[i].lng),
                    icon: icons[es[i].type].icon + es[i].icon+'.png',
                    map: map,
                });
                markers.push(marker);
                marker.addListener("click", () => {
                    infowindow.setPosition(marker.position)
                    infowindow.setContent(contentString)
                    infowindow.open(map, marker);
                });
                //


            }

        }

    })
    if (dir==0){

    }else{
        $.ajax({
            url:'/peta/getdir/'+dir,
            type:'get',
            dataType:'json',
            success:function(data){
                console.log(data.from)
                mapss(data.from, data.to)
            }
        })
    }
    var infowindow = new google.maps.InfoWindow(
        {
            minWidth:250,
            maxWidth:400
        }
    );
}
function mapss(or, dir){

    var directionsService = new google.maps.DirectionsService();
    var directionsDisplay = new google.maps.DirectionsRenderer();
    var start = or;
    var end = dir;
    var request = {
        origin: start,
        destination: end,
        travelMode: 'DRIVING'
    };
    directionsDisplay.setMap(map);

    directionsService.route(request, function(result, status) {
        if (status == 'OK') {
            directionsDisplay.setDirections(result);
        }
    });
}