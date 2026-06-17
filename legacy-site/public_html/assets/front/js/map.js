var defaultTitle = '이앤에이치건설산업(주)';
var map = new naver.maps.Map('map', {center: new naver.maps.LatLng(37.4868777, 127.1204564)});
var marker = new naver.maps.Marker({
    position: new naver.maps.LatLng(37.4868777, 127.1204564),
    map: map
});
var infowindow = new naver.maps.InfoWindow({
    content: '<div style="padding:10px;">' + defaultTitle + '</div>'
});

infowindow.open(map, marker);