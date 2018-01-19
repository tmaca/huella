document.addEventListener("DOMContentLoaded", function () {
    addRemoveEvent();
    addEditEvent();
    addSetCoordinates();
}, false);

function addRemoveEvent() {
    for (element of document.querySelectorAll("[data-action=\"delete\"]")) {
        element.addEventListener("click", deleteBuilding, false);
    }
}

function addEditEvent() {
    for (element of document.querySelectorAll("[data-action=\"edit\"]")) {
        element.addEventListener("click", editBuilding, false);
    }
}

function addSetCoordinates() {
    for (element of document.querySelectorAll(".coordinates > a")) {
        element.addEventListener("click", setCoordinates, false);
    }
}

function deleteBuilding() {
    swal({
        title: "Eliminar edificio",
        text: "Esta accción no puede ser revertida, ¿deseas continuar?",
        icon: "warning",
        dangerMode: true,
        buttons: {
            cancel: "No, cancelar",
            confirm: {
                text: "Si, eliminar"
            }
        }
    }).then((value) => {
        if (value) {
            this.parentNode.getElementsByTagName("form")[0].submit();
        }
    });
}

function editBuilding() {
    let row = this;
    while(row.tagName != "TR") {
        row = row.parentNode;
    }

    document.getElementById("id").value = row.getElementsByClassName("id")[0].innerText;
    document.getElementById("name").value = row.getElementsByClassName("name")[0].innerText;
    document.getElementById("description").value = row.getElementsByClassName("description")[0].innerText;
    let country = document.getElementById("country_id").options;
    let countryId = row.getElementsByClassName("country")[0].getAttribute("data-id");
    for (let i = 0; i < country.length; i++) {
        if (country[i].value == countryId) {
            country[i].selected = true;
            break;
        }
    }
    let region = document.getElementById("region_id").options;
    let regionId = row.getElementsByClassName("region")[0].getAttribute("data-id");
    for (let i = 0; i < region.length; i++) {
        if (region[i].value == regionId) {
            region[i].selected = true;
            break;
        }
    }
    document.getElementById("postcode").value = row.getElementsByClassName("postcode")[0].innerText;
    document.getElementById("address").value = row.getElementsByClassName("address")[0].innerText;

    $("#editBuildingModal").modal("show");
}

let map,
    marker,
    building_id;

function setCoordinates() {
    let coordinates = this.parentNode;
    let latitude = coordinates.getAttribute("data-latitude");
    let longitude = coordinates.getAttribute("data-longitude");
    building_id = coordinates.parentNode.getElementsByClassName("id")[0].innerText;

    if (latitude && longitude) {
        // center map on current coordinates with X zoom
        showMap(latitude, longitude);
    } else {
        showMap();
        // center map on country
    }

    $("#mapModal").modal("show");
}
function showMap(lat, lng) {
    let zoom = 15;
    if (!lat || !lng) {
        lat = 40.393;
        lng = -3.702;
        zoom = 5;
    }

    if (!map) {
        $('#mapModal').one('shown.bs.modal', function () {
            createMap();
            map.on("load", function () {
                this.setCenter([lng, lat]);
                map.setZoom(zoom);
            });

            let markerElement = document.createElement("i");
            markerElement.className = "fa fa-3x fa-map-marker text-primary";
            marker = new mapboxgl.Marker(markerElement)
            .setLngLat([lng, lat])
            .addTo(map);

            addClickEvent(map);

        });

    } else {
        map.setCenter([lng, lat]);
        map.setZoom(zoom);
        marker.setLngLat([lng, lat]);
    }
}

function createMap() {
    map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v9',
        zoom: 9
    });
}

function addClickEvent(map) {
    map.on("click", function(e) {
        let lat = e.lngLat.lat;
        let lng = e.lngLat.lng;

        marker.setLngLat([lng, lat]);
        swal({
            title: "¿Guardar posición seleccionada?",
            text: "Seleccionado: " + lng + ", " + lat,
            icon: "info",
            buttons: {
                confirm: "Guardar",
                cancel: "Cancelar",
            }
        })
        .then(function (isConfirm) {
            if (isConfirm) {
                swal.close();
                $("#mapModal").modal("hide");
                savePosition(lat, lng);
            }
        });
    });
}

function savePosition(lat, lng) {
    let form = document.getElementById("updateCoordinatesForm");
    form.action = form.action.replace("/id/", "/" + building_id + "/");
    form.querySelector("[name=latitude]").value = lat;
    form.querySelector("[name=longitude]").value = lng;
    form.submit();
}

$(function () {
    $('#addBuildingModal').on('shown.bs.modal', function () {
        $('#addBuildingModal input:not([type="hidden"])').first().trigger('focus');
    });

    $('#editBuildingModal').on('shown.bs.modal', function () {
        $('#editBuildingModal input:not([type="hidden"])').first().trigger('focus');
    });
});
