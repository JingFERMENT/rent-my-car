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

    $vehicles = Vehicle::getAllVehicles($sortByAsc);
 
} catch (Throwable $e) {
    echo "Connection failed: " . $e->getMessage();
}

// views
include __DIR__ . '../../views/templates/header.php';
include __DIR__ . '../../views/vehicles/list.php';
include __DIR__ . '../../views/templates/footer.php';
