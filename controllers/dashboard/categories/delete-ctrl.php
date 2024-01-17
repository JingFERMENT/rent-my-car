<?php
// objectif de session pour utiliser partout, notamment sur la page liste
// une session dure 20 minutes
session_start();
require_once(__DIR__ . '/../../../models/Category.php');
require_once(__DIR__ . '/../../../models/Vehicle.php');

try {

    $errors = [];
    // supprimer tous sauf les chiffres et + / - ;
    $idCategory = intval(filter_input(INPUT_GET, 'id_category', FILTER_SANITIZE_NUMBER_INT));

    $isExisitInVehicles = Vehicle::getVehiclesFromIdCategory($idCategory);
    

    // vérifier s'il y a des véhicules qui sont liés à une categorie avant la suppression
    if ($isExisitInVehicles) {
        $error = 'Vous ne pouvez pas supprimer cette categorie, car elle a des véhicules qui y sont rattachés.';
      
    } else {
        $isDeleted = Category::delete($idCategory);
        if ($isDeleted) {
            $msg = 'Catégorie supprimée avec succès.';
        } else {
            $error = 'Erreur, la donnée n\'a pas été modifiée.';
        }
    }
    
    $_SESSION['error'] = $error;
    
    //on stock les messages dans la session
    $_SESSION['msg'] = $msg;

    header('location:/controllers/dashboard/categories/list-ctrl.php');

    die;
} catch (Throwable $e) {
    echo "Connection failed: " . $e->getMessage();
}
