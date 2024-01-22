<?php

require_once(__DIR__ . '/../models/Vehicle.php');

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

    $offset = 10 * ($page - 1);
    $vehicles = Vehicle::pagination($offset);

    $allPages = Vehicle::nbOfAllVehicles();
    

    $nbOfPages = ceil($allPages / 10);
    
    

} catch (Throwable $e) {
    echo "Connection failed: " . $e->getMessage();
}

// views
include __DIR__ . '../../views/templates/header.php';
include __DIR__ . '../../views/vehicles/list.php';
include __DIR__ . '../../views/templates/footer.php';
