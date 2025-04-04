/* This file is part of the Leaflet Maps project. */
const options = {
    enableHighAccuracy: true,
    //timeout: 50,
    maximumAge: 0,
};
  
function success(pos) {
    const crd = pos.coords;
    initMap(crd.latitude,crd.longitude);
}
  
function error(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
    //use default location if geolocation fails
    fetch('/uploads/leafletmaps/initData.json').then(function(response) {
        return response.json();
  }).then(function(data) {
        initMap(data.last.latitude, data.last.longitude);
        console.log("Author: "+ data.last.author +" / Using default location: " + data.last.latitude + ", " + data.last.longitude);
    });
}
  
navigator.geolocation.getCurrentPosition(success, error, options);

function initMap(lat, lon) {
    map = L.map('map').setView([lat,lon], 8);
    console.log("Initializing map with Latitude: " + lat + ", Longitude: " + lon);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        minZoom: 2,
        maxZoom: 19,
        wrapLng: 10,
        inertia: false     
    }).addTo(map);
   
    fetch('/uploads/leafletmaps/sightings.json')
    .then(response => response.json())
    .then(data => onEachFeature(data))
    .catch(error => console.error('Erro ao carregar JSON:', error));
}
function onEachFeature(feature) {
    var markers = L.markerClusterGroup();
    // Add the marker to the marker group
    feature.forEach(point => {
        var marker = L.marker([point.latitude, point.longitude]);

        let popupContent = '';
        var img = '';
        if (point.image != undefined) {
            img = '<img src="' + point.image + '" alt="Imagem" width="300">';
        }
        popupContent = 
        '<b>'+ point.author + '</b><br>' +
        '<small>' + point.datetime + '</small><br>' +
        '<p>' + point.description + '</p>' +
        img +
        '<p><a href="/report/' + point.slug + '" target="_blank">Detalhes</a></p>';
        marker.bindPopup(popupContent);
        markers.addLayer(marker);
    });
    map.addLayer(markers);
}