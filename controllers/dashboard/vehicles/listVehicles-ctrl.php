<?php
session_start();
require_once(__DIR__ . '/../../../models/Vehicle.php');


try {

    $title = 'Liste des véhicules'; 
    $vehicles = Vehicle::getAllVehicles();
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }

} catch (Throwable $e) {
    // echo "Connection failed: " . $e->getMessage();
    var_dump($e);
}



// views
include __DIR__ . '/../../../views/templates/header_dashboard.php';
include __DIR__ . '/../../../views/dashboard/vehicles/listVehicles.php';
include __DIR__ . '/../../../views/templates/footer_dashboard.php';