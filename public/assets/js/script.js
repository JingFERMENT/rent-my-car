
function showConfirmationPopup(categoryId) {

    let isConfirmed = confirm("Confirmez-vous de cette suppression de catégorie?");

    if (isConfirmed) {
        window.location.href = "/controllers/dashboard/categories/delete-ctrl.php?id_category=" + categoryId;
    }
}
