<?php
// objectif de session pour utiliser partout, notamment sur la page liste
// une session dure 20 minutes
session_start();

require_once(__DIR__ . '/../../../config/init.php');
require_once(__DIR__ . '/../../../models/Category.php');

try {
    // supprimer tous sauf les chiffres et + / - ;
    $idCategory = intval(filter_input(INPUT_GET, 'id_category', FILTER_SANITIZE_NUMBER_INT));

    $isDeleted = Category::delete($idCategory);

    if ($isDeleted) {
        $msg = 'La donnée concernée a bien été supprimée.';
    } else {
        $msg = 'Erreur, la donnée n\'a pas été insérée.';
    }

    //  on stock les messages dans la session
    $_SESSION['msg'] = $msg;

   header('location:/controllers/dashboard/categories/list-ctrl.php');

    die;

} catch (Throwable $e) {
    echo "Connection failed: " . $e->getMessage();
}


// views 
include __DIR__ . '/../../../views/templates/header_dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/list.php';
include __DIR__ . '/../../../views/templates/footer_dashboard.php';
