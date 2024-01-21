//jquery

// option 1: avec bootstrap modal 
// attention de récupéer les id_category dans la bouton oui du modal

// cibler sur la bouton qui ouvre la page modal
$('.modalOpenBtn').on("click", showConfirmationPopup);
// cibler sur la bouton 'oui' dans la page modal
$(".deleteBtn").on("click", triggerDelete);
// cibler sur la bouton qui ouvre la page modal
$('.modalOpenVehicleBtn').on("click", showConfirmationVehiclePopup);
$('.modalOpenVehicleBtn2').on("click", showConfirmationVehiclePopup2);
// cibler sur la bouton 'oui' dans la page modal
$(".archiveVehicleBtn").on("click", triggerVehicleArchive);
$(".deleteVehicleBtn").on("click", triggerVehicleDelete);

function showConfirmationPopup(event) {
    const clickedCategoryId = ($(this).data('category'));
    // attribuer une valeur à l'attribut 'data-category'
    $(".deleteBtn").attr('data-category', clickedCategoryId);
}

function triggerDelete(event) {
    //cibler la data-category sur la bouton "oui" de modal
    let categoryId = $(this).data('category');
    //envoyer sur URL pour récupérer ce lien dans delete-ctrl et supprimer cela dans la base des données
    window.location.href = "/controllers/dashboard/categories/delete-ctrl.php?id_category=" + categoryId;
}

function showConfirmationVehiclePopup(event) {
    const clickedVehicleId = ($(this).data('id'));
    // attribuer une valeur à l'attribut 'data-id'
    $(".archiveVehicleBtn").attr('data-id', clickedVehicleId);
}

function triggerVehicleArchive(event) {
    //cibler la data-id sur la bouton "oui" de modal
    let vehicleId = $(this).data('id');
    //envoyer sur URL pour récupérer ce lien dans delete-ctrl et supprimer cela dans la base des données
    window.location.href = "/controllers/dashboard/vehicles/archiveVehicles-ctrl.php?id_vehicle=" + vehicleId;
}

function showConfirmationVehiclePopup2(event) {
    const clickedVehicleId = ($(this).data('id'));
    // attribuer une valeur à l'attribut 'data-id'
    $(".deleteVehicleBtn").attr('data-id', clickedVehicleId);
}

function triggerVehicleDelete(event) {
    //cibler la data-id sur la bouton "oui" de modal
    let vehicleId = $(this).data('id');
    //envoyer sur URL pour récupérer ce lien dans delete-ctrl et supprimer cela dans la base des données
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