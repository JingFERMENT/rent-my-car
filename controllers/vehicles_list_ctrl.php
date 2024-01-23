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
    }
    $id_category = intval(filter_input(INPUT_GET, 'id_category', FILTER_SANITIZE_NUMBER_INT));
    $offset = PER_PAGE * ($page - 1);
    $vehicles = Vehicle::pagination($offset, $id_category);


    if (isset($_GET['page']) && $_GET['page'] > 1) {
        $previousPage = (int)$_GET['page'] - 1;
    } else {
        $previousPage = 1;
    }

    $allVehicles = Vehicle::nbOfAllVehicles($id_category);

    // round : arrondir au plus proche
    // ceil : arrondir au ceil / floor: arrond dans 
    $nbOfPages = ceil($allVehicles / PER_PAGE);

    if (!isset($_GET['page'])) {
        $nextPage = 2;
    } else {
        if ($_GET['page'] >= $nbOfPages) {
            $nextPage = (int)$_GET['page'];
        } else {
            $nextPage = (int)$_GET['page'] + 1;
        }
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