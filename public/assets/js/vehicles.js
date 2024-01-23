//jquery

// option 1: avec bootstrap modal 
// attention de récupéer les id_category dans la bouton oui du modal

// ouvrir la modal archive
$('.modalOpenVehicleArchiveBtn').on("click", showConfirmationVehicleArchivePopup);
// cliquer 'oui' dans la page modal archive
$(".archiveVehicleBtn").on("click", doArchiveVehicle);

// ouvrir la modal un-archive
$('.modalOpenVehicleUnarchiveBtn').on("click", showConfirmationVehicleUnarchivePopup);
// cliquer 'oui' dans la page modal un-archive
$(".unarchiveVehicleBtn").on("click", doUnarchiveVehicle);

// ouvrir la modal delete
$('.modalOpenVehicleDeleteBtn').on("click", showConfirmationVehicleDeletePopup);
// cliquer 'oui' dans la page modal delete
$(".deleteVehicleBtn").on("click", doDeleteVehicle);

function showConfirmationVehicleArchivePopup(event) {
    const clickedVehicleId = ($(this).data('id'));
    // attribuer une valeur à l'attribut 'data-id'
    $(".archiveVehicleBtn").attr('data-id', clickedVehicleId);
}

function doArchiveVehicle(event) {
    //cibler la data-id sur la bouton "oui" de modal
    let vehicleId = $(this).data('id');
    window.location.href = "/controllers/dashboard/vehicles/archiveVehicles-ctrl.php?id_vehicle=" + vehicleId;
}

function showConfirmationVehicleUnarchivePopup(event) {
    const clickedVehicleId = ($(this).data('id'));
    // attribuer une valeur à l'attribut 'data-id'
    $(".unarchiveVehicleBtn").attr('data-id', clickedVehicleId);
}

function doUnarchiveVehicle(event) {
    //cibler la data-id sur la bouton "oui" de modal
    let vehicleId = $(this).data('id');
    window.location.href = "/controllers/dashboard/vehicles/reactivateVehicles-ctrl.php?id_vehicle=" + vehicleId;
}

function showConfirmationVehicleDeletePopup(event) {
    const clickedVehicleId = ($(this).data('id'));
    // attribuer une valeur à l'attribut 'data-id'
    $(".deleteVehicleBtn").attr('data-id', clickedVehicleId);
}

function doDeleteVehicle(event) {
    //cibler la data-id sur la bouton "oui" de modal
    let vehicleId = $(this).data('id');
    window.location.href = "/controllers/dashboard/vehicles/deleteVehicles-ctrl.php?id_vehicle=" + vehicleId;
}


// option 2: avec window message

// $(".deleteBtn").on("click", showConfirmationPopup);

// function showConfirmationPopup(event) {
//     let categoryId = $(this).data('category');
//     let isConfirmed = confirm("Confirmez-vous de cette suppression de catégorie?")

//     if (isConfirmed) {
//         window.location.href = "/controllers/dashboard/categories/delete-ctrl.php?id_category=" + categoryId;
//     }

// }