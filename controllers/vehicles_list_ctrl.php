<?php

require_once(__DIR__ . '/../models/Vehicle.php');
require_once(__DIR__ . '/../config/init.php');

try {
    $title = 'Accueil';

    if (isset($_GET['sort']) && $_GET['sort'] == 'true') {
        $sortByAsc = true;
    } else {
        $sortByAsc = false;
    }
    // equivalent à $sortByAsc = ($_GET['sort'] == 'true');

    if (isset($_GET['page'])) {
        $page = (int)$_GET['page'];
    } else {
        $page = 1;
    }

    if(isset($_GET['page']) && $_GET['page'] > 1) {
        $previousPage = (int)$_GET['page'] - 1;
    } else {
        $previousPage = 1;
    }

   

    $offset = PER_PAGE * ($page - 1);

    $vehicles = Vehicle::pagination($offset);

    $allVehicles = Vehicle::nbOfAllVehicles();

    $nbOfPages = ceil($allVehicles / 10);

    if(!isset($_GET['page'])) {
        $nextPage = 2 ;
    } else {
        if($_GET['page'] >= $nbOfPages) {
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
