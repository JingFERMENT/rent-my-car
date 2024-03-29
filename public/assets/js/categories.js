//jquery

// option 1: avec bootstrap modal 
// attention de récupéer les id_category dans la bouton oui du modal

// cibler sur la bouton qui ouvre la page modal
$('.modalOpenBtn').on("click", showConfirmationPopup);
// cibler sur la bouton 'oui' dans la page modal
$(".deleteBtn").on("click", triggerDelete);

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
