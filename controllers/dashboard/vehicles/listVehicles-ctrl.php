<?php
session_start();
require_once(__DIR__ . '/../../../models/Vehicle.php');
require_once(__DIR__ . '/../../../helpers/dd.php');

try {
    $archived = false;

    $title = 'Liste des véhicules';
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
    $sortByAsc = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($sortByAsc == 'true') {
        $sortByAsc = true;
    } else {
        $sortByAsc = false;
    }

     // Appel de la méthode statique getAll
    $vehicles = Vehicle::getAllVehicles($sortByAsc, 0, $archived, 0, 0, null);
    
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }

} catch (Throwable $e) {
    $error = $e->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
    die;
}

// views
include __DIR__ . '/../../../views/templates/header_dashboard.php';
include __DIR__ . '/../../../views/dashboard/vehicles/listVehicles.php';
include __DIR__ . '/../../../views/templates/footer_dashboard.php';
