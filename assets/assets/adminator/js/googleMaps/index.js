 navigator.geolocation.getCurrentPosition(showPosition);
 var myloclat=0;
 var mylng=0;
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

        map = new google.maps.Map(document.getElementById("google-map"), {
            zoom: 13,
            center: { lat: -7.3932652, lng: 109.7097441 },
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: myStyles
        });
    }else{

        map = new google.maps.Map(document.getElementById("google-map"), {
            zoom: 13,
            center: { lat: myloclat, lng: mylng },
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: myStyles
        });
    }
    // map.setOptions({ styles: styles["hide"] });
    // let bounds  = new google.maps.LatLngBounds();

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


    var infowindow = new google.maps.InfoWindow(
        {
            minWidth:250,
            maxWidth:400
        }
    );
    var perleng=$("#idperlengkapan").val();
    $.ajax({
        url:'/peta/perlengkapan/'+perleng,
        type:'get',
        dataType:'json',
        success:function(es){
            // alert('as')
            // alert(Object.keys(es).length)
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
                marker.addListener("click", () => {
                    // console.log(marker.pos   ition)
                    infowindow.setPosition(marker.position)
                    infowindow.setContent(contentString)

                    infowindow.open(map, marker);
                });
                //


            }

        }

    })

}
