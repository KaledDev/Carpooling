import Alpine from 'alpinejs';
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import './bootstrap';

window.Alpine = Alpine;
Alpine.start();


document.addEventListener('DOMContentLoaded', function() {
    var mapElement = document.getElementById('map');
    if (!mapElement) {
        console.error('Element #map not found');
        return;
    }

    // Coordonnées géographiques du Burkina Faso
    var burkinaFasoCoords = [12.2344, -1.5616]; // Latitude et Longitude du centre du Burkina Faso

    var map = L.map('map').setView(burkinaFasoCoords, 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    document.getElementById('useMyLocation').addEventListener('click', function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude;
                var lon = position.coords.longitude;
                
                console.log('Latitude: ' + lat);
                console.log('Longitude: ' + lon);
                
                map.setView([lat, lon], 13); // Mettre à jour la vue de la carte avec la position de l'utilisateur
            });
        } else {
            alert('La géolocalisation n\'est pas supportée par ce navigateur.');
        }
    });
});
