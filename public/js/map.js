const map = L.map('map').setView([50.845347, 4.350323], 13);
const markers = {};
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);


fetch("?json")
    .then(response=>response.json())
    .then(handleResponse)
    .catch(error=>console.log("error", error));


/**
 * 
 * @param {object[]} locations
 */
function handleResponse(locations){
    if(locations.error !== undefined){
        alert(locations.error);
        return;
    }
    addAllMarkersByLocations(locations);
    addAllToListe(locations);
}

/**
 * 
 * @param {object[]} locations
 */
function addAllToListe(locations){

    const liste = document.getElementById("liste");
    const ul = document.createElement('ul');

    locations.forEach(i => {
        
        const li = document.createElement('li');

        li.innerHTML = `${i.name} - ${i.adresse} | <a href="${i.img_url}" target="_blank">Photo</a>`;
        li.dataset.id = i.id;
        
        ul.appendChild(li);

    });
    ul.addEventListener("click", onClickLI);

    liste.appendChild(ul);
}

/**
 * 
 * @param {object[]} locations
 */
function addAllMarkersByLocations(locations){
    locations.forEach(information => {
        const marker = L.marker([information.lat, information.long]).addTo(map);
        markers[information.id] = marker;
        marker.bindPopup(`<b>${information.name}</b><br><p>${information.adresse}</p><img width='100' src='${information.img_url}'>`);
    });

}

/**
 * 
 * @param {PointerEvent} e
 */
function onClickLI(e){
    const li = e.target;
    if(li.nodeName !== "LI") return;
    const marker = markers[li.dataset.id];
    const latlng = marker.getLatLng();
    map.flyTo([latlng.lat, latlng.lng], 16);
}