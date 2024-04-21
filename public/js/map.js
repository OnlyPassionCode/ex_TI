const map = L.map('map').setView([50.845347, 4.350323], 13);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);


fetch("apiCarte.php")
    .then(response=>response.json())
    .then(addAllMarkersByLocations)
    .catch(error=>console.log("error", error));

/**
 * 
 * @param {object[]} locations
 */
function addAllMarkersByLocations(locations){

    locations.forEach(information => {
        const marker = L.marker([information.lat, information.long]).addTo(map);
        marker.bindPopup(`<b>${information.name}</b><br><p>${information.adresse}</p><img width='100' src='${information.img_url}'>`);
    });

}