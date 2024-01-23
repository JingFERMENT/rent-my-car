<?php

require_once(__DIR__ . '/../models/Vehicle.php');
require_once(__DIR__ . '/../config/init.php');

try {
    $title = 'Accueil';

    $categories = Vehicle::filterByCategory();

    // pagination
    $page = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));
    
    if ($page == 0) {
        $page = 1;
        $nextPage = 2;
    } 

    if ($page > 1) {
        $previousPage = $page - 1;
    } else {
        $previousPage = 1;
    }

    $id_category = intval(filter_input(INPUT_GET, 'id_category', FILTER_SANITIZE_NUMBER_INT));
    $offset = PER_PAGE * ($page - 1);
    $vehicles = Vehicle::pagination($offset, $id_category);
    $nbOfAllVehicles = Vehicle::nbOfAllVehicles($id_category);

    // round : arrondir au plus proche
    // ceil : arrondir au ceil / floor: arrond dans 
    $nbOfPages = ceil($nbOfAllVehicles / PER_PAGE);

    if ($page >= $nbOfPages) {
        $nextPage = $page;
    } else {
        $nextPage = $page + 1;
    }
    
} catch (Throwable $e) {
    echo "Connection failed: " . $e->getMessage();
}

// views
include __DIR__ . '../../views/templates/header.php';
include __DIR__ . '../../views/vehicles/list.php';
include __DIR__ . '../../views/templates/footer.php';

    // // filtrer 
    // if (isset($_GET['sort']) && $_GET['sort'] == 'true') {
    //     $sortByAsc = true;
    // } else {
    //     $sortByAsc = false;
    // }