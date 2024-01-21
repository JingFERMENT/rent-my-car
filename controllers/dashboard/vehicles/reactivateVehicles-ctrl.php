<?php

require_once(__DIR__ . '/../../../models/Vehicle.php');

try {

    // Récupération de l'ID du véhicule et nettoyage
    $id_vehicle = intval(filter_input(INPUT_GET, 'id_vehicle', FILTER_SANITIZE_NUMBER_INT));

    // Archivage du véhicule
    $isReactivated = Vehicle::reactivate($id_vehicle);


    header('location:/controllers/dashboard/vehicles/listVehicles-ctrl.php');
    
} catch (Throwable $e) {
    $error = $e->getMessage();
    include __DIR__ . '/../../../views/templates/header_dashboard.php';
    include __DIR__ . '/../../../views/templates/error.php';
    include __DIR__ . '/../../../views/templates/footer_dashboard.php';
    die;
}





