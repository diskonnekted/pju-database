
let lng=$("#lngDet").val();
let lat=$("#latDet").val();
function initMap() {
    let coor=new google.maps.LatLng(lat, lng)
    const center = coor;
    const map = new google.maps.Map(document.getElementById("mboox"), {
        zoom: 15,
        center: coor,
    });
    const marker = new google.maps.Marker({
        position: center,
        map: map,
    });
    marker.setMap(map);
}