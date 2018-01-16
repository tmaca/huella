document.addEventListener("DOMContentLoaded", function () {
    addRemoveEvent();
    addEditEvent();
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

    $("#editBuildingModal").modal("show");
}

$(function () {
    $('#addBuildingModal').on('shown.bs.modal', function () {
        $('input:not([type="hidden"])').first().trigger('focus');
    });

    $('#editBuildingModal').on('shown.bs.modal', function () {
        $('input:not([type="hidden"])').first().trigger('focus');
    });
});
