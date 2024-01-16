<?php 
require_once (__DIR__.'/../../../config/init.php');
require_once(__DIR__ . '/../../../models/Vehicle.php');

try {

    $title = "Modifier un véhicule";
    $idVehicle = intval(filter_input(INPUT_GET, 'id_vehicle', FILTER_SANITIZE_NUMBER_INT));

    $id_vehicle = Category::get($idVehicle);

}catch (Throwable $e) {
    echo "Connection failed: " . $e->getMessage();
}

// views
include __DIR__ . '/../../../views/templates/header_dashboard.php';
include __DIR__ . '/../../../views/dashboard/vehicles/updateVehicles.php';
include __DIR__ . '/../../../views/templates/footer_dashboard.php';