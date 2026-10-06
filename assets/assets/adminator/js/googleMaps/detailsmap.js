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
        url:'/peta/dperl/'+perleng,
        type:'get',
        dataType:'json',
        success:function(es){
            var co=new google.maps.LatLng(es.lat, es.lng);
            map = new google.maps.Map(document.getElementById("map-detail"), {
                zoom: 13,
                center: co,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: myStyles
            });
                const marker = new google.maps.Marker({
                    position: new google.maps.LatLng(es.lat, es.lng),
                    icon: icons[es.type].icon + es.icon+'.png',
                    map: map,
                });

            }



    })

}
