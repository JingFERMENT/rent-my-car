//jquery
$(".deleteBtn").on("click", showConfirmationPopup);

function showConfirmationPopup(event) {
    let categoryId = $(this).data('category');
    let isConfirmed = confirm("Confirmez-vous de cette suppression de catégorie?")

    if (isConfirmed) {
        window.location.href = "/controllers/dashboard/categories/delete-ctrl.php?id_category=" + categoryId;
    }

}