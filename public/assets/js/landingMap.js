let map;
function createMap() {
    let date = new Date();
    let style = (date.getHours() >= 7 && date.getHours() <= 21) ? "mapbox://styles/mapbox/streets-v9" : "mapbox://styles/mapbox/dark-v9";
    map = new mapboxgl.Map({
        container: "map",
        style: style,
        renderWorldCopies: false,
        interactive: false,
        hash: false, // show coords on url
        center: [-1.9817, 43.3077],
        zoom: 12.7,
    });
}

function createMarkers(buildings) {
    buildings.forEach(function(building) {
        let markerElement = document.createElement("i");
        markerElement.className = "fa fa-3x fa-map-marker text-primary";

        let marker = new mapboxgl.Marker(markerElement)
        .setLngLat(building.geometry.coordinates)
        .setPopup(
            new mapboxgl.Popup({offset: 25})
            .setHTML("<h5>" + building.properties.name + "</h5><p>" + building.properties.description + "</p>")
        )
        .addTo(map);
    });
}
