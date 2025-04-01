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
        console.log("Autor: "+ data.last.author +" / Using default location: " + data.last.latitude + ", " + data.last.longitude);
    });
    
}
  
navigator.geolocation.getCurrentPosition(success, error, options);

function initMap(lat, lon) {
    console.log("Initializing map with Latitude: " + lat + ", Longitude: " + lon);
    map = L.map('map').setView([lat,lon], 5);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        minZoom: 2,
        maxZoom: 19,
        wrapLng: 10,
        inertia: false     
    }).addTo(map);
    
    fetch('/uploads/leafletmaps/sightings.json').then(response => {
        return response.json();
    }).then(data => {
        L.geoJSON(data, {
            onEachFeature: onEachFeature
        }).addTo(map);
    });

}
function onEachFeature(feature, layer) {
    let popupContent = '';
    var img = '';
    if (feature.properties.image != undefined) {
        img = '<img src="' + feature.properties.image + '" alt="Imagem" width="300">';
    }
    popupContent = 
    '<b>'+ feature.properties.author + '</b><br>' +
    '<small>' + feature.properties.datetime + '</small><br>' +
    '<p>' + feature.properties.description + '</p>' +
    img +
    '<p><a href="/report/' + feature.properties.slug + '" target="_blank">Detalhes</a></p>';

    layer.bindPopup(popupContent);
}